<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile | HEADTURNERS</title>

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

<body class="antialiased ">

<!-- navigation bar  -->
<nav class="fixed top-0 z-50 py-6 w-full bg-white border-b border-gray-200  dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-500 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
        </div>
        <div class="navbar-center hidden lg:flex z-60">
          <ul class="menu menu-horizontal px-1">
            <li> 
                <a href="index.php" class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
                <span
                  class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                <span class="relative text-black group-hover:text-white">Home</span>
              </a>
            </li>
            <li> 
                <a href="../index.php#about" class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white">About</span>
                </a>
            </li>
            <li> 
                <a href="#contact" class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white">Contact</span>
                </a>
            </li>
          </ul>
      <!-- dropdown arrow -->
      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
        <span class="relative text-black group-hover:text-white">SHOP</span>
      </button>
      <!-- Dropdown menu -->
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
          <li>
            <a href="shop.php?product=shark" class="block px-4 py-2 hover:bg-gray-100">SHARK</a>
          </li>
          <li>
            <a href="shop.php?product=shoei" class="block px-4 py-2 hover:bg-gray-100">SHOEI</a>
          </li>
          <li>
            <a href="shop.php?product=avg" class="block px-4 py-2 hover:bg-gray-100">AGV</a>
          </li>
          <li>
            <a href="shop.php?product=arai" class="block px-4 py-2 hover:bg-gray-100">ARAI</a>
          </li>
        </ul>
      </div>
      <!-- end of dropdown -->
    </div>
    <div class="flex items-center">
        <!-- order summary icon  -->
        <label tabindex="0" class="btn btn-ghost btn-circle">
            <div class="indicator">
                <a href="check_out.php">
                <svg width="30" height="30" fill="#4f4fbd" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2.125 13.17A.5.5 0 012.5 13H8a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 18H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zM5.81 2.563A1.5 1.5 0 016.98 2h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 11-.78.624l-3.7-4.624A.5.5 0 0013.02 3H6.98a.5.5 0 00-.39.188l-3.7 4.624a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2.125 7.17A.5.5 0 012.5 7H8a.5.5 0 01.5.5 1.5 1.5 0 003 0A.5.5 0 0112 7h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 12H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
                </svg>
                <span class="badge badge-sm indicator-item">
                    <?php
                        // count all from payment 
                        $stmt_count_order = $conn->prepare("select count(*) from orders where user_id = ?");
                        $stmt_count_order->execute([$user_id]);
                        $res_count_order = $stmt_count_order->get_result();
                        $count_order = mysqli_fetch_array($res_count_order)[0];
                        echo $count_order;
                    ?>
                </span>
                </a>
            </div>
        </label>
        <!-- Profile -->
        <div class="flex items-center ml-3">
            <!-- cart drop down  -->
            <div class="dropdown dropdown-end">
              <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span class="badge badge-sm indicator-item">
                    <?php
                        // count all from cart 
                        $stmt_count = $conn->prepare("select count(*) from cart where user_id = ? and in_order = 0");
                        $stmt_count->execute([$user_id]);
                        $res_count = $stmt_count->get_result();
                        $count_cart = mysqli_fetch_array($res_count)[0];
                        echo $count_cart;

                        // sum the amount of cart
                        $stmt_sum = $conn->prepare("SELECT SUM(price) AS subtotal FROM cart WHERE user_id = ? and in_order = 0");
                        $stmt_sum->execute([$user_id]);
                        $res_sum = $stmt_sum->get_result();
                        $row_sum = $res_sum->fetch_assoc();
                        $subtotal = $row_sum['subtotal'];
                        $subtotal_format = number_format($subtotal, 2, '.', ',');
                    ?>
                  </span>
                </div>
              </label>
              <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                  <h3 class="font-bold text-lg"><?php echo $count_cart ?> Items</h3>
                  <h3 class="">
                    Subtotal : <span class="text-red-600"> ₱<?php echo $subtotal_format ?></span></h3>
                  <div class="card-actions">
                    <a href="cart.php"
                      class="flex justify-center gap-1 relative inline-block px-10 py-2 text-sm font-medium group">
                      <span
                        class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                      <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                      <span class="relative text-black group-hover:text-white">View Cart</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- profile drop down  -->
            <div class="dropdown dropdown-end">
              <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                  <!-- display image  -->
                  <?php
                    if(empty($image))
                    {
                        echo'
                            <img src="assets/images/profile/default_profile.png" >
                        ';
                    }   
                    else{
                        echo'
                            <img src="'.$image.'">
                        ';
                    }
                  ?>
                </div>
              </label>
              <div tabindex="0" class="mt-3 card card-compact dropdown-content w-42 bg-base-100 shadow">
                <div class="card-body">
                  <div class="card-actions">
                    <a href="profile.php?tab=personal_profile"
                      class="flex justify-center relative inline-block px-12 py-2 w-full text-sm font-medium group">
                      <span
                        class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                      <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                      <span class="relative text-black flex  group-hover:text-white">Profile</span>
                    </a>
                    <div class="card-actions">
                      <a data-modal-target="logout-modal" data-modal-toggle="logout-modal"
                        class="flex justify-center relative inline-block px-12 py-2 w-full text-sm font-medium group">
                        <span
                          class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span
                          class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <span class="relative text-black group-hover:text-white">Logout</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</nav>
