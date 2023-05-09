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
<nav class="fixed top-0 z-50 py-6 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
      </div>
      <div class="navbar-center hidden lg:flex z-60">
      <ul class="menu menu-horizontal px-1">
        <li> <a href="index.php"
            class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
            <span
              class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">Home</span>
          </a></li>
        <li> <a href="../index.php#about"
            class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
            <span
              class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">About</span>
          </a></li>
        <li> <a href="#contact"
            class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
            <span
              class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">Contact</span>
          </a></li>
      </ul>
      <!-- dropdown arrow -->
      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
        <span class="relative text-black group-hover:text-white">SHOP</span>
      </button>
      <!-- Dropdown menu -->
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
          <li>
            <a href="shark.php" class="block px-4 py-2 hover:bg-gray-100">SHARK</a>
          </li>
          <li>
            <a href="shoei.php" class="block px-4 py-2 hover:bg-gray-100">SHOEI</a>
          </li>
          <li>
            <a href="agv.php" class="block px-4 py-2 hover:bg-gray-100">AGV</a>
          </li>
          <li>
            <a href="arai.php" class="block px-4 py-2 hover:bg-gray-100">ARAI</a>
          </li>
        </ul>
      </div>
      <!-- end of dropdown -->
    </div>
    <div class="flex items-center">
        <!-- Profile -->
        <div class="flex items-center ml-3">
            <!-- cart drop down  -->
            <div class="dropdown dropdown-end">
              <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span class="badge badge-sm indicator-item">8</span>
                </div>
              </label>
              <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                  <h3 class="font-bold text-lg">8 Items</h3>
                  <h3 class="">Subtotal:<span class="text-red-600"> $999</span></h3>
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
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen xl:pt-[6%] transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-[40%] xl:pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            <ul class="pb-2 space-y-2">
                <li>
                    <a href="profile.php?tab=personal_profile" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                        <span class="ml-3" sidebar-toggle-item>Personal Information</span>
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                        </svg>
                        <span class="ml-3" sidebar-toggle-item>My Cart</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700" aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M.99 5.24A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25l.01 9.5A2.25 2.25 0 0116.76 17H3.26A2.267 2.267 0 011 14.74l-.01-9.5zm8.26 9.52v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.615c0 .414.336.75.75.75h5.373a.75.75 0 00.627-.74zm1.5 0a.75.75 0 00.627.74h5.373a.75.75 0 00.75-.75v-.615a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625zm6.75-3.63v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75zM17.5 7.5v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75z"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>My orders</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <ul id="dropdown-crud" class="space-y-2 py-2 {{ if not (eq .Params.group "crud") }}hidden {{ end }}">
                    <li>
                        <a href="{{ "crud/products/" | relURL }}" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 {{ if eq $page_slug "products" }} bg-gray-100 dark:bg-gray-700 {{ end }}">Unpaid</a>
                    </li>
                    <li>
                        <a href="{{ "crud/users/" | relURL }}" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 {{ if eq $page_slug "users" }} bg-gray-100 dark:bg-gray-700 {{ end }}">To ship</a>
                    </li>
                    <li>
                        <a href="{{ "crud/users/" | relURL }}" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 {{ if eq $page_slug "users" }} bg-gray-100 dark:bg-gray-700 {{ end }}">Shipped</a>
                    </li>
                    </ul>
                </li>
                <li>
                    <a href="" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ if eq $page_slug "settings" }} bg-gray-100 dark:bg-gray-700 {{ end }}">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M8.34 1.804A1 1 0 019.32 1h1.36a1 1 0 01.98.804l.295 1.473c.497.144.971.342 1.416.587l1.25-.834a1 1 0 011.262.125l.962.962a1 1 0 01.125 1.262l-.834 1.25c.245.445.443.919.587 1.416l1.473.294a1 1 0 01.804.98v1.361a1 1 0 01-.804.98l-1.473.295a6.95 6.95 0 01-.587 1.416l.834 1.25a1 1 0 01-.125 1.262l-.962.962a1 1 0 01-1.262.125l-1.25-.834a6.953 6.953 0 01-1.416.587l-.294 1.473a1 1 0 01-.98.804H9.32a1 1 0 01-.98-.804l-.295-1.473a6.957 6.957 0 01-1.416-.587l-1.25.834a1 1 0 01-1.262-.125l-.962-.962a1 1 0 01-.125-1.262l.834-1.25a6.957 6.957 0 01-.587-1.416l-1.473-.294A1 1 0 011 10.68V9.32a1 1 0 01.804-.98l1.473-.295c.144-.497.342-.971.587-1.416l-.834-1.25a1 1 0 01.125-1.262l.962-.962A1 1 0 015.38 3.03l1.25.834a6.957 6.957 0 011.416-.587l.294-1.473zM13 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="ml-3" sidebar-toggle-item>Personal Information</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php?tab=change_password" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ if eq $page_slug "settings" }} bg-gray-100 dark:bg-gray-700 {{ end }}">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-3" sidebar-toggle-item>Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</aside>

