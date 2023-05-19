<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | HEADTURNERS</title>

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


<body class="antialiased" id="cart">
    <?php
      // remove from cart 
      if(isset($_GET['remove']))
      {
        // initialization 
        $remove = $_GET['remove'];

        $stmt_remove = $conn->prepare("delete from cart where product_id = ? and user_id = ?");
        $stmt_remove->execute([$remove, $user_id]);

        if($stmt_remove->affected_rows > 0)
        {
          echo'
          <div class="cart_remove_alert bg-red-500 text-white font-bold py-2 px-4 rounded fixed bottom-0 left-0 mb-4 ml-4 z-50">
              Removed to cart.
          </div>
          ';
        }
      }
      
      // navigation bar 
      include 'include/navbar.php';
    ?>

  <section class="h-full py-12 bg-gray-300 sm:py-16 lg:py-44">
    <div class="px-4 mx-auto sm:px-6 lg:px-8">
      <div class="max-w-2xl mx-auto mt-8 md:mt-12">
        <div class="bg-gray-100 shadow">
        <div class="flex items-center justify-center">
            <h1 class="text-4xl font-bold text-gray-900 pt-10">Your Cart</h1>
          </div>
          <div class="px-4 py-6 sm:px-8 sm:py-10">
            <div class="flow-root">
               <?php
                  $stmt = $conn->prepare("select * from cart where user_id = ? and in_order = 0");
                  $stmt->execute([$user_id]);
                  $res = $stmt->get_result();

                  if($res->num_rows > 0)
                  {
                    while($row = $res->fetch_assoc())
                    {
                      $product_id = $row['product_id'];
                      $image = $row['image'];
                      $brand = $row['brand'];
                      $name = $row['name'];
                      $price = $row['price'];
                      $size = $row['size'];

                      switch ($size) 
                      {
                        case 'xs':
                            $size_label = 'Extra small';
                            break;
                        case 'sm':
                            $size_label = 'Small';
                            break;
                        case 'md':
                            $size_label = 'Medium';
                            break;
                        case 'lg':
                            $size_label = 'Large';
                            break;
                        case 'xlg':
                            $size_label = 'Extra Large';
                            break;
                        default:
                            $size_label = '';
                            break;
                      }
                    
                      $price_format = number_format($price, 2, '.', ',');

                      ?>
                      <form method="post">
                        <ul class="-my-8 mb-5">
                          <input type="checkbox" name="checkout[]" value="<?php echo $product_id ?>">

                          <li class="flex flex-col py-6 space-y-3 text-left sm:flex-row sm:space-x-5 sm:space-y-0">
                            <!-- image of product  -->
                            <div class="shrink-0">
                              <img src="<?php echo $image ?>" class="object-cover w-24 h-24 max-w-full rounded-lg">
                            </div>
                            <!-- product id and name  -->
                            <div class="relative flex flex-col justify-between flex-1">
                              <div class="sm:col-gap-5 sm:grid sm:grid-cols-2">
                                <div class="pr-8 sm:pr-5">
                                  <p class="text-base font-bold text-gray-900">
                                    <?php echo $product_id .' | '. $name?>
                                  </p>
                                  <p>Size : <span class="text-red-600"><?php echo $size_label ?></span></p>
                                </div>
                                <!-- price  -->
                                <div class="flex items-end justify-between mt-4 sm:mt-0 sm:items-start sm:justify-end">
                                  <p class="w-20 text-base font-semibold text-gray-900 shrink-0 sm:order-2 sm:ml-8 sm:text-right">
                                    ₱<?php echo $price_format?>  
                                  </p>
                                  <!-- remove from cart  -->
                                  <div class="sm:order-1">
                                    <a href="cart.php?remove=<?php echo $product_id?>" class="font-bold mx-auto text-red-600">
                                      Remove
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      <?php
                    }
                    ?>
                      <!-- check out btn  -->
                      <div class="mt-6 text-end">
                        <?php
                          if(isset($_POST['proceed_check_out']) && isset($_POST['checkout']))
                          {
                            // initialization 
                            $checkout = $_POST['checkout'];
                           
                            foreach($checkout as $i => $checkouts)
                            {
                              // insert into orders 
                              $stmt1 = $conn->prepare
                              ("insert into orders (user_id, product_id) values (?,?)");
                              $stmt1->execute([$user_id, $checkouts]);

                              // update from cart
                              $stmt2 = $conn->prepare("update cart set in_order = 1 where user_id = ? and product_id = ?");
                              $stmt2->execute([$user_id, $checkouts]);

                              if($stmt1->affected_rows > 0)
                              {
                                echo'
                                <script>
                                  location.href = "check_out.php"; 
                                </script>
                                ';
                              }
                            }
                          }
                          else
                          {
                            echo 
                            '
                              <div class="grid grid-cols-2 gap-10">
                                <div class="text-left text-red-600">
                                  Please select at least one to check out.
                                </div>
                            ';
                          }
                          
                        ?>
                          <div>
                            <button name="proceed_check_out" type="submit" class="relative inline-block px-4 py-2 font-medium group">
                              <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                              <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                              <span class="relative text-black group-hover:text-white">Proceed Check out</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php
                  }
                  else{
                    ?>
                      <h4 class="text-white p-10 bg-gray-500 text-center font-semibold text-xl">Cart is empty.</h4>
                    <?php
                  }
               ?>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTACT START -->
  <!-- ====== Contact Start ====== -->
  <section id="contact" class="relative  bg-gray-200  md:py-[100px]">
    <div class="absolute top-0 left-0 z-[-1] h-1/2 w-full lg:h-[45%] xl:h-1/2"></div>
    <div class="container px-4">
      <div class="flex flex-wrap items-center -mx-4 ">
        <div class="w-full px-4 lg:w-7/12 xl:w-8/12 ">
          <div class="ud-contact-content-wrapper">
            <div class="ud-contact-title mb-12 lg:mb-[150px]">
              <span class="mb-5 text-base font-semibold text-indigo-600">
                CONTACT US
              </span>
              <h2 class="text-[35px] font-semibold text-gray-900 pb-4">
                Let's talk about
                <br />
                Love to hear from you!
              </h2>
            </div>
            <hr class="my-6 border-gray-800 sm:mx-auto lg:my-8" />
            <div class="flex flex-wrap justify-between mb-12 lg:mb-0 ">
              <div class="mb-8 flex w-[330px] max-w-full">
                <div class="mr-6 text-[32px] text-gray-900">
                  <svg width="29" height="35" viewbox="0 0 29 35" class="fill-current">
                    <path
                      d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                    <path
                      d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
                  </svg>
                </div>
                <div>
                  <h5 class="mb-6 text-lg font-semibold">Our Location</h5>
                  <p class="text-base text-indigo-600">
                    Blk 3 Lot 26 Phase 2 Bella Solana Barangay Bigaa Cabuyao Laguna
                  </p>
                </div>
              </div>
              <div class="mb-8 flex w-[330px] max-w-full">
                <div class="mr-6 text-[32px] text-gray-900">
                  <svg width="34" height="25" viewbox="0 0 34 25" class="fill-current">
                    <path
                      d="M30.5156 0.960938H3.17188C1.42188 0.960938 0 2.38281 0 4.13281V20.9219C0 22.6719 1.42188 24.0938 3.17188 24.0938H30.5156C32.2656 24.0938 33.6875 22.6719 33.6875 20.9219V4.13281C33.6875 2.38281 32.2656 0.960938 30.5156 0.960938ZM30.5156 2.875C30.7891 2.875 31.0078 2.92969 31.2266 3.09375L17.6094 11.3516C17.1172 11.625 16.5703 11.625 16.0781 11.3516L2.46094 3.09375C2.67969 2.98438 2.89844 2.875 3.17188 2.875H30.5156ZM30.5156 22.125H3.17188C2.51562 22.125 1.91406 21.5781 1.91406 20.8672V5.00781L15.0391 12.9922C15.5859 13.3203 16.1875 13.4844 16.7891 13.4844C17.3906 13.4844 17.9922 13.3203 18.5391 12.9922L31.6641 5.00781V20.8672C31.7734 21.5781 31.1719 22.125 30.5156 22.125Z" />
                  </svg>
                </div>
                <div>
                  <h5 class="mb-6 text-lg font-semibold">How Can We Help?</h5>
                  <p class="text-base text-indigo-600">headturnermc@yahoo.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-4 lg:w-5/12 xl:w-4/12">
          <div
            class="wow fadeInUp rounded-lg bg-gray-100 py-10 px-8 sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
            data-wow-delay=".2s
                                                  ">
            <h3 class="mb-8 text-2xl font-semibold md:text-[26px]">
              Send us a Message
            </h3>
            <form>
              <div class="mb-6">
                <label for="fullName" class="block text-xs text-gray-950">Full Name*</label>
                <input type="text" name="fullName" placeholder="Jane Doe"
                  class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
              </div>
              <div class="mb-6">
                <label for="email" class="block text-xs text-gray-950">Email*</label>
                <input type="email" name="email" placeholder="example@yourmail.com"
                  class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
              </div>
              <div class="mb-6">
                <label for="phone" class="block text-xs text-gray-950">Phone*</label>
                <input type="text" name="phone" placeholder="+63912345678"
                  class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
              </div>
              <div class="mb-6">
                <label for="message" class="block text-xs text-gray-950">Message*</label>
                <textarea name="message" rows="1" placeholder="  type your message here"
                  class="w-full resize-none border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"></textarea>
              </div>
              <div class="mb-0">
                <button type="submit" class="relative inline-block px-4 py-2 font-medium group">
                  <span
                    class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                  <span
                    class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                  <span class="relative text-black group-hover:text-white">Send Message</span>
                </button>


              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Contact End ====== -->

  <section>
    <?php
    // navigation bar 
    include 'include/footer.php';
    // footer link
    include "include/footer_link.php";
    ?>

  </section>

</body>

</html>