<!-- aside navigation bar  -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen xl:pt-[6%] transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0  dark:border-gray-700" aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-[40%] xl:pt-0 bg-white border-r border-gray-200  dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200  dark:divide-gray-700">
            <ul class="pb-2 space-y-2">
                <li>
                    <a href="profile.php?tab=personal_profile" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group  dark:hover:bg-gray-500">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 16s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H5zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-3" sidebar-toggle-item>Personal Information</span>
                    </a>
                </li>
                <li>
                    <a href="cart.php" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group  dark:hover:bg-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="ml-3" sidebar-toggle-item>My Cart</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  dark:hover:bg-gray-500" aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                        <svg width="20" height="20" fill="black" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.125 13.17A.5.5 0 012.5 13H8a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 18H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zM5.81 2.563A1.5 1.5 0 016.98 2h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 11-.78.624l-3.7-4.624A.5.5 0 0013.02 3H6.98a.5.5 0 00-.39.188l-3.7 4.624a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M2.125 7.17A.5.5 0 012.5 7H8a.5.5 0 01.5.5 1.5 1.5 0 003 0A.5.5 0 0112 7h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 12H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>My orders</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <ul id="dropdown-crud" class="space-y-2 py-2">
                        <li>
                            <a href="profile.php?tab=to_ship" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11  dark:hover:bg-gray-500 ">
                                <img src="assets/images/shipping_icon/to_ship.png"> &nbsp;&nbsp; 
                                <?php 
                                    // count place order 
                                    $stmt_count_place_order = $conn->prepare("select count(order_id) from place_order where user_id = ? and shipped = 0 group by order_id");
                                    $stmt_count_place_order->execute([$user_id]);
                                    $res_count_place_order = $stmt_count_place_order->get_result();
                                    $count_place_order = $res_count_place_order->num_rows > 0 ? $res_count_place_order->num_rows : 0;
                                ?>
                                To ship &nbsp; <span class="text-red-500"> <?php echo $count_place_order ?> </span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.php?tab=shipped" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11  dark:hover:bg-gray-500 ">
                                <img src="assets/images/shipping_icon/shipped.png"> &nbsp;&nbsp;
                                <?php 
                                    // count shipped 
                                    $stmt_count_shipped = $conn->prepare("select count(order_id) from place_order where user_id = ? and shipped = 1 group by order_id");
                                    $stmt_count_shipped->execute([$user_id]);
                                    $res_count_shipped = $stmt_count_shipped->get_result();
                                    $count_shipped = $res_count_shipped->num_rows > 0 ? $res_count_shipped->num_rows : 0;
                                ?> 
                                Shipped &nbsp; <span class="text-red-500"> <?php echo $count_shipped ?> </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="profile.php?tab=order_history" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group  dark:hover:bg-gray-500 {{ if eq $page_slug "settings" }} bg-gray-100  {{ end }}">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM5.5 9.5h4v-5a.5.5 0 011 0V10a.5.5 0 01-.5.5H5.5a.5.5 0 010-1z" clip-rule="evenodd"/>
                        </svg>    
                        <span class="ml-3" sidebar-toggle-item>Order History</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php?tab=change_password" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group  dark:hover:bg-gray-500 {{ if eq $page_slug "settings" }} bg-gray-100  {{ end }}">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                            <rect width="11" height="9" x="4.5" y="8" rx="2"/>
                            <path fill-rule="evenodd" d="M6.5 5a3.5 3.5 0 117 0v3h-1V5a2.5 2.5 0 00-5 0v3h-1V5z" clip-rule="evenodd"/>
                        </svg>    
                        <span class="ml-3" sidebar-toggle-item>Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</aside>