<div class="p-4 sm:ml-64">
    <div class="grid grid-cols-1 px-4 pt-28 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
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
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
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
                                            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
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
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                <h3 class="mb-4 text-xl font-semibold dark:text-white">Order History</h3>
                                <div class="mb-6">
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                    TRANSACTION
                                                    </th>
                                                    <th scope="col" class="px-1 py-3">
                                                    DATE & TIME
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                    Amount
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                    Status 
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Apple MacBook Pro 17"
                                                    </th>
                                                    <td class="py-4">
                                                        11/2/22
                                                    </td>
                                                    <td class="px-6 py-4">
                                                    ₱ 47,00
                                                    </td>
                                                    <td class=" py-4">
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Complete</span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Microsoft Surface Pro
                                                    </th>
                                                    <td class="py-4">
                                                        02/11/22
                                                    </td>
                                                    <td class="px-6 py-4">
                                                    ₱ 78,00
                                                    </td>
                                                    <td class="py-4">
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Complete</span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white dark:bg-gray-800">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Magic Mouse 2
                                                    </th>
                                                    <td class="py-4">
                                                        03/23/23
                                                    </td>
                                                    <td class="px-6 py-4">
                                                    ₱ 14,00
                                                    </td>
                                                    <td class="py-4">
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Cancelled</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- //////////////////////////////// right span  -->
                        <div class="col-span-2">
                            <!-- general information here  -->
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                <?php
                                    if(isset($_POST['edit_gen_info']))
                                    {
                                        $fname = $_POST['fname'];
                                        $lname = $_POST['lname'];
                                        $contact = $_POST['contact'];
                                        $address = $_POST['address'];

                                        $stmt = $conn->prepare("update users set fname = ?, lname = ?, contact = ?, address = ? ");
                                        $stmt->execute([$fname,$lname,$contact,$address]);

                                        if($stmt->affected_rows > 0)
                                        {
                                            ?>
                                                <script>
                                                    location.href = "profile.php?tab=personal_profile";
                                                </script>
                                            <?php
                                        }
                                        else{
                                            echo '<div class="msg_001">Something went wrong please try again </div>';
                                        }
                                    }
                                        
                                ?>
                                <h3 class="mb-4 text-xl font-semibold dark:text-white">General Information</h3>
                                <form method="post">
                                    <div class="grid grid-cols-6 gap-6">
                                        <!-- first name  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                            <input type="text" value="<?php echo $fname ?>" readonly id="fname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                        <!-- last name  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                            <input type="text" value="<?php echo $lname ?>" readonly id="lname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                        <!-- contact  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact +63</label>
                                            <input type="text" value="<?php echo $contact ?>" readonly id="contact" maxlength="10" minlength="10" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                        <!-- address  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                            <input type="text" value="<?php echo $address ?>" readonly id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"  required>
                                        </div>
                                    </div>
                                        <!-- Modal button -->
                                        <button data-modal-target="edit_profile_modal" data-modal-toggle="edit_profile_modal" type="button" class="bg-transparent mt-5 text-sm hover:bg-gray-700 text-gray-700 font-semibold hover:text-white py-2 px-2 border border-gray-500 hover:border-transparent">
                                            Edit Information
                                        </button>
                                </form>
                            </div>
                            <!-- socials here  -->
                            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                <div class="flow-root">
                                    <h3 class="text-xl font-semibold dark:text-white">Social accounts</h3>
                                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <li class="py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <svg class="w-5 h-5 dark:text-white" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <span class="block text-base font-semibold text-gray-900 truncate dark:text-white">
                                                        Facebook account
                                                    </span>
                                                    <a href="#" class="block text-sm font-normal truncate text-gray-700 hover:underline dark:text-gray-500">
                                                        www.facebook.com/themesberg
                                                    </a>
                                                </div>
                                                <div class="inline-flex items-center">
                                                    <a href="#" class="px-3 py-2 mb-3 mr-3 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Disconnect</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <svg class="w-5 h-5 dark:text-white" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <span class="block text-base font-semibold text-gray-900 truncate dark:text-white">
                                                        Twitter account
                                                    </span>
                                                    <a href="#" class="block text-sm font-normal truncate text-gray-700 hover:underline dark:text-gray-500">
                                                        www.twitter.com/themesberg
                                                    </a>
                                                </div>
                                                <div class="inline-flex items-center">
                                                    <a href="#" class="px-3 py-2 mb-3 mr-3 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Disconnect</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                else
                if($tab == 'change_password')
                {
                    ?>
                        <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                            <h3 class="mb-4 text-xl font-semibold dark:text-white">Password information</h3>
                            <form action="#">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current password</label>
                                        <input type="text" name="current-password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="••••••••" required>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                                        <input data-popover-target="popover-password" data-popover-placement="bottom" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required>
                                        <div data-popover id="popover-password" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                            <div class="p-3 space-y-2">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Must have at least 6 characters</h3>
                                                <div class="grid grid-cols-4 gap-2">
                                                    <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                                    <div class="h-1 bg-orange-300 dark:bg-orange-400"></div>
                                                    <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                                    <div class="h-1 bg-gray-200 dark:bg-gray-600"></div>
                                                </div>
                                                <p>It’s better to have:</p>
                                                <ul>
                                                    <li class="flex items-center mb-1">
                                                        <svg class="w-4 h-4 mr-2 text-green-400 dark:text-green-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                        Upper & lower case letters
                                                    </li>
                                                    <li class="flex items-center mb-1">
                                                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        A symbol (#$&)
                                                    </li>
                                                    <li class="flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        A longer password (min. 8 chars.)
                                                    </li>
                                                </ul>
                                        </div>
                                        <div data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                        <input type="text" name="confirm-password" id="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="••••••••" required>
                                    </div>
                                    <div class="col-span-6 sm:col-full">
                                        <button class="text-white bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-gray-800 dark:focus:ring-blue-800" type="submit">
                                            Save all
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
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- close the modal  -->
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="edit_profile_modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Information</h3>
                        <form class="space-y-6" method="post">
                            <!-- first name  -->
                            <div>
                                <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input type="text" name="fname" id="fname" value="<?php echo $fname ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <!-- Last name  -->
                            <div>
                                <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                <input type="text" name="lname" id="lname" value="<?php echo $lname ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <!--  Contact  -->
                            <div>
                                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                                <input type="contact" name="contact" id="contact" value="<?php echo $contact ?>" maxlength="10" minlength="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            </div>
                            <!--  Address  -->
                            <div>
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="text" name="address" id="address" value="<?php echo $address ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
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
        include "include/footer_link.php";
    ?>

</div>

</body>

</html>