
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
      if(isset($_GET['product_id']) && isset($_GET['image']) && isset($_GET['brand']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['size']))
      {
        $product_id = $_GET['product_id'];
        $image = $_GET['image'];
        $brand = $_GET['brand'];
        $name = $_GET['name'];
        $price = $_GET['price'];
        $size = $_GET['size'];
        
        // delete from order db 
        $stmt_cancel_order = $conn->prepare("delete from orders where user_id = ? and product_id = ?");
        $stmt_cancel_order->execute([$user_id, $product_id]);

        // update to cart to make in_order = 0 again 
        $stmt_back_cart = $conn->prepare("update cart set in_order = 0 where user_id = ? and product_id = ?");
        $stmt_back_cart->execute([$user_id, $product_id]);

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
      if(isset($_POST['place_order']))
      {
        
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
                $stmt = $conn->prepare("select o.*,c.* from orders o join cart c on o.product_id = c.product_id where o.user_id = ?");
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
                    // price format 
                    $price_format = number_format($price, 2, '.', ',');

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
                      <!-- remove order  -->
                      <a href="check_out.php?product_id=<?php echo $product_id?>&image=<?php echo $image?>&brand=<?php echo $brand?>&name=<?php echo $name?>&price=<?php echo $price?>&size=<?php echo $size?>" class="justify-center relative inline-block px-4 py-2 font-medium group">
                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-red-700 group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-red-700 group-hover:bg-red-700"></span>
                        <span class="relative text-red-700 group-hover:text-white">X Remove from Order</span>
                      </a>
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
              <div class="relative">
                <input type="radio" name="pay_method" value="cod" id="cod" class="hidden peer" checked />
                <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
                <label for="cod" class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50">
                  <img class="object-contain w-14" src="assets/images/pay_method/cod.png" alt="" />
                  <div class="ml-5">
                    <span class="mt-2 font-semibold">Cash On Delivery</span>
                    <p class="text-sm leading-6 text-slate-500">Pay the item using cash on delivery.</p>
                  </div>
                </label>
              </div>
              <div class="relative">
                <input type="radio" name="pay_method" value="e_wallet" id="e_wallet" class="hidden peer" />
                <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
                <label for="e_wallet" class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50">
                  <img class="object-contain w-14" src="assets/images/pay_method/e_wallet.png" alt="" />
                  <div class="ml-5">
                    <span class="mt-2 font-semibold">E-wallet</span>
                    <p class="text-sm leading-6 text-slate-500">
                      Use E wallets for payment
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
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                  </svg>
                </div>
              </div>
              <!-- contact here  -->
              <label for="email" class="block mt-4 mb-2 text-sm font-medium">contact</label>
              <div class="relative">
                <input type="text" id="contact" name="contact" value="<?php echo $contact ?>" readonly class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                  </svg>
                </div>
              </div>
              <!-- address here  -->
              <label for="address" class="block mt-4 mb-2 text-sm font-medium">Address</label>
              <div class="relative">
                <input type="text" id="address" name="address" value="<?php echo $address ?>" readonly class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" />
                <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
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
              <div class="grid grid-cols-1 gap-5">
                <!-- place order  -->
                <button type="submit" name="place_order" class="flex justify-center relative inline-block px-4 py-2 font-medium group">
                  <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                  <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                  <span class="relative text-black group-hover:text-white">
                    Place Order
                  </span>
                </button>
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
