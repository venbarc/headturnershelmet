
<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />

    <title>Action | Headturners</title>
    
  </head>
  <body>
<?php

include '../connect.php';

if (isset($_SESSION['admin_id'])) 
{
  $admin_id = $_SESSION['admin_id'];
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
<!-- SIDEBAR AND NAVBAR-->
<nav class="fixed top-0 z-50 w-full bg-gray-200 border-b border-gray-300 ">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-500 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="index.php" class="flex ml-2 md:mr-24">
          <img src="../assets/images/logo/Logo.png" class="h-16 mr-3 px-12" alt="FlowBite Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap ">ADMIN DASHBOARD</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../assets/images/profile/default_profile.png" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-gray-200 divide-y divide-gray-100 rounded shadow  dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 " role="none">
                  Admin
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-dark" role="none">
                  headturners09@gmail.com	
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="admin_logout.php" class="block px-4 py-2 text-sm text-red-500 hover:bg-red-200" role="menuitem">
                    Logout
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-5 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-200 border-r border-gray-300 sm:translate-x-0 " aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-200">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="admin.php?tab=dashBoard" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200 dark:hover:bg-gray-500">
              <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 3H3v3h5V3zM3 2a1 1 0 00-1 1v3a1 1 0 001 1h5a1 1 0 001-1V3a1 1 0 00-1-1H3zm14 12h-5v3h5v-3zm-5-1a1 1 0 00-1 1v3a1 1 0 001 1h5a1 1 0 001-1v-3a1 1 0 00-1-1h-5zm-4-3H3v7h5v-7zM3 9a1 1 0 00-1 1v7a1 1 0 001 1h5a1 1 0 001-1v-7a1 1 0 00-1-1H3zm14-6h-5v7h5V3zm-5-1a1 1 0 00-1 1v7a1 1 0 001 1h5a1 1 0 001-1V3a1 1 0 00-1-1h-5z" clip-rule="evenodd"/>
              </svg>
              <span class="ml-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="admin.php?tab=progress_report" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-500">
              <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 13H4v3h2v-3zm5-4H9v7h2V9zm5-5h-2v12h2V4zm-2-1a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2zM8 9a1 1 0 011-1h2a1 1 0 011 1v7a1 1 0 01-1 1H9a1 1 0 01-1-1V9zm-5 4a1 1 0 011-1h2a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3z" clip-rule="evenodd"/>
              </svg>
              <span class="ml-3">Progress Report</span>
            </a>
         </li>
         <li>
            <a href="admin.php?tab=products" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200 dark:hover:bg-gray-500">
               <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.81 6.063A1.5 1.5 0 016.98 5.5h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 11-.78.624l-3.7-4.624a.5.5 0 00-.39-.188H6.98a.5.5 0 00-.39.188l-3.7 4.624a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M2.125 10.67a.5.5 0 01.375-.17H8a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124a1.5 1.5 0 01-1.489 1.314H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zm.941.83l.32 2.562a.5.5 0 00.497.438h12.234a.5.5 0 00.496-.438l.32-2.562H12.45a2.5 2.5 0 01-4.9 0H3.066z" clip-rule="evenodd"/>
              </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
            </a>
         </li>
         <li>
            <a href="admin.php?tab=users" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200 dark:hover:bg-gray-500">
              <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M17 16s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002zM9.022 15h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C15.688 12.629 14.718 12 13 12c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002zM13 9a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zm-7.064 4.28a5.873 5.873 0 00-1.23-.247A7.334 7.334 0 007 11c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 017 15c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM6.92 12c-1.668.02-2.615.64-3.16 1.276C3.163 13.97 3 14.739 3 15h3c0-1.045.323-2.086.92-3zM3.5 7.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/>
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
         </li>
         <li>
          <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  dark:hover:bg-gray-500" aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
              <svg width="30" height="30" fill="black" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M2.125 13.17A.5.5 0 012.5 13H8a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 18H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zM5.81 2.563A1.5 1.5 0 016.98 2h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 11-.78.624l-3.7-4.624A.5.5 0 0013.02 3H6.98a.5.5 0 00-.39.188l-3.7 4.624a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                  <path fill-rule="evenodd" d="M2.125 7.17A.5.5 0 012.5 7H8a.5.5 0 01.5.5 1.5 1.5 0 003 0A.5.5 0 0112 7h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 12H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
              </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Orders</span>
              <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
          <ul id="dropdown-crud" class="space-y-2 py-2">
              <li>
                  <a href="admin.php?tab=to_ship" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11  dark:hover:bg-gray-500 ">
                    <img src="../assets/images/shipping_icon/to_ship.png"> &nbsp;&nbsp; 
                      <?php 
                          // count place order 
                          $stmt_count_to_ship = $conn->prepare("SELECT count(order_id) from place_order where shipped = 0 group by order_id");
                          $stmt_count_to_ship->execute();
                          $res_count_to_ship = $stmt_count_to_ship->get_result();
                          $count_to_ship = $res_count_to_ship->num_rows > 0 ? $res_count_to_ship->num_rows : 0;
                      ?>
                      To ship &nbsp; <span class="text-red-500"> <?php echo $count_to_ship ?> </span>
                  </a>
              </li>
              <li>
                  <a href="admin.php?tab=completed" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11  dark:hover:bg-gray-500 ">
                      <img src="../assets/images/shipping_icon/shipped.png"> &nbsp;&nbsp; 
                     <?php 
                          // count place order 
                          $stmt_count_complete = $conn->prepare("SELECT count(order_id) from place_order where shipped = 1 group by order_id");
                          $stmt_count_complete->execute();
                          $res_count_complete = $stmt_count_complete->get_result();
                          $count_complete = $res_count_complete->num_rows > 0 ? $res_count_complete->num_rows : 0;
                      ?>
                      Completed &nbsp; <span class="text-red-500"> <?php echo $count_complete ?> </span>
                  </a>
              </li>
              <li>
                  <a href="admin.php?tab=revoked" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11  dark:hover:bg-gray-500 ">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm3.354 4.646L10 9.293l2.646-2.647a.5.5 0 01.708.708L10.707 10l2.647 2.646a.5.5 0 01-.708.708L10 10.707l-2.646 2.647a.5.5 0 01-.708-.708L9.293 10 6.646 7.354a.5.5 0 11.708-.708z" clip-rule="evenodd"/>
                    </svg>&nbsp;&nbsp;
                     <?php 
                          // count place order 
                          $stmt_count_revoked = $conn->prepare("SELECT count(order_id) from place_order where shipped = 2 group by order_id");
                          $stmt_count_revoked->execute();
                          $res_count_revoked = $stmt_count_revoked->get_result();
                          $count_revoked = $res_count_revoked->num_rows > 0 ? $res_count_revoked->num_rows : 0;
                      ?>
                      Revoked &nbsp; <span class="text-red-500"> <?php echo $count_revoked ?> </span>
                  </a>
              </li>
             
          </ul>
          </li>

          <li>
            <a href="admin.php?tab=notif" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200 dark:hover:bg-gray-500">
              <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9.938 4.016a.146.146 0 00-.054.057L3.027 15.74a.176.176 0 00-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 00.066-.017.163.163 0 00.055-.06.176.176 0 00-.003-.183L10.12 4.073a.146.146 0 00-.054-.057.13.13 0 00-.063-.016.13.13 0 00-.064.016zm1.043-.45a1.13 1.13 0 00-1.96 0L2.166 15.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L10.982 3.566z" clip-rule="evenodd"/>
                  <rect width="2" height="2" x="9.002" y="13" rx="1"/>
                <path d="M9.1 7.995a.905.905 0 111.8 0l-.35 3.507a.553.553 0 01-1.1 0L9.1 7.995z"/>
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Notifications</span>
              <?php 
              // Count notification
              $stmt_count_notif = $conn->prepare("SELECT COUNT(*) AS product_count FROM products 
                                                  WHERE (xs_avail + sm_avail + md_avail + lg_avail + xlg_avail) <= 3");
              $stmt_count_notif->execute();
              $res_count_notif = $stmt_count_notif->get_result();
              $count_notif = $res_count_notif->num_rows > 0 ? $res_count_notif->fetch_assoc()['product_count'] : 0;
              ?>

              &nbsp; <span class="w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-md font-bold"> 
                <?php echo $count_notif ?> 
              </span>
            </a>
          </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
<?php
if(isset($_GET['tab']) && isset($_GET['action']) && isset($_GET['id'])) 
{
	$tab = $_GET['tab'];
	$action = $_GET['action'];
	$id = $_GET['id'];

  if($tab == 'products' && $action == 'update') 
  {
    // get the product data in database 
    $stmt_product_data = $conn->prepare("select * from products where id = ?");
    $stmt_product_data->execute([$id]);
    $res_product_data = $stmt_product_data->get_result();
    $row_product_data = mysqli_fetch_assoc($res_product_data);

    $product_id = $row_product_data['product_id'];
    $image = $row_product_data['image'];
    $brand = $row_product_data['brand'];
    $name = $row_product_data['name'];
    $price = $row_product_data['price'];

    $xs_avail = $row_product_data['xs_avail'];
    $sm_avail = $row_product_data['sm_avail'];
    $md_avail = $row_product_data['md_avail'];
    $lg_avail = $row_product_data['lg_avail'];
    $xlg_avail = $row_product_data['xlg_avail'];

    $brands = array(
      'shark' => 'Shark',
      'agv' => 'Agv',
      'arai' => 'Arai',
      'shoei' => 'Shoei',

    );

    ?>
    <div class="bg-gray-200  relative shadow-md sm:rounded-lg overflow-hidden mt-20">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <!-- Modal body -->
          <form method="post" enctype="multipart/form-data">
            <h2 class="font-bold text-2xl p-2">Update Product</h2>
            <h1 class="font-bold text-xl text-red-500 p-5"> <?php echo $product_id  .' | '. $name ?> </h1>
            <!-- image preview  -->
            <img src="<?php echo $image ?>" width="100" height="100" class="py-4">

            <div class="grid grid-cols-2 gap-5">
              <div>
                <!-- product name  -->
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <!-- brand  -->
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Brand</label>
                <select id="category" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <?php
                  foreach ($brands as $value => $label) 
                  {
                    $selected = ($brand == $value) ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$label</option>";
                  }
                  ?>
                </select>
              </div>
              <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Sizes</label>
                <!-- extra small  -->
                <label class="text-red-600">Extra Small</label>
                <input type="number" name="xs_avail" id="xs_avail" min="0" value="<?php echo $xs_avail ?>" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                <!--  small  -->
                <label class="text-red-600">Small</label>
                <input type="number" name="sm_avail" id="sm_avail" min="0" value="<?php echo $sm_avail ?>" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                <!--  medium  -->
                <label class="text-red-600">Medium</label>
                <input type="number" name="md_avail" id="md_avail" min="0" value="<?php echo $md_avail ?>" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                <!--  Large  -->
                <label class="text-red-600">Large</label>
                <input type="number" name="lg_avail" id="lg_avail" min="0" value="<?php echo $lg_avail ?>" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                <!--  Extra Large  -->
                <label class="text-red-600">Extra Large</label>
                <input type="number" name="xlg_avail" id="xlg_avail" min="0" value="<?php echo $xlg_avail ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                <!-- price  -->
                <label for="price" class="block mb-2 mt-3 text-sm font-medium text-gray-900 ">Price</label>
                <input type="number" name="price" min="0" id="price" value="<?php echo $price ?>" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
              </div>
             
              <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <!-- image upload  -->
                <div class="mb-4">
                    <span class="block mb-2 text-sm font-medium text-gray-900 ">Change Product Image</span>
                    <label class="block">
                      <span class="sr-only">Choose File</span>
                      <input type="file" name="product_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                    </label>
                </div>
                <!-- buttons  -->
                <button type="submit" name="update_product_submit" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                  Update product
                </button>
                <a href="admin.php?tab=<?php echo $tab ?>" class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-300 text-sm font-medium px-5 py-2 hover:text-gray-900 focus:z-10  dark:border-gray-500 dark:hover:text-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                  <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                  Discard
                </a>
              </div>
              <!-- hidden input -->
              <input type="hidden" name="default_product_img" value="<?php echo $image ?>">
            </div>
          </form>
          
          <!-- submit update button  -->
          <?php
            if(isset($_POST['update_product_submit']))
            {
              $brand = $_POST['brand'];
              $name = $_POST['name'];
              $price = $_POST['price'];

              $xs_avail = $_POST['xs_avail'];
              $sm_avail = $_POST['sm_avail'];
              $md_avail = $_POST['md_avail'];
              $lg_avail = $_POST['lg_avail'];
              $xlg_avail = $_POST['xlg_avail'];

              $image = $_POST['default_product_img'];

              $upload_ext = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
              $upload_name = 'product-' . rand(10000000,99999999);
              $product_image = 'product_upload/'. $upload_name .'.'. $upload_ext;

              if(!empty($_FILES['product_image']['name']))//if image is not empty
              {
                if(!in_array($upload_ext, array('jpg','jpeg', 'png')))
                {
                  echo '
                  <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400  dark:border-red-800" role="alert">
                      <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                      <div class="ml-3 text-sm font-medium">
                        Only JPG, JPEG, and PNG files are allowed.
                      </div>
                      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                          <span class="sr-only">Dismiss</span>
                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      </button>
                  </div>';
                }
                else if($_FILES['product_image']['size'] > 2000000)
                {
                  echo '
                  <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400  dark:border-red-800" role="alert">
                      <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                      <div class="ml-3 text-sm font-medium">
                        Maximum of 2MB sizes.
                      </div>
                      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                          <span class="sr-only">Dismiss</span>
                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      </button>
                  </div>';
                }
                else if(move_uploaded_file($_FILES['product_image']['tmp_name'], $product_image))
                {
                  $stmt_update_product = $conn->prepare("UPDATE products set image = ?, brand = ?, name = ?, price = ?, 
                  xs_avail = ?, sm_avail = ?, md_avail = ?, lg_avail = ?, xlg_avail = ? where id = ?");
                  $stmt_update_product->execute([$product_image, $brand, $name, $price, $xs_avail, $sm_avail, $md_avail, $lg_avail, $xlg_avail, $id]);

                  if($stmt_update_product->affected_rows > 0)
                  {
                    ?>
                    <script>
                      location.href = "admin.php?tab=products";
                    </script>
                    <?php
                  }
                  else
                  {
                    echo '
                    <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:border-orange-800" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium">
                          No changes has been made.
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex h-8 w-8  dark:text-orange-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>';
                  }

                }
              }
              else//if image is empty
              {
                $stmt_update_product = $conn->prepare("UPDATE products set  image = ?, brand = ?, name = ?, price = ?, 
                                                      xs_avail = ?, sm_avail = ?, md_avail = ?, lg_avail = ?, xlg_avail = ? where id = ?");
                $stmt_update_product->execute([$image, $brand, $name, $price, $xs_avail, $sm_avail, $md_avail, $lg_avail, $xlg_avail, $id]);
                
                if($stmt_update_product->affected_rows > 0)
                {
                  ?>
                  <script>
                    location.href = "admin.php?tab=products";
                  </script>
                  <?php
                }
                else
                {
                  echo '
                  <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-orange-800 border-t-4 border-orange-300 bg-orange-50 dark:text-orange-400 dark:border-orange-800" role="alert">
                      <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                      <div class="ml-3 text-sm font-medium">
                        No changes has been made.
                      </div>
                      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg focus:ring-2 focus:ring-orange-400 p-1.5 hover:bg-orange-200 inline-flex h-8 w-8  dark:text-orange-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                          <span class="sr-only">Dismiss</span>
                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      </button>
                  </div>';
                }
              }
          }
          ?>
      </div>
    </div>
    <?php
    
  }
  else 
  if($tab == 'products' && $action == 'remove') 
  {
    ?>
    <div class="bg-gray-200  relative shadow-md sm:rounded-lg overflow-hidden mt-20">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="flex-1 flex items-center space-x-2">
          <?php
            $stmt_remove_product = $conn->prepare("delete from products where id = ?");
            $stmt_remove_product->execute([$id]);
            
            if($stmt_remove_product->affected_rows > 0)
            {
              ?>
                <script>
                  location.href = "admin.php?tab=<?php echo $tab ?>";
                </script>
              <?php
            }
            else{
              ?>
              <script>
                location.href = "../404.php"
              </script>
              <?php
            }
          ?>
        </div>
      </div>
    </div>
    <?php
  }
  else 
  {
    ?>
    <script>
      location.href = "../404.php";
    </script>
    <?php
  }
}
?>


</div>

<!-- SIDEBAR AND NAVBAR-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </body>
</html>	