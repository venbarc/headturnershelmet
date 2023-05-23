
<?php session_start()?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Check Out | HEADTURNERS</title>

    <?php
    
      include "connect.php";
      include "include/header_link.php";

      // Check if user is signed in
      if (isset($_SESSION['user_id'])) 
      {
          $user_id = $_SESSION['user_id'];
          // get user statement data 
          $stmt_get_user = $conn->prepare("select * from users where id = ? ");
          $stmt_get_user->bind_param('i', $user_id);
          $stmt_get_user->execute();
          $res_get_user = $stmt_get_user->get_result();

          // fetch users data
          $user = $res_get_user->fetch_assoc();

          $email = $user['email'];
          $fname = $user['fname'];
          $lname = $user['lname'];
          $contact = $user['contact'];
          $address = $user['address'];
          $image = $user['image'];
          $date_reg = $user['date_reg'];

          // formatted date 
          $formattedDate = (new DateTime($user['date_reg']))->format('F j, Y');
      }
      else
      {
        ?>
          <script>
            location.href = "login.php";
          </script>
        <?php
      }

    ?>
</head>


<body class="antialiased" id="check_out">
    <?php
      if(isset($_GET['product_id']) && isset($_GET['price']) && isset($_GET['size']))
      {
        $product_id = $_GET['product_id'];
        $price = $_GET['price'];
        $size = $_GET['size'];
        
        // delete from order db 
        $stmt_cancel_order = $conn->prepare("delete from orders where user_id = ? and product_id = ?");
        $stmt_cancel_order->execute([$user_id, $product_id]);

        // update to cart to make in_order = 0 again and price reset to original price
        $stmt_back_cart = $conn->prepare("update cart set in_order = 0, price = ? where user_id = ? and product_id = ?");
        $stmt_back_cart->execute([$price, $user_id, $product_id]);

        if($stmt_cancel_order->affected_rows > 0)
        {
          echo'
          <div class="remove_order_alert bg-red-500 text-white font-bold py-2 px-4 rounded fixed bottom-0 left-0 mb-4 ml-4 z-50">
              Removed from order payment.
          </div>
          ';
        }
        $stmt_cancel_order->close();
        $stmt_back_cart->close();
      }

      if(isset($_GET['qnty']))// quantity
      {
        $qnty = $_GET['qnty'];
        $product_id = $_GET['product_id'];
        $price = $_GET['price'];

        if($qnty == 'decrement')
        {
          // decrement qnty 
          $stmt_dec = $conn->prepare("update orders set qnty = qnty - 1 where product_id = ? and user_id = ?");
          $stmt_dec->execute([$product_id, $user_id]);
          
          if($stmt_dec->affected_rows > 0)
          {
            // update the price 
            $stmt_dec = $conn->prepare("update cart set price = (price - $price) where product_id = ? and user_id = ?");
            $stmt_dec->execute([$product_id, $user_id]);
            ?>
              <script>
                location.href = "check_out.php";
              </script>
            <?php
          }
        }
        else
        if($qnty == 'increment')
        {
          // increment qnty 
          $stmt_inc = $conn->prepare("update orders set qnty = qnty + 1 where product_id = ? and user_id = ?");
          $stmt_inc->execute([$product_id, $user_id]);
          
          if($stmt_inc->affected_rows > 0)
          {
            // update the price 
            $stmt_dec = $conn->prepare("update cart set price = (price + $price) where product_id = ? and user_id = ?");
            $stmt_dec->execute([$product_id, $user_id]);
            ?>
              <script>
                location.href = "check_out.php";
              </script>
            <?php
          }
        }
      }

      if(isset($_POST['place_order'])) //place order
      {
        // initialization 
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $order_id = rand(10000000000,99999999999);

        $pay_method = $_POST['pay_method'];

        $total_bill = $_POST['total_bill'];
        $product_id = $_POST['product_id'];
        $qnty = $_POST['qnty'];
        $size = $_POST['size'];

        foreach ($product_id as $i => $product_ids) 
        {
          // place order query 
          $stmt_place_order = $conn->prepare("insert into place_order set user_id = ?, product_id = ?, order_id = ?, qnty = ?, size = ?, total_bill = ?, pay_method = ?");
          $stmt_place_order->execute([$user_id, $product_ids, $order_id, $qnty[$i], $size[$i], $total_bill, $pay_method]);

          // delete from order query 
          $stmt_place_order = $conn->prepare("delete from orders where user_id = ? and product_id = ? ");
          $stmt_place_order->execute([$user_id, $product_ids]);

          // delete from cart query 
          $stmt_place_order = $conn->prepare("delete from cart where user_id = ? and product_id = ? and in_order = 1");
          $stmt_place_order->execute([$user_id, $product_ids]);

          if($stmt_place_order->affected_rows > 0)
          {
            ?>
              <script>
                location.href = "profile.php?tab=to_ship";
              </script>
            <?php
          }
        }
    
      }

      // navigation bar 
      include 'include/navbar.php';
    ?>
    <section class="w-full h-full bg-gray-200 pt-14">
      <form method="post">
        <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 pt-14">
          <!-- order summary  -->
          <div class="px-4 pt-8">
            <p class="text-3xl font-extrabold">Order Summary</p>
            <p class="text-gray-600">Check your items. And select a suitable payment method.</p>

            <div class="px-2 py-4 mt-8 space-y-3 bg-white border rounded-lg sm:px-6">
              <?php
                $stmt = $conn->prepare("select o.*,c.*,p.* 
                                        from orders o
                                        join cart c on o.product_id = c.product_id
                                        join products p on o.product_id = p.product_id 
                                        where o.user_id = ?");
                $stmt->execute([$user_id]);
                $res = $stmt->get_result();

                if($res->num_rows > 0)
                {
                  while($row = $res->fetch_assoc()) 
                  {
                    // initialization 
                    $product_id = $row['product_id'];
                    $image = $row['image'];
                    $brand = $row['brand'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $size = $row['size'];
                    $qnty = $row['qnty'];

                    // format the price 
                    $price_x_qnty = $price * $qnty;
                    $price_format = number_format($price_x_qnty, 2, '.', ',');

                    // available sizes initialization 
                    $xs_avail = $row['xs_avail'];
                    $sm_avail = $row['sm_avail'];
                    $md_avail = $row['md_avail'];
                    $lg_avail = $row['lg_avail'];
                    $xlg_avail = $row['xlg_avail'];

                    // sum the amount of selected product
                    $stmt_sum = $conn->prepare("SELECT SUM(price) AS subtotal_payment FROM cart WHERE user_id = ? and in_order = 1");
                    $stmt_sum->execute([$user_id]);
                    $res_sum = $stmt_sum->get_result();
                    $row_sum = $res_sum->fetch_assoc();
                    $subtotal_payment = $row_sum['subtotal_payment'];
                    $subtotal_payment_format = number_format($subtotal_payment, 2, '.', ',');
                    // shipping fee 
                    $ship_fee = 38;
                    $ship_fee_format = number_format($ship_fee, 2, '.', ',');
                    // total bill 
                    $total_bill = $subtotal_payment + $ship_fee;
                    $total_bill_format = number_format($total_bill, 2, '.', ',');

                    ?>
                      <!-- hidden input in while loop  -->
                      <input type="hidden" name="product_id[]" value="<?php echo $product_id ?>" >
                      <input type="hidden" name="qnty[]" value="<?php echo $qnty ?>" >
                      <input type="hidden" name="size[]" value="<?php echo $size ?>" >

                      <div class="flex flex-col bg-white rounded-lg sm:flex-row">
                        <img src="<?php echo $image ?>" class="object-cover object-center h-24 m-2 border rounded-md w-28">
                        <div class="flex flex-col w-full px-4 py-4">
                          <span class="font-semibold">
                            <?php echo $product_id .' | '. $name?>
                          </span>
                          <p class="float-right text-gray-400">
                            Size : <span class="text-red-600"><?php echo $size?></span>
                          </p>
                          <p class="text-lg font-bold">
                            ₱<?php echo $price_format ?>
                          </p>
                        </div>
                      </div>
                      <div class="grid grid-cols-2 gap-2">
                        <!-- remove order  -->
                        <div>
                          <a href="check_out.php?product_id=<?php echo $product_id?>&price=<?php echo $price?>&size=<?php echo $size?>" class="justify-center relative inline-block px-4 py-2 font-medium group">
                            <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-red-700 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                            <span class="absolute inset-0 w-full h-full bg-white border-2 border-red-700 group-hover:bg-red-700"></span>
                            <span class="relative text-red-700 group-hover:text-white">X Remove from Order</span>
                          </a>
                        </div>
                        <!-- quantity  -->
                        <div>
                          <?php
                              // extra small qnty 
                              echo ($size == 'xs') ? '
                              <div class="grid lg:grid-cols-4 text-center">
                                  <div class="font-semibold">
                                      Available <span class="text-red-500">xs  ['. $xs_avail .']</span> 
                                  </div>
                                  <div>
                                      '. ($qnty > 1 ? '
                                      <a href="check_out.php?qnty=decrement&product_id='.$product_id.'&price='.$price.'" class="btn bg-red-600 text-white">
                                        -
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> - </div>') .'
                                  </div>
                                  <div class="mt-2">
                                      Quantity <br> <span class="text-md font-semibold">['.$qnty.']</span>
                                  </div>
                                  <div>
                                      '. ($qnty < $xs_avail ? '
                                      <a href="check_out.php?qnty=increment&product_id='.$product_id.'&price='.$price.'" class="btn bg-green-600 text-white">
                                        +
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> + </div>') .'
                                  </div>
                              </div>
                              ' : '';
                              // small qnty 
                              echo ($size == 'sm') ? '
                              <div class="grid lg:grid-cols-4 text-center">
                                  <div class="font-semibold">
                                      Available <span class="text-red-500">sm  ['. $sm_avail .']</span> 
                                  </div>
                                  <div>
                                      '. ($qnty > 1 ? '
                                      <a href="check_out.php?qnty=decrement&product_id='.$product_id.'&price='.$price.'" class="btn bg-red-600 text-white">
                                        -
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> - </div>') .'
                                  </div>
                                  <div class="mt-2">
                                      Quantity <br> <span class="text-md font-semibold">['.$qnty.']</span>
                                  </div>
                                  <div>
                                      '. ($qnty < $sm_avail ? '
                                      <a href="check_out.php?qnty=increment&product_id='.$product_id.'&price='.$price.'" class="btn bg-green-600 text-white">
                                        +
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> + </div>') .'
                                  </div>
                              </div>
                              ' : '';
                              // medium qnty 
                              echo ($size == 'md') ? '
                              <div class="grid lg:grid-cols-4 text-center">
                                  <div class="font-semibold">
                                      Available <span class="text-red-500">sm  ['. $md_avail .']</span> 
                                  </div>
                                  <div>
                                      '. ($qnty > 1 ? '
                                      <a href="check_out.php?qnty=decrement&product_id='.$product_id.'&price='.$price.'" class="btn bg-red-600 text-white">
                                        -
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> - </div>') .'
                                  </div>
                                  <div class="mt-2">
                                      Quantity <br> <span class="text-md font-semibold">['.$qnty.']</span>
                                  </div>
                                  <div>
                                      '. ($qnty < $md_avail ? '
                                      <a href="check_out.php?qnty=increment&product_id='.$product_id.'&price='.$price.'" class="btn bg-green-600 text-white">
                                        +
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> + </div>') .'
                                  </div>
                              </div>
                              ' : '';
                              // large qnty 
                              echo ($size == 'lg') ? '
                              <div class="grid lg:grid-cols-4 text-center">
                                  <div class="font-semibold">
                                      Available <span class="text-red-500">sm  ['. $lg_avail .']</span> 
                                  </div>
                                  <div>
                                      '. ($qnty > 1 ? '
                                      <a href="check_out.php?qnty=decrement&product_id='.$product_id.'&price='.$price.'" class="btn bg-red-600 text-white">
                                        -
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> - </div>') .'
                                  </div>
                                  <div class="mt-2">
                                      Quantity <br> <span class="text-md font-semibold">['.$qnty.']</span>
                                  </div>
                                  <div>
                                      '. ($qnty < $lg_avail ? '
                                      <a href="check_out.php?qnty=increment&product_id='.$product_id.'&price='.$price.'" class="btn bg-green-600 text-white">
                                        +
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> + </div>') .'
                                  </div>
                              </div>
                              ' : '';
                              // extra large qnty 
                              echo ($size == 'xlg') ? '
                              <div class="grid lg:grid-cols-4 text-center">
                                  <div class="font-semibold">
                                      Available <span class="text-red-500">sm  ['. $xlg_avail .']</span> 
                                  </div>
                                  <div>
                                      '. ($qnty > 1 ? '
                                      <a href="check_out.php?qnty=decrement&product_id='.$product_id.'&price='.$price.'" class="btn bg-red-600 text-white">
                                        -
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> - </div>') .'
                                  </div>
                                  <div class="mt-2">
                                      Quantity <br> <span class="text-md font-semibold">['.$qnty.']</span>
                                  </div>
                                  <div>
                                      '. ($qnty < $xlg_avail ? '
                                      <a href="check_out.php?qnty=increment&product_id='.$product_id.'&price='.$price.'" class="btn bg-green-600 text-white">
                                        +
                                      </a>
                                      ' : '
                                      <div class="btn bg-gray-500 text-white"> + </div>') .'
                                  </div>
                              </div>
                              ' : '';
                          ?>
                        </div>
                      </div>
                      
                    <?php
                  }
                }
                else{
                  $subtotal_payment_format = 0;
                  $ship_fee_format = 0;
                  $total_bill_format = 0;
                  ?>
                    <h4 class="text-white p-10 bg-gray-500 text-center font-semibold text-xl">Empty payment.</h4>
                  <?php
                }
              ?>
            </div>
            <!-- payment method  -->
            <p class="mt-8 text-lg font-medium">Payments Methods</p>
              <!-- pay maya here  -->
              <div class="relative">
                <input type="radio" name="pay_method" value="maya" id="maya" class="hidden peer" checked />
                <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
                <label for="maya" class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50">
                  <img src="assets/images/pay_method/maya_logo.png" class="object-contain w-14" />
                  <div class="ml-5">
                    <span class="mt-2 font-semibold">E-Wallet Pay Maya</span>
                    <p class="text-sm leading-6 text-slate-500">
                      Use Pay maya for payment
                    </p>
                  </div>
                </label>
              </div>
              <!-- Gcash here  -->
              <div class="relative">
                <input type="radio" name="pay_method" value="gcash" id="gcash" class="hidden peer" />
                <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
                <label for="gcash" class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50">
                  <img src="assets/images/pay_method/gcash_logo.png" class="object-contain w-14" />
                  <div class="ml-5">
                    <span class="mt-2 font-semibold">E-Wallet Gcash</span>
                    <p class="text-sm leading-6 text-slate-500">
                      Use Gcash for payment
                    </p>
                  </div>
                </label>
              </div>
               <!-- bank here  -->
               <div class="relative">
                <input type="radio" name="pay_method" value="bank" id="bank" class="hidden peer" disabled/>
                <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
                <label for="bank" class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50">
                  <!-- <img src="" class="object-contain w-14" /> -->
                  <p class="text-gray-500 font-semibold">coming soon</p>
                  <div class="ml-5">
                    <span class="mt-2 font-semibold">Online Banking</span>
                    <p class="text-sm leading-6 text-slate-500">
                      Use Bank transactions to pay
                    </p>
                  </div>
                </label>
              </div>
          </div>
          <!-- payment details  -->
          <div class="px-4 pt-8 mt-10 bg-gray-50 lg:mt-0 pb-10">
            <p class="text-3xl font-extrabold">Payment Details</p>
            <p class="text-red-600">
              <strong>Note: </strong>if personal information is wrong please update it on your profile or click
              <a href="profile.php?tab=personal_profile" class="text-blue-500">here</a>
            </p>
              <!-- email here  -->
              <label for="email" class="block mt-4 mb-2 text-sm font-medium">Email</label>
              <div class="relative">
                <input type="text" id="email" name="email" value="<?php echo $email ?>" readonly class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
                  <!-- icon here  -->
                  <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16 5H4a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V6a1 1 0 00-1-1zM4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2.071 6.243a.5.5 0 01.686-.172L10 10.417l7.243-4.346a.5.5 0 11.514.858L10 11.583 2.243 6.93a.5.5 0 01-.172-.686z" clip-rule="evenodd"/>
                  </svg>
                </div>
              </div>
              <!-- contact here  -->
              <label for="email" class="block mt-4 mb-2 text-sm font-medium">Contact</label>
              <div class="relative">
                <input type="text" id="contact" name="contact" value="<?php echo $contact ?>" readonly class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
                  <!-- icon here  -->
                  <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M13 3H7a1 1 0 00-1 1v11a1 1 0 001 1h6a1 1 0 001-1V4a1 1 0 00-1-1zM7 2a2 2 0 00-2 2v11a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                  </svg>
                </div>
              </div>
              <!-- address here  -->
              <label for="address" class="block mt-4 mb-2 text-sm font-medium">Address</label>
              <div class="relative">
                <input type="text" id="address" name="address" value="<?php echo $address ?>" readonly class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
                  <!-- icon here  -->
                  <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                  </svg>
                </div>
              </div>
            
              <!--Sub Total -->
              <div class="py-2 mt-6 border-t border-b">
                <div class="flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-900">Subtotal</p>
                  <p class="font-semibold text-gray-900">
                    ₱<?php echo $subtotal_payment_format ?>
                  </p>
                </div>
                <div class="flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-900">Shipping</p>
                  <p class="font-semibold text-gray-900">
                    ₱<?php echo $ship_fee_format ?>
                  </p>
                </div>
              </div>
              <!-- total bill  -->
              <div class="flex items-center justify-between mt-6 mb-5">
                <p class="text-sm font-medium text-gray-900">Total bill</p>
                <p class="text-2xl font-semibold text-gray-900">
                  ₱<?php echo $total_bill_format ?>
                </p>
              </div>

              <!--  hidden input  -->
              <input type="hidden" name="total_bill" value="<?php echo $total_bill ?>">

              <div class="grid grid-cols-1 gap-5">
                <?php
                  if($total_bill_format > 0)
                  {
                    ?>
                    <!-- place order submit button -->
                    <button type="submit" name="place_order" class="flex justify-center relative inline-block px-4 py-2 font-medium group">
                      <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                      <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                      <span class="relative text-black group-hover:text-white">
                        Place Order
                      </span>
                    </button>
                    <?php
                  }
                  else{
                    echo'
                    <span class="text-black font-semibold text-lg">
                      No Order has been placed...
                    </span>
                    ';
                  }
                ?>
                
              </div>
          </div>
        </div>
      </form>
    </section>
    
    <?php
      include "contact.php";
      include 'include/footer.php';
      include "include/footer_link.php";
    ?>

</body>

</html>