<div class="p-4 sm:ml-64">
    <div class="grid grid-cols-1 px-4 pt-28 xl:grid-cols-3 xl:gap-4 ">
        <!-- Right Content -->
        <?php
            if(isset($_GET['tab']))
            {
                $tab = $_GET['tab'];

                if($tab == 'personal_profile')
                {
                    ?>
                        <!-- ////////////////////////////////  left span  -->
                        <div class="col-span-full xl:col-auto">
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                                <?php
                                    // if updated profile image is pressed in form 
                                    if(isset($_POST['upload_profile']))
                                    {
                                        $upload_ext = strtolower(pathinfo($_FILES['upload_profile']['name'], PATHINFO_EXTENSION));
                                        $upload_name = 'profile-' . rand(10000000,99999999);
                                        $upload_profile = 'profile_upload/'. $upload_name .'.'. $upload_ext;

                                        if(!in_array($upload_ext, array('jpg','jpeg', 'png')))
                                        {
                                            echo'
                                                <div class="msg_001">
                                                    Only JPG, JPEG, and PNG files are allowed.
                                                </div>
                                            ';
                                        }
                                        else if($_FILES['upload_profile']['size'] > 2000000)
                                        {
                                            echo'
                                                <div class="msg_001">
                                                    Only JPG, JPEG, and PNG files are allowed.
                                                </div>
                                            ';
                                        }
                                        else if(move_uploaded_file($_FILES['upload_profile']['tmp_name'], $upload_profile))
                                        {
                                            // update users profile picture 
                                            $stmt = $conn->prepare("update users set image = ? where id = ?");
                                            $stmt->execute([$upload_profile, $user_id]);

                                            if($stmt->affected_rows > 0)
                                            {
                                                ?>
                                                    <script>
                                                        location.href = "profile.php?tab=personal_profile";
                                                    </script>
                                                <?php
                                            }
                                            else{
                                                echo 'Something went wrong, pleas try again.';
                                            }
                                        }
                                    }
                                    if(isset($_POST['default_profile']))
                                    {
                                        // update profile in user  
                                        $stmt = $conn->prepare("update users set image = '' where id = ?");
                                        $stmt->execute([$user_id]);

                                        ?>
                                        <script>
                                            location.href = "profile.php?tab=personal_profile";
                                        </script>
                                        <?php
                                    }
                                ?>
                                <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                                    <!-- edit profile image  -->
                                    <form method="post" enctype="multipart/form-data">
                                        <?php
                                            if(empty($image))
                                            {
                                                echo '
                                                    <img src="assets/images/profile/default_profile.png" class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0">
                                                ';
                                            }
                                            else
                                            {
                                                echo '
                                                    <img src="'.$image.'" class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0">
                                                ';
                                            }
                                        ?>
                                        <div>
                                            <h3 class="mb-1 text-xl font-bold text-gray-900 ">Profile picture</h3>
                                            <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                                JPG, JPEG or PNG. Max size of 2MB.
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <!-- input file  -->
                                                <input type="file" name="upload_profile" class="inline-flex items-center py-2 text-sm font-medium text-center">
                                                <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path><path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path></svg>
                                            </div>
                                            <!-- default image button  -->
                                            <button type="submit" name="default_profile" onclick="return confirm('Are you sure you want to use default profile ?')" class="bg-transparent text-sm hover:bg-red-700 text-red-700 font-semibold hover:text-white py-2 px-2 border border-red-500 hover:border-transparent">
                                                Use Default
                                            </button>
                                            <!-- update btn  -->
                                            <input type="submit" value="Upload Image" name="upload_profile" class="bg-transparent text-sm hover:bg-gray-700 text-gray-700 font-semibold hover:text-white py-2 px-2 border border-gray-500 hover:border-transparent">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- order history  -->
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                                <div class="mb-6">
                                    <div class="relative overflow-x-auto">
                                        <?php
                                            $stmt_sel_place_order = $conn->prepare("SELECT COUNT(order_id),
                                                                                        ANY_VALUE(order_id) AS order_id,
                                                                                        ANY_VALUE(qnty) AS qnty, 
                                                                                        ANY_VALUE(total_bill) AS total_bill, 
                                                                                        ANY_VALUE(pay_method) AS pay_method, 
                                                                                        ANY_VALUE(order_date) AS order_date, 
                                                                                        ANY_VALUE(shipped) AS shipped 
                                                                                            from place_order where user_id = ?
                                                                                            group by order_id");
                                            $stmt_sel_place_order->execute([$user_id]);
                                            $res_sel_place_order = $stmt_sel_place_order->get_result();

                                            if($res_sel_place_order->num_rows > 0)
                                            {
                                                echo '
                                                <h3 class="mb-4 text-xl font-semibold ">
                                                    My Order 
                                                </h3>
                                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-1 py-3">
                                                                ORDER # ID 
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                TOTAL BILL
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                ORDER DATE 
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                STATUS 
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                ';
                                                while($row = $res_sel_place_order->fetch_assoc())
                                                {
                                                    $order_id = $row['order_id'];
                                                    $qnty = $row['qnty'];
                                                    $total_bill = $row['total_bill'];
                                                    $pay_method = $row['pay_method'];
                                                    $order_date = $row['order_date'];
                                                    $shipped = $row['shipped'];

                                                    $date = new DateTime($order_date);
                                                    $formattedDate = $date->format('F j, Y');

                                                    // format bill 
                                                    $total_bill_format = number_format($total_bill, 2, '.', ',');
                                                    // pay method 
                                                    if($pay_method == 'gcash')
                                                    {
                                                        $pay_method = '<img src="assets/images/pay_method/gcash_logo.png" class="w-20 mx-auto">';
                                                    }
                                                    else if($pay_method == 'maya')
                                                    {
                                                        $pay_method = '<img src="assets/images/pay_method/maya_logo.png" class="w-20 mx-auto">';
                                                    }

                                                    // shipped 
                                                    if($shipped == 0)
                                                    {
                                                        $shipped = '<span class="bg-orange-200 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                                    To ship
                                                                    </span>';
                                                    }
                                                    else{
                                                        $shipped = '<span class="bg-green-200 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                                    Delivered
                                                                    </span>';
                                                    }

                                                    echo '
                                                    <tbody>
                                                        <tr class="bg-white border-b  dark:border-gray-700">
                                                            <th class="py-4">
                                                                # '.$order_id.'
                                                            </th>
                                                            <td class="py-4 text-red-500 font-bold">
                                                                ₱ '.$total_bill_format.'
                                                            </td>
                                                            <td class="py-4">
                                                                '.$formattedDate.'
                                                            </td>
                                                            <td class=" py-4">
                                                                '.$shipped.'
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    ';
                                                }
                                                echo'
                                                </table>
                                                ';
                                            }
                                            else{
                                                ?>
                                                <h4 class="text-white p-10 bg-gray-500 text-center font-semibold text-xl">
                                                    There are no pending deliveries.
                                                </h4>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- //////////////////////////////// right span  -->
                        <div class="col-span-2">
                            <!-- general information here  -->
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                                <?php
                                    if(isset($_POST['edit_gen_info']))
                                    {
                                        $fname = $_POST['fname'];
                                        $lname = $_POST['lname'];
                                        $contact = $_POST['contact'];
                                        $address = $_POST['address'];

                                        $stmt = $conn->prepare("update users set fname = ?, lname = ?, contact = ?, address = ? where id = ?");
                                        $stmt->execute([$fname,$lname,$contact,$address, $user_id]);

                                        if($stmt->affected_rows > 0)
                                        {
                                            ?>
                                                <script>
                                                    location.href = "profile.php?tab=personal_profile";
                                                </script>
                                            <?php
                                        }
                                        else{
                                            echo '<div class="msg_001">
                                                Something went wrong please try again 
                                            </div>';
                                        }
                                    }
                                        
                                ?>
                                <h3 class="mb-4 text-xl font-semibold ">General Information</h3>
                                <form method="post">
                                    <div class="grid grid-cols-6 gap-6">
                                        <!-- first name  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                                            <input type="text" value="<?php echo $fname ?>" readonly id="fname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                        <!-- last name  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                                            <input type="text" value="<?php echo $lname ?>" readonly id="lname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                        <!-- contact  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 ">Contact +63</label>
                                            <input type="text" value="<?php echo $contact ?>" readonly id="contact" maxlength="10" minlength="10" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                        <!-- address  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                                            <input type="text" value="<?php echo $address ?>" readonly id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                    </div>
                                        <!-- Modal button -->
                                        <button data-modal-target="edit_profile_modal" data-modal-toggle="edit_profile_modal" type="button" class="bg-transparent mt-5 text-sm hover:bg-gray-700 text-gray-700 font-semibold hover:text-white py-2 px-2 border border-gray-500 hover:border-transparent">
                                            Edit Information
                                        </button>
                                </form>
                            </div>
                            <!-- socials here  -->
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                                <div class="flow-root">
                                    <h3 class="text-xl font-semibold ">Social accounts</h3>
                                    <!-- Modal button -->
                                    <button data-modal-target="modal_social" data-modal-toggle="modal_social" type="button" 
                                        class="bg-transparent mt-5 text-sm hover:bg-gray-700 text-gray-700 font-semibold hover:text-white py-2 px-2 border border-gray-500 hover:border-transparent">
                                        Add Socials
                                    </button>
                                    <br>
                                    <?php
                                        if(isset($_POST['add_social']))
                                        {
                                            $social_select = $_POST['social_select'];
                                            $social_link = $_POST['social_link'];

                                            if (filter_var($social_link, FILTER_VALIDATE_URL)) 
                                            {
                                                
                                                $stmt_add_social = $conn->prepare("insert into users_socials (user_id, social_name, social_link) values(?,?,?) ");
                                                $stmt_add_social->execute([$user_id, $social_select, $social_link]);

                                                if($stmt_add_social->affected_rows > 0)
                                                {
                                                    echo '
                                                    <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400  dark:border-green-800" role="alert">
                                                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                        <div class="ml-3 text-sm font-medium">
                                                            Successfully added social account.
                                                        </div>
                                                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8  dark:text-green-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                                                            <span class="sr-only">Dismiss</span>
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        </button>
                                                    </div>';
                                                }
                                            } 
                                            else 
                                            {
                                                echo '
                                                <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400  dark:border-red-800" role="alert">
                                                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                    <div class="ml-3 text-sm font-medium">
                                                        Invalid Link.
                                                    </div>
                                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                                                        <span class="sr-only">Dismiss</span>
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </div>';
                                            }

                                            
                                        }
                                    ?>
                                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <!-- add socials  -->
                                        <?php
                                            $stmt_select_socials = $conn->prepare("select us.*,s.* from users_socials us join socials s on us.social_name = s.social_name where us.user_id = ?");
                                            $stmt_select_socials->execute([$user_id]);
                                            $res_select_socials = $stmt_select_socials->get_result();

                                            if($res_select_socials->num_rows > 0)
                                            {
                                                while($row_select_socials = $res_select_socials->fetch_assoc())
                                                {
                                                    $social_name = $row_select_socials['social_name'];
                                                    $social_link = $row_select_socials['social_link'];
                                                    $social_icon = $row_select_socials['social_icon'];

                                                    echo '
                                                    <li class="py-4">
                                                        <div class="flex items-center space-x-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="'.$social_icon.'" alt="" class="">
                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <span class="block text-base font-semibold text-gray-900 truncate ">
                                                                    '.$social_name.'
                                                                </span>
                                                                <a href="'.$social_link.'" target="blank" class="block text-sm font-normal truncate text-gray-700 hover:underline dark:text-gray-500">
                                                                    '.$social_link.'
                                                                </a>
                                                            </div>
                                                            <div class="inline-flex items-center">
                                                                <a href="profile.php?tab=personal_profile&remove_social=true&user_id='.$user_id.'&social_name='.$social_name.'&social_link='.$social_link.'" 
                                                                class="px-3 py-2 mb-3 mr-3 text-sm font-medium text-center text-red-600 border rounded bg-round border-red-600 hover:bg-red-600 hover:text-white">
                                                                    remove
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    ';
                                                }
                                            }
                                            else{
                                                echo '
                                                <h1 class="text-white p-5 mt-3 text-2xl font-bold bg-gray-600 text-center">
                                                    No socials added yet.
                                                </h1>
                                                ';
                                            }

                                            // remove socials 
                                            if(isset($_GET['remove_social']) && isset($_GET['user_id']) && isset($_GET['social_name']) && isset($_GET['social_link']))
                                            {
                                                // initialization 
                                                $remove_social = $_GET['remove_social'];
                                                $user_id = $_GET['user_id'];
                                                $social_name = $_GET['social_name'];
                                                $social_link = $_GET['social_link'];

                                                if($remove_social == 'true')
                                                {
                                                    $stmt_remove_socials = $conn->prepare("delete from users_socials where user_id = ? and social_name = ? and social_link = ?");
                                                    $stmt_remove_socials->execute([$user_id, $social_name, $social_link]);
                                                    
                                                    if($stmt_remove_socials->affected_rows > 0)
                                                    {
                                                        ?>
                                                        <script>
                                                            location.href = "profile.php?tab=personal_profile";
                                                        </script>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                        
                                    </ul>
                                </div>
                                <?php
                                    include 'modals/modal_socials.php';
                                ?>
                            </div>
                        </div>
                    <?php
                }
                if($tab == 'to_ship')
                {
                    ?>
                        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                            <div class="mb-6">
                                <div class="relative overflow-x-auto">
                                    <!-- grid  -->
                                    <div class="grid grid-cols-1 gap-3">
                                        <!-- left  -->
                                        <div>
                                            <?php
                                                $stmt_sel_place_order = $conn->prepare("SELECT COUNT(order_id), 
                                                                                               ANY_VALUE(order_id) AS order_id, 
                                                                                               ANY_VALUE(qnty) AS qnty, 
                                                                                               ANY_VALUE(total_bill) AS total_bill,
                                                                                               ANY_VALUE(pay_method) AS pay_method, 
                                                                                               ANY_VALUE(order_date) AS order_date 
                                                                                                    from place_order 
                                                                                                    where user_id = ? and shipped = 0 
                                                                                                        GROUP BY order_id 
                                                                                                        ORDER BY order_date DESC");
                                                $stmt_sel_place_order->execute([$user_id]);
                                                $res_sel_place_order = $stmt_sel_place_order->get_result();

                                                if($res_sel_place_order->num_rows > 0)
                                                {
                                                    echo '
                                                    <div class="bg-orange-200 text-center text-orange-800 text-lg font-medium m-2 p-3 rounded-full dark:bg-orange-900 dark:text-green-300">
                                                       Order to ship
                                                    </div>
                                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-1 py-3">
                                                                    ORDER ID 
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    TOTAL BILL
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    PAYMENT METHOD
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    ORDER DATE 
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    DETAILS 
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    ';
                                                    while($row = $res_sel_place_order->fetch_assoc())
                                                    {
                                                        $order_id = $row['order_id'];
                                                        $qnty = $row['qnty'];
                                                        $total_bill = $row['total_bill'];
                                                        $pay_method = $row['pay_method'];
                                                        $order_date = $row['order_date'];

                                                        $date = new DateTime($order_date);
                                                        $formattedDate = $date->format('F j, Y');

                                                        // format bill 
                                                        $total_bill_format = number_format($total_bill, 2, '.', ',');
                                                        // pay method 
                                                        if($pay_method == 'gcash')
                                                        {
                                                            $pay_method = '<h3 class="font-semibold text-blue-600"> Gcash </h3>';
                                                        }
                                                        else if($pay_method == 'maya')
                                                        {
                                                            $pay_method = '<h3 class="font-semibold text-green-600"> Pay Maya </h3>';
                                                        }
                                                        echo '
                                                        <tbody>
                                                            <tr class="bg-white border-b  dark:border-gray-700">
                                                                <td class="py-4 font-semibold">
                                                                    #<span class="text-blue-700"> '.$order_id.' </span>
                                                                </td>
                                                                <td class="py-4">
                                                                    ₱ '.$total_bill_format.'
                                                                </td>
                                                                <td class="py-4">
                                                                    '.$pay_method.'
                                                                </td>
                                                                <td class="py-4">
                                                                    '.$formattedDate.'
                                                                </td>
                                                                <td class="py-1">
                                                                    <a href="profile.php?tab='.$tab.'&order_id='.$order_id.'" >
                                                                        <p class="bg-blue-500 text-white p-1">
                                                                            View Details
                                                                        </p>
                                                                    </a>
                                                                </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                        ';
                                                    }
                                                    echo'
                                                    </table>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <h4 class="text-white p-10 bg-gray-500 text-center font-semibold text-xl">
                                                        There are no pending deliveries.
                                                    </h4>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- right  -->
                                        <div>
                                            <?php
                                                if(isset($_GET['order_id']))
                                                {
                                                    $order_id = $_GET['order_id'];

                                                    $stmt_get_order_details = $conn->prepare("SELECT po.*,p.* from place_order po join products p on po.product_id = p.product_id
                                                                                                where po.user_id = ? and po.order_id = ?");
                                                    $stmt_get_order_details->execute([$user_id, $order_id]);
                                                    $res_get_order_details = $stmt_get_order_details->get_result();

                                                    if($res_get_order_details->num_rows > 0)
                                                    {
                                                        echo '
                                                        <h3 class="mb-4 text-xl font-semibold ">
                                                            Details
                                                        </h3>
                                                        <h4 class="">
                                                            Shipping fee: <span class="text-red-600">+₱38.00</span><br>
                                                            Order: <span class="text-blue-700"> #'.$order_id.' </span>
                                                        </h4>
                                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-1 py-3">
                                                                        IMAGE 
                                                                    </th>
                                                                    <th scope="col" class="px-1 py-3">
                                                                        PRODUCT ID 
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        QUANTITY
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        SIZE
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        PRICE
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        TOTAL PRICE
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        ';
                                                        while($row2 = $res_get_order_details->fetch_assoc())
                                                        {
                                                            $image = $row2['image'];
                                                            $product_id = $row2['product_id'];
                                                            $qnty = $row2['qnty'];
                                                            $size = $row2['size'];
                                                            $price = $row2['price'];
                                                            $pay_method = $row2['pay_method'];
                                                            $total_bill = $row2['total_bill'];
                                                            $proof_image = $row2['proof_image'];

                                                            // total price 
                                                            $ttl_price = ($price * $qnty);
                                                            // formats 
                                                            $price_format = number_format($price, 2, '.', ',');
                                                            $ttl_price_format = number_format($ttl_price, 2, '.', ',');
                                                            $total_bill_format = number_format($total_bill, 2, '.', ',');

                                                            echo '
                                                            <tbody>
                                                                <tr class="bg-white border-b  dark:border-gray-700">
                                                                    <th class="py-4">
                                                                        <img src="'.$image.'" class="h-20 mx-auto">
                                                                    </th>
                                                                    <td class="py-4 font-semibold">
                                                                        '.$product_id.'
                                                                    </td>
                                                                    <td class="py-4 font-semibold">
                                                                        '.$qnty.' item/s
                                                                    </td>
                                                                    <td class="py-4 font-semibold">
                                                                        '.$size.'
                                                                    </td>
                                                                    <td class="py-4 font-semibold">
                                                                        ₱ '.$price_format.' 
                                                                    </td>
                                                                    <td class="py-4 font-bold text-red-600">
                                                                        ₱ '.$ttl_price_format.' 
                                                                    </td>
                                                                    
                                                                </tr>
                                                            ';
                                                        }
                                                        echo'
                                                                <tr class="">
                                                                    <td class="py-4 font-bold">
                                                                        Total Bill :
                                                                        <span class="text-red-600">
                                                                            ₱ '.$total_bill_format.' 
                                                                        </span> 
                                                                    </td>
                                                                    <td class="py-4 font-bold bg-red-600 text-white">
                                                                        <a href="profile.php?tab='.$tab.'">
                                                                            Close X
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <h2 class="pb-5 pt-[50px] font-semibold text-xl">Proof of payment :</h2>
                                                        <img src="'.$proof_image.'" alt="" class="h-[40%] w-auto object-contain">
                                                        ';
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    
                                        
                                </div>
                            </div>
                        </div>
                    <?php
                }
                if($tab == 'shipped')
                {
                    ?>
                        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                            <div class="mb-6">
                                <div class="relative overflow-x-auto">
                                    <!-- grid  -->
                                    <div class="grid grid-cols-1 gap-3">
                                        <!-- left  -->
                                        <div>
                                            <?php
                                                $stmt_sel_place_order = $conn->prepare("SELECT COUNT(order_id), 
                                                                                               ANY_VALUE(order_id) AS order_id, 
                                                                                               ANY_VALUE(qnty) AS qnty, 
                                                                                               ANY_VALUE(total_bill) AS total_bill, 
                                                                                               ANY_VALUE(pay_method) AS pay_method, 
                                                                                               ANY_VALUE(order_date) AS order_date 
                                                                                                    from place_order 
                                                                                                    where user_id = ? and shipped = 1 
                                                                                                        GROUP BY order_id 
                                                                                                        ORDER BY order_date DESC");
                                                $stmt_sel_place_order->execute([$user_id]);
                                                $res_sel_place_order = $stmt_sel_place_order->get_result();

                                                if($res_sel_place_order->num_rows > 0)
                                                {
                                                    echo '
                                                    <div class="bg-green-200 text-center text-green-800 text-lg font-medium m-2 p-3 rounded-full dark:bg-green-900 dark:text-green-300">
                                                       Completed Orders
                                                    </div>
                                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-1 py-3">
                                                                    ORDER ID 
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    TOTAL BILL
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    PAYMENT METHOD
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    ORDER DATE 
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    DETAILS 
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    ';
                                                    while($row = $res_sel_place_order->fetch_assoc())
                                                    {
                                                        $order_id = $row['order_id'];
                                                        $qnty = $row['qnty'];
                                                        $total_bill = $row['total_bill'];
                                                        $pay_method = $row['pay_method'];
                                                        $order_date = $row['order_date'];

                                                        $date = new DateTime($order_date);
                                                        $formattedDate = $date->format('F j, Y');

                                                        // format bill 
                                                        $total_bill_format = number_format($total_bill, 2, '.', ',');
                                                        // pay method 
                                                        if($pay_method == 'gcash')
                                                        {
                                                            $pay_method = '<h3 class="font-semibold text-blue-600"> Gcash </h3>';
                                                        }
                                                        else if($pay_method == 'maya')
                                                        {
                                                            $pay_method = '<h3 class="font-semibold text-green-600"> Pay Maya </h3>';
                                                        }
                                                        echo '
                                                        <tbody>
                                                            <tr class="bg-white border-b  dark:border-gray-700">
                                                                <td class="py-4 font-semibold">
                                                                    #<span class="text-blue-700"> '.$order_id.' </span>
                                                                </td>
                                                                <td class="py-4">
                                                                    ₱ '.$total_bill_format.'
                                                                </td>
                                                                <td class="py-4">
                                                                    '.$pay_method.'
                                                                </td>
                                                                <td class="py-4">
                                                                    '.$formattedDate.'
                                                                </td>
                                                              
                                                                <td class="py-1">
                                                                    <a href="profile.php?tab='.$tab.'&order_id='.$order_id.'" >
                                                                        <p class="bg-blue-500 text-white p-1">
                                                                            View Details
                                                                        </p>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        ';
                                                    }
                                                    echo'
                                                    </table>
                                                    ';
                                                }
                                                else{
                                                    ?>
                                                    <h4 class="text-white p-10 bg-gray-500 text-center font-semibold text-xl">
                                                        There are no pending deliveries.
                                                    </h4>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- view details  -->
                                        <div>
                                            <?php
                                                if(isset($_GET['order_id']))
                                                {
                                                    $order_id = $_GET['order_id'];

                                                    $stmt_get_order_details = $conn->prepare("SELECT po.*,p.* 
                                                                                                from place_order po join products p on po.product_id = p.product_id
                                                                                                where po.user_id = ? and po.order_id = ?");
                                                    $stmt_get_order_details->execute([$user_id, $order_id]);
                                                    $res_get_order_details = $stmt_get_order_details->get_result();

                                                    if($res_get_order_details->num_rows > 0)
                                                    {
                                                        echo '
                                                        <h3 class="mb-4 text-xl font-semibold ">
                                                            Details
                                                        </h3>
                                                        <h4 class="">
                                                            Shipping fee: <span class="text-red-600">+₱38.00</span><br>
                                                            Order: <span class="text-blue-700"> #'.$order_id.' </span>
                                                        </h4>
                                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-1 py-3">
                                                                        IMAGE 
                                                                    </th>
                                                                    <th scope="col" class="px-1 py-3">
                                                                        PRODUCT ID 
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        QUANTITY
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        SIZE
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        PRICE
                                                                    </th>
                                                                    <th scope="col" class="px-6 py-3">
                                                                        TOTAL PRICE
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        ';
                                                        while($row2 = $res_get_order_details->fetch_assoc())
                                                        {
                                                            $image = $row2['image'];
                                                            $product_id = $row2['product_id'];
                                                            $qnty = $row2['qnty'];
                                                            $size = $row2['size'];
                                                            $price = $row2['price'];
                                                            $pay_method = $row2['pay_method'];
                                                            $total_bill = $row2['total_bill'];

                                                            // total price 
                                                            $ttl_price = ($price * $qnty);
                                                            // formats 
                                                            $price_format = number_format($price, 2, '.', ',');
                                                            $ttl_price_format = number_format($ttl_price, 2, '.', ',');
                                                            $total_bill_format = number_format($total_bill, 2, '.', ',');

                                                            echo '
                                                            <tbody>
                                                                <tr class="bg-white border-b  dark:border-gray-700">
                                                                    <th class="py-4">
                                                                        <img src="'.$image.'" class="h-20 mx-auto">
                                                                    </th>
                                                                    <td class="py-4 font-semibold">
                                                                        '.$product_id.'
                                                                    </td>
                                                                    <td class="py-4 font-semibold">
                                                                        '.$qnty.' item/s
                                                                    </td>
                                                                    <td class="py-4 font-semibold">
                                                                        '.$size.'
                                                                    </td>
                                                                    <td class="py-4 font-semibold">
                                                                        ₱ '.$price_format.' 
                                                                    </td>
                                                                    <td class="py-4 font-bold text-red-600">
                                                                        ₱ '.$ttl_price_format.' 
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                        echo'
                                                                <tr class="">
                                                                    <td class="py-4 font-bold">
                                                                        Total Bill :
                                                                        <span class="text-red-600">
                                                                            ₱ '.$total_bill_format.' 
                                                                        </span> 
                                                                    </td>
                                                                    <td class="py-4 font-bold bg-red-600 text-white">
                                                                        <a href="profile.php?tab='.$tab.'">
                                                                            Close X
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        ';

                                                        // check if rated using user_id and order id
                                                        $stmt_rating = $conn->prepare("SELECT * from reviews where user_id =  ? and order_id = ?");
                                                        $stmt_rating->execute([$user_id, $order_id]);
                                                        $res_rating = $stmt_rating->get_result();

                                                        if($res_rating->num_rows > 0)
                                                        {
                                                            while($row_rating = $res_rating->fetch_assoc())
                                                            {
                                                                $message = $row_rating['message'];
                                                                $img = $row_rating['img'];
                                                                $rating = $row_rating['rating'];
                                                                $date = $row_rating['date'];

                                                                // format date 
                                                                $dateTime = new DateTime($date);
                                                                $formattedDate = $dateTime->format("F j, Y");

                                                                if(empty($img))
                                                                {
                                                                    $img_show = '';
                                                                }else{
                                                                    $img_show = '
                                                                    <img src="'.$img.'" class="object-cover w-[200px] h-auto">
                                                                    ';
                                                                }
                                                                ?>
                                                                <div class="cont" id="rating">
                                                                    <div class="stars">
                                                                        <h2 class="mt-5 text-2xl tracking-tight font-bold">
                                                                            (<?php echo $rating ?>) Star Rating
                                                                        </h2>
                                                                        <div class="text-red-500 font-semibold"><?php echo $formattedDate ?></div>
                                                                        <input class="star star-5" id="star-5" type="radio" name="star" <?php echo ($rating == 5) ? 'checked' : ''; ?> disabled/>
                                                                        <label class="star star-5" for="star-5"></label>
                                                                        <input class="star star-4" id="star-4" type="radio" name="star" <?php echo ($rating == 4) ? 'checked' : ''; ?> disabled/>
                                                                        <label class="star star-4" for="star-4"></label>
                                                                        <input class="star star-3" id="star-3" type="radio" name="star" <?php echo ($rating == 3) ? 'checked' : ''; ?> disabled/>
                                                                        <label class="star star-3" for="star-3"></label>
                                                                        <input class="star star-2" id="star-2" type="radio" name="star" <?php echo ($rating == 2) ? 'checked' : ''; ?> disabled/>
                                                                        <label class="star star-2" for="star-2"></label>
                                                                        <input class="star star-1" id="star-1" type="radio" name="star" <?php echo ($rating == 1) ? 'checked' : ''; ?> disabled/>
                                                                        <label class="star star-1" for="star-1"></label>
                                                                    </div>
                                                                    <p class="mb-5">
                                                                        <span class="font-bold">Comment:</span> <br>
                                                                        <?php echo $message ?>
                                                                    </p>
                                                                    <?php echo $img_show ?>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        else{
                                                            ?>
                                                            <section class="bg-white dark:bg-gray-900" id="rating">
                                                                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                                                                    <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">
                                                                        Product Review
                                                                    </h2>
                                                                    <p class="mb-1 lg:mb-1 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">
                                                                        Send us a feedback to improve our service.
                                                                    </p>
                                                                    <form method="post" enctype="multipart/form-data">
                                                                        <div class="cont">
                                                                            <div class="stars">
                                                                                <input class="star star-5" id="star-5" type="radio" name="star" value="5" required/>
                                                                                <label class="star star-5" for="star-5"></label>
                                                                                <input class="star star-4" id="star-4" type="radio" name="star" value="4" required/>
                                                                                <label class="star star-4" for="star-4"></label>
                                                                                <input class="star star-3" id="star-3" type="radio" name="star" value="3" required/>
                                                                                <label class="star star-3" for="star-3"></label>
                                                                                <input class="star star-2" id="star-2" type="radio" name="star" value="2" required/>
                                                                                <label class="star star-2" for="star-2"></label>
                                                                                <input class="star star-1" id="star-1" type="radio" name="star" value="1" required/>
                                                                                <label class="star star-1" for="star-1"></label>
                                                                                <!-- hidden comment and submit  -->
                                                                                <div class="rev-box">
                                                                                    <div class="sm:col-span-2">
                                                                                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                                                                            Review Comment
                                                                                        </label>
                                                                                        <textarea id="message" rows="6" name="message" maxlength="350" required class="block p-2.5 mb-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                                                                                    </div>
                                                                                    <input type="file" name="upload_feedback">
                                                                                    <button type="submit" name="submit_feedback" class="py-3 px-5 text-sm font-medium text-center text-gray-200 mt-4 rounded-lg bg-blue-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                                        Submit Review
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- if submit feedback is posted  -->
                                                                <?php
                                                                    if(isset($_POST['submit_feedback']))
                                                                    {
                                                                        $star = $_POST['star'];
                                                                        $message = $_POST['message'];

                                                                        if (isset($_FILES['upload_feedback']['name']) && !empty($_FILES['upload_feedback']['name'])) 
                                                                        {
                                                                            $upload_ext = strtolower(pathinfo($_FILES['upload_feedback']['name'], PATHINFO_EXTENSION));
                                                                            $upload_name = 'feed_back-' . rand(10000000,99999999);
                                                                            $upload_feedback = 'feedback_upload/'. $upload_name .'.'. $upload_ext;
                                                                    
                                                                            if (!in_array($upload_ext, array('jpg', 'jpeg', 'png'))) 
                                                                            {
                                                                                echo '
                                                                                    <div class="msg_001">
                                                                                        Only JPG, JPEG, and PNG files are allowed.
                                                                                    </div>
                                                                                ';
                                                                            } 
                                                                            else if ($_FILES['upload_feedback']['size'] > 2000000) 
                                                                            {
                                                                                echo '
                                                                                    <div class="msg_001">
                                                                                        File size should be less than 2MB.
                                                                                    </div>
                                                                                ';
                                                                            } 
                                                                            else if (move_uploaded_file($_FILES['upload_feedback']['tmp_name'], $upload_feedback)) 
                                                                            {
                                                                                $stmt_rating_insert = $conn->prepare("INSERT INTO 
                                                                                    reviews(user_id, order_id, message, img, rating) 
                                                                                    VALUES(?,?,?,?,?) ");
                                                                                $stmt_rating_insert->execute([$user_id, $order_id, $message, $upload_feedback, $star]);

                                                                                if($stmt_rating_insert->affected_rows > 0)
                                                                                {
                                                                                    ?>
                                                                                    <script>
                                                                                        location.href = "profile.php?tab=<?php echo $tab?>&order_id=<?php echo $order_id?>";
                                                                                    </script>
                                                                                    <?php
                                                                                }  
                                                                            } 
                                                                            else {
                                                                                echo '
                                                                                    <div class="msg_001">
                                                                                        Error uploading the image. Review not submitted.
                                                                                    </div>
                                                                                ';
                                                                            }
                                                                        }
                                                                        else{
                                                                            $stmt_rating_insert = $conn->prepare("INSERT INTO 
                                                                                reviews(user_id, order_id, message, img, rating) 
                                                                                VALUES(?,?,?,?,?) ");
                                                                            $stmt_rating_insert->execute([$user_id, $order_id, $message, " ", $star]);

                                                                            if($stmt_rating_insert->affected_rows > 0)
                                                                            {
                                                                                ?>
                                                                                <script>
                                                                                    location.href = "profile.php?tab=<?php echo $tab?>&order_id=<?php echo $order_id?>";
                                                                                </script>
                                                                                <?php
                                                                            }  
                                                                        }
                                                                    
                                                                         
                                                                        
                                                                    }
                                                                ?>
                                                            </section>
                                                            <?php
                                                        }
                                                        
                                                    }
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                        
                                </div>
                            </div>
                        </div>
                    <?php
                }
                else
                if($tab == 'order_history')
                {
                    echo '
                        <h1 class="text-white p-5 bg-gray-500 text-lg mb-[70%] tetx-center">
                            No order history yet!
                        </h1>
                    ';
                }
                else
                if($tab == 'change_password')
                {
                    ?>
                        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 ">
                            <h3 class="mb-4 text-xl font-semibold ">Password information</h3>
                            <?php
                                if(isset($_POST['submit_change_pass']))
                                {
                                    $current_pass = $_POST['current_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $confirm_pass = $_POST['confirm_pass'];
                                    

                                    $stmt = $conn->prepare("select * from users where email = ?");
                                    $stmt->execute([$email]);
                                    $res = $stmt->get_result();
                                    $row = mysqli_fetch_assoc($res);
                                    // get password from db 
                                    $pass_db = $row['pass'];

                                    if($res->num_rows > 0)
                                    {
                                        if(password_verify($current_pass, $pass_db))
                                        {
                                            if($new_pass == $confirm_pass)
                                            {
                                                // hash the new password 
                                                $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

                                                $stmt = $conn->prepare("update users set pass = ? where email = ?");
                                                $stmt->execute([$pass_hash, $email]);

                                                if($stmt->affected_rows > 0)
                                                {
                                                    echo'
                                                    <div id="alert-2" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50  dark:text-green-400" role="alert">
                                                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Info</span>
                                                        <div class="ml-3 text-sm font-medium">
                                                            Successfully updated password.
                                                        </div>
                                                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8  dark:text-green-400 dark:hover:bg-gray-500" data-dismiss-target="#alert-2" aria-label="Close">
                                                        <span class="sr-only">Close</span>
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        </button>
                                                    </div>';
                                                }
                                            }
                                            else{
                                                echo'
                                                <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50  dark:text-red-400" role="alert">
                                                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Info</span>
                                                    <div class="ml-3 text-sm font-medium">
                                                        New password and Confirm password does not matched.
                                                    </div>
                                                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500" data-dismiss-target="#alert-2" aria-label="Close">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    </button>
                                                </div>';
                                            }
                                        }
                                        else{
                                            echo'
                                            <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50  dark:text-red-400" role="alert">
                                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Info</span>
                                                <div class="ml-3 text-sm font-medium">
                                                    Current password does not match. 
                                                </div>
                                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500" data-dismiss-target="#alert-2" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                </button>
                                            </div>';
                                        }
                                    }
                                    else{
                                        echo'
                                        <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50  dark:text-red-400" role="alert">
                                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Info</span>
                                            <div class="ml-3 text-sm font-medium">
                                                Something went wrong, please try again.
                                            </div>
                                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500" data-dismiss-target="#alert-2" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </div>';
                                    }
                                }
                            ?>
                            <form method="post">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- current password  -->
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="current_pass" class="block mb-2 text-sm font-medium text-gray-900 ">Current password</label>
                                        <input type="password" name="current_pass" id="current_pass" placeholder="••••••••" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500" required>
                                    </div>
                                    <!-- new password  -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="new_pass" class="block mb-2 text-sm font-medium text-gray-900 ">New password</label>
                                        <input type="password" name="new_pass" minlength="8" id="new_pass" placeholder="••••••••" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500" required>
                                    </div>
                                    <!-- confirm password  -->
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="confirm_pass" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm password</label>
                                        <input type="password" name="confirm_pass" minlength="8" id="confirm_pass" placeholder="••••••••" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500" required>
                                    </div>
                                    <!-- submit button  -->
                                    <div class="col-span-6 sm:col-full">
                                        <button type="submit" name="submit_change_pass" onclick="return confirm('Are you sure you want to Change password ?')" class="bg-transparent text-sm hover:bg-red-700 text-red-700 font-semibold hover:text-white py-2 px-2 border border-red-500 hover:border-transparent">
                                            Change password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php
                }
            }
        ?>

        <!-- Edit Personal Information modal -->
        <div id="edit_profile_modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- close the modal  -->
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="edit_profile_modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 ">Update Information</h3>
                        <form class="space-y-6" method="post">
                            <!-- first name  -->
                            <div>
                                <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                                <input type="text" name="fname" id="fname" value="<?php echo $fname ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 " required>
                            </div>
                            <!-- Last name  -->
                            <div>
                                <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                                <input type="text" name="lname" id="lname" value="<?php echo $lname ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 " required>
                            </div>
                            <!--  Contact  -->
                            <div>
                                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 ">Contact</label>
                                <input type="contact" name="contact" id="contact" value="<?php echo $contact ?>" maxlength="10" minlength="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 " required>
                            </div>
                            <!--  Address  -->
                            <div>
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                                <input type="text" name="address" id="address" value="<?php echo $address ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-500 dark:placeholder-gray-400 " required>
                            </div>
                            <!-- submit button  -->
                            <button type="submit" name="edit_gen_info" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update 
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

    </div>

    <?php
        include 'contact.php';
        include 'include/footer.php';
        include 'include/footer_link.php';
        include 'include/logout_modal.php';
        include "include/messenger.php";
    ?>

  </div>

</body>

</html>