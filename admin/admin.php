
<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Admin | Headturners</title>
    
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
              <svg width="20" height="20" fill="black" viewBox="0 0 20 20">
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
          </ul>
      </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
<?php
if(isset($_GET['tab'])) 
{
	$tab = $_GET['tab'];

	if ($tab == 'dashBoard') 
  {
		?>
		<!-- Code for the 'dashBoard' tab -->
    <div class="px-4 pt-20 2xl:px-0">
          <!-- Main widget -->
          <div class="p-4 bg-gray-200 border border-gray-300 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6 mb-3">
            <div class="mb-4">
              <div class="grid grid-cols-2 gap-[10%]">
                <div>
                  <div class="flex gap-3">
                    <svg width="25" height="25" fill="currentColor" viewBox="0 0 512 512"><path d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z"/></svg>
                    <h3 class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">
                      Total Revenue
                    </h3>
                  </div>
                  <!-- total revenue  -->
                  <?php
                    $stmt_revenue = $conn->prepare("SELECT SUM(total_bill) AS total_rev FROM place_order order by order_date");
                    $stmt_revenue->execute();
                    $res_revenue = $stmt_revenue->get_result();
                    $row_revenue = $res_revenue->fetch_assoc();
                    $total_rev = $row_revenue['total_rev'];
                    $total_rev_format = number_format($total_rev, 2, '.', ',');
                    echo '
                    <h3 class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">
                    '. $total_rev_format.'
                    </h3>';
                  ?>
                  <!-- Other content -->
                  <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
                    <canvas id="revenueChart"></canvas>
                  </div>
                  
                  <!-- Store the total revenue in a JavaScript variable -->
                  <script>
                    var totalRevenue = <?php echo $total_rev; ?>;
                      // Retrieve the canvas element
                      var ctx = document.getElementById('revenueChart').getContext('2d');

                      // Create the bar chart
                      var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                          labels: ['Total Revenue'],
                          datasets: [{
                            label: 'Total Revenue',
                            data: [totalRevenue],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                          }]
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true
                            }
                          }
                        }
                      });
                  </script>
                 
                </div>
                <div>
                  <div class="flex gap-3">
                    <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M9 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H9zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 017 15c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 007 11c-4 0-5 3-5 4s1 1 1 1h4.216zM6.5 10a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
                    </svg>
                    <h3 class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">
                      Number of User
                    </h3>
                  </div>
                  <!-- total Users  -->
                  <?php
                    $stmt_cnt_users = $conn->prepare("SELECT count(*) AS user_count FROM users");
                    $stmt_cnt_users->execute();
                    $res_cnt_users = $stmt_cnt_users->get_result();
                    $row_cnt_user = $res_cnt_users->fetch_assoc();
                    $userCount = $row_cnt_user['user_count'];
                    echo '<span class="text-xl font-bold leading-none text-red-500 sm:text-2xl">( '. $userCount .' )</span>';
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!--Top products and customer -->
          <div class="p-4 bg-gray-200 border border-gray-300 rounded-lg shadow-sm sm:p-6">
            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 ">Top Products and Customer</h3>
            <!-- button switches  -->
            <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                <li class="w-full">
                    <button id="product-tab" data-tabs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-200 focus:outline-none  ">
                      Top products
                    </button>
                </li>
                <li class="w-full">
                    <button id="customer-tab" data-tabs-target="#customer" type="button" role="tab" aria-controls="customer" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-200 focus:outline-none  ">
                      Top Customers
                    </button>
                </li>
            </ul>
            <div id="fullWidthTabContent" class="border-t border-gray-300 dark:border-gray-600">
              <!-- Top product show -->
              <div class="hidden pt-4" id="product" role="tabpanel" aria-labelledby="product-tab">
                <div class="flex items-center justify-between">
                  <div class="flex items-center min-w-0 w-full">
                    <?php
                      $stmt_top_product = $conn->prepare(
                        "SELECT COUNT(p.product_id), 
                            ANY_VALUE(p.product_id) AS product_id, 
                            ANY_VALUE(p.image) AS image, 
                            ANY_VALUE(p.name) AS name, 
                            ANY_VALUE(po.qnty) AS qnty, 
                              SUM(po.qnty) AS total_qnty
                                  FROM place_order po
                                  JOIN products p ON p.product_id = po.product_id
                                    GROUP BY p.product_id
                                    ORDER BY qnty DESC"
                      );
                    
                      $stmt_top_product->execute();
                      $res_top_product = $stmt_top_product->get_result();
                      $count = 1;

                      if($res_top_product->num_rows > 0)
                      {
                        echo '
                          <table class="w-full">
                            <thead class="">
                              <tr class="">
                                <th class="text-blue-600 font-bold"> # </th>
                                <th class=""> Product Image </th>
                                <th class=""> Product ID </th>
                                <th class=""> Product Name </th>
                                <th class=""> Total Item sold </th>
                              </tr>
                            </thead>
                        ';
                        while($row_top_product = $res_top_product->fetch_assoc())
                        {
                          $product_id = $row_top_product['product_id'];
                          $image = $row_top_product['image'];
                          $name = $row_top_product['name'];
                          $total_qnty = $row_top_product['total_qnty'];

                          echo '

                          <tbody class="text-center text-sm">
                            <td class="text-blue-600 font-bold">
                              '.$count ++.'
                            </td>
                            <td class="items-center justify-center w-3 h-3">
                              <img class="" src="'.$image.'">
                            </td>
                            <td class="">
                              '.$product_id.'
                            </td>
                            <td class="">
                              '.$name.'
                            </td>
                            <td class="text-red-500 text-lg font-semibold">
                              ('.$total_qnty.') items
                            </td>
                          </tbody>
                          ';
                        }

                        echo '
                        </table>
                        ';
                      }
                      else{
                        ?>
                        <h1 class="bg-gray-500 p-[5%] text-white w-[100%] text-center text-3xl font-bold">
                          There are no records yet.
                        </h1>
                        <?php
                      }
                    ?>
                    
                  </div>

                </div>
              </div>
              <!-- Top customer show -->
              <div class="hidden pt-4" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                <div class="flex items-center justify-between">
                  <div class="flex items-center min-w-0 w-full">
                    <?php
                      $stmt_top_customer = $conn->prepare(
                        "SELECT u.*,COUNT(po.user_id),
                            ANY_VALUE (po.user_id) as user_id,
                            SUM(po.qnty) as qnty, SUM(po.total_bill) as total_bill
                                from users u join place_order po on u.id = po.user_id 
                                    GROUP BY po.user_id 
                                    ORDER BY total_bill DESC"
                      );
                    
                      $stmt_top_customer->execute();
                      $res_top_customer = $stmt_top_customer->get_result();
                      $count = 1;

                      if($res_top_customer->num_rows > 0)
                      {
                        echo '
                          <table class="w-full">
                            <thead class="">
                              <tr class="">
                                <th class="text-blue-600 font-bold"> # </th>
                                <th class=""> Profile Image </th>
                                <th class=""> Email </th>
                                <th class=""> First Name </th>
                                <th class=""> Last Name </th>
                                <th class=""> Contact </th>
                                <th class=""> Total Item Bought </th>
                                <th class=""> Total Spent </th>
                              </tr>
                            </thead>
                        ';
                        while($row_top_customer = $res_top_customer->fetch_assoc())
                        {
                          $user_id = $row_top_customer['user_id'];
                          $email = $row_top_customer['email'];
                          $image = $row_top_customer['image'];
                          $fname = $row_top_customer['fname'];
                          $lname = $row_top_customer['lname'];
                          $contact = $row_top_customer['contact'];
                          $total_qnty = $row_top_customer['qnty'];
                          $total_bill = $row_top_customer['total_bill'];
                          $total_bill_format = number_format($total_bill, 2, '.', ',');

                          if(empty($image))
                          {
                            $image_show = 'assets/images/profile/default_profile.png'; 
                          }
                          else{
                            $image_show = $image;
                          }

                          echo '
                          <tbody class="text-center text-sm">
                            <td class="text-blue-600 font-bold">
                              '.$count ++.'
                            </td>
                            <td class="flex items-center justify-center">
                              <img class="w-10 h-10 rounded-full" src="../'.$image_show.'">
                            </td>
                            <td class="">
                              '.$email.'
                            </td>
                            <td class="">
                              '.$fname.'
                            </td>
                            <td class="">
                              '.$lname.'
                            </td>
                            <td class="">
                              '.$contact.'
                            </td>
                            <td class="text-red-500 text-lg font-semibold">
                              ('.$total_qnty.') items
                            </td>
                            <td class="text-red-500 text-lg font-semibold">
                              ₱ '.$total_bill_format.'
                            </td>
                          </tbody>
                          ';
                        }
                        echo '
                        </table>
                        ';
                      }
                      else{
                        ?>
                        <h1 class="bg-gray-500 p-[5%] text-white w-[100%] text-center text-3xl font-bold">
                          There are no records yet.
                        </h1>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="p-4 bg-gray-200 border border-gray-300 rounded-lg shadow-sm  sm:p-6">
          <!-- Card header -->
          <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
              <h3 class="mb-2 text-xl font-bold text-gray-900 ">Transactions</h3>
              <span class="text-base font-normal text-gray-500">This is a list of latest transactions</span>
            </div>
          </div>
          <!-- Table -->
          <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                  <?php
                    $stmt_sel_place_order = $conn->prepare("SELECT ANY_VALUE (u.email) AS email, COUNT(po.order_id),
                                                                ANY_VALUE (po.order_id) AS order_id,
                                                                ANY_VALUE (po.user_id) AS user_id,
                                                                ANY_VALUE (po.qnty) AS qnty,
                                                                ANY_VALUE (po.total_bill) AS total_bill,
                                                                ANY_VALUE (po.pay_method) AS pay_method,
                                                                ANY_VALUE (po.order_date) AS order_date
                                                                    from users u join place_order po on po.user_id = u.id
                                                                    where shipped = 0 
                                                                        group by po.order_id");
                    $stmt_sel_place_order->execute();
                    $res_sel_place_order = $stmt_sel_place_order->get_result();

                    if($res_sel_place_order->num_rows > 0)
                    {
                      echo '
                      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-center">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                              EMAIL
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                              ORDER ID 
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                              TOTAL BILL
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                              PAYMENT METHOD
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                              ORDER DATE
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                              STATUS
                            </th>
                          </tr>
                        </thead>
                      ';
                      while($row = $res_sel_place_order->fetch_assoc())
                      {
                          $email = $row['email'];
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
                                  '.$email.'
                                </td>
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
                                <td class=" py-4">
                                    <span class="bg-orange-200 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        To ship
                                    </span>
                                </td>
                              </tr>
                          </tbody>
                          ';
                      }
                      echo'
                      </table>
                      ';
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <!-- Card Footer -->
          <div class="flex items-center justify-between pt-3 sm:pt-6">
            <div class="flex-shrink-0">
              <a href="admin.php?tab=to_ship" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-200 dark:text-primary-500 dark:hover:bg-gray-500">
                Orders Report
                <svg class="w-4 h-4 ml-1 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
              </a>
            </div>
          </div>
        </div>
    </div>
		<?php
	} 
  else
  if ($tab == 'progress_report') 
  {
		?>
		<!-- Code for the 'progress_report' tab -->
    <div class="px-4 pt-20 2xl:px-0">
      <!-- Main widget -->
      <div class="p-4 bg-gray-200 border border-gray-300 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6 mb-3">
        <div class="mb-4">
          <div class="grid grid-cols-1 gap-[10%]">
              <div class="flex gap-3">
              <svg width="25" height="25" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 13H4v3h2v-3zm5-4H9v7h2V9zm5-5h-2v12h2V4zm-2-1a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2zM8 9a1 1 0 011-1h2a1 1 0 011 1v7a1 1 0 01-1 1H9a1 1 0 01-1-1V9zm-5 4a1 1 0 011-1h2a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3z" clip-rule="evenodd"/>
              </svg>
                <h3 class="text-xl font-bold leading-none text-gray-900 sm:text-2xl">
                  Progress Report
                </h3>
                <br>
              </div>
              <form method="post">
                <input type="submit" value="Overall" name="progress" class="bg-gray-500 hover:bg-blue-500 text-white font-semibold py-2 px-4 mx-3 rounded">
                <input type="submit" value="Daily" name="progress" class="bg-gray-500 hover:bg-blue-500 text-white font-semibold py-2 px-4 mx-3 rounded">
                <input type="submit" value="Weekly" name="progress" class="bg-gray-500 hover:bg-blue-500 text-white font-semibold py-2 px-4 mx-3 rounded">
                <input type="submit" value="Monthly" name="progress" class="bg-gray-500 hover:bg-blue-500 text-white font-semibold py-2 px-4 mx-3 rounded">
                <input type="submit" value="Yearly" name="progress" class="bg-gray-500 hover:bg-blue-500 text-white font-semibold py-2 px-4 mx-3 rounded">
              </form>
          </div>
          <?php
            $stmt_report = $conn->prepare("SELECT 
                                          COUNT(order_id),
                                          ANY_VALUE(order_id) as order_id,
                                          SUM(total_bill) as total_bill,
                                          ANY_VALUE(order_date) as order_date
                                          FROM place_order group by order_id");
            $stmt_report->execute([]);
            $res_report = $stmt_report->get_result();

            if ($res_report->num_rows > 0) 
            {
                // Loop through each row and populate the data arrays
                while ($row_report = $res_report->fetch_assoc()) {
                    $total_bill = $row_report['total_bill'];

                    $dailyData = [];
                    $weeklyData = [];
                    $monthlyData = [];
                    $yearlyData = [];

                    $daily = $total_bill/ count($row_report);
                    $weekly = $total_bill / 7;
                    $monthly = $total_bill / 30;
                    $yearly = $total_bill / 360;

                    $f_daily = number_format($daily, 2, '.', '');
                    $f_weekly = number_format($weekly, 2, '.', '');
                    $f_monthly = number_format($monthly, 2, '.', '');
                    $f_yearly = number_format($yearly, 2, '.', '');

                    array_push($dailyData, $f_daily);
                    array_push($weeklyData, $f_weekly);
                    array_push($monthlyData, $f_monthly);
                    array_push($yearlyData, $f_yearly);
                }
            }
          ?>
          <div style="width: 80%; margin: auto;">
            <canvas id="barChart"></canvas>
          </div>

          <?php
            if(isset($_POST['progress']))
            {
              $progress = $_POST['progress'];

              if($progress == 'Daily')
              {
                ?>
                <script>
                  var ctx = document.getElementById('barChart').getContext('2d');
                  var data = {
                      labels: ['Daily'],
                      datasets: [{
                          label: 'Daily Average Report',
                          data: 
                          [
                            <?php echo implode(',', $dailyData); ?>,
                          ],
                          backgroundColor: 'rgba(75, 192, 192, 0.2)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 1
                      }]
                  };
                  
                  var myBarChart = new Chart(ctx, {
                      type: 'bar',
                      data: data,
                      options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                              }
                          }
                      }
                  });
                </script>
                <?php
              }
              else if($progress == 'Weekly')
              {
                ?>
                <script>
                  var ctx = document.getElementById('barChart').getContext('2d');
                  var data = {
                      labels: ['Weekly'],
                      datasets: [{
                          label: 'Weekly Average Report',
                          data: 
                          [
                            <?php echo implode(',', $weeklyData); ?>
                          ],
                          backgroundColor: 'rgba(75, 192, 192, 0.2)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 1
                      }]
                  };
                  
                  var myBarChart = new Chart(ctx, {
                      type: 'bar',
                      data: data,
                      options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                              }
                          }
                      }
                  });
                </script>
                <?php
              }
              else if($progress == 'Monthly')
              {
                ?>
                <script>
                  var ctx = document.getElementById('barChart').getContext('2d');
                  var data = {
                      labels: [ 'Monthly'],
                      datasets: [{
                          label: 'Monthly Average Report',
                          data: 
                          [
                            <?php echo implode(',', $monthlyData); ?>
                          ],
                          backgroundColor: 'rgba(75, 192, 192, 0.2)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 1
                      }]
                  };
                  
                  var myBarChart = new Chart(ctx, {
                      type: 'bar',
                      data: data,
                      options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                              }
                          }
                      }
                  });
                </script>
                <?php
              }
              else if($progress == 'Yearly')
              {
                ?>
                <script>
                  var ctx = document.getElementById('barChart').getContext('2d');
                  var data = {
                      labels: ['Yearly'],
                      datasets: [{
                          label: 'Average Report Yearly',
                          data: 
                          [
                            <?php echo implode(',', $yearlyData); ?>,
                          ],
                          backgroundColor: 'rgba(75, 192, 192, 0.2)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 1
                      }]
                  };
                  
                  var myBarChart = new Chart(ctx, {
                      type: 'bar',
                      data: data,
                      options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                              }
                          }
                      }
                  });
                </script>
                <?php
              }
              else if($progress == "Overall")
              {
                ?>
                <script>
                  var ctx = document.getElementById('barChart').getContext('2d');
                  var data = {
                      labels: ['Daily', 'Weekly', 'Monthly', 'Yearly'],
                      datasets: [{
                          label: 'Over all Average Report',
                          data: 
                          [
                            <?php echo implode(',', $dailyData); ?>,
                            <?php echo implode(',', $weeklyData); ?>,
                            <?php echo implode(',', $monthlyData); ?>,
                            <?php echo implode(',', $yearlyData); ?>
                          ],
                          backgroundColor: 'rgba(75, 192, 192, 0.2)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 1
                      }]
                  };
                  
                  var myBarChart = new Chart(ctx, {
                      type: 'bar',
                      data: data,
                      options: {
                          scales: {
                              y: {
                                  beginAtZero: true
                              }
                          }
                      }
                  });
                </script>
                <?php 
              }
            }
            else
            {
              ?>
              <script>
                var ctx = document.getElementById('barChart').getContext('2d');
                var data = {
                    labels: ['Daily', 'Weekly', 'Monthly', 'Yearly'],
                    datasets: [{
                        label: 'Overall Average Report',
                        data: 
                        [
                          <?php echo implode(',', $dailyData); ?>,
                          <?php echo implode(',', $weeklyData); ?>,
                          <?php echo implode(',', $monthlyData); ?>,
                          <?php echo implode(',', $yearlyData); ?>
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                };
                
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
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
  if($tab == 'products') 
  {
		?>
		    <!-- search and table here-->
        <div class="bg-gray-200  relative shadow-md sm:rounded-lg overflow-hidden mt-20">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="flex-1 flex items-center space-x-2">
                    <h5>
                      <?php
                        $stmt_count_product = $conn->prepare("SELECT COUNT(*) FROM products");
                        $stmt_count_product->execute();
                        $res_count_product = $stmt_count_product->get_result();
                        
                        $count_product = 0;
                        
                        if($res_count_product->num_rows > 0) 
                        {
                          $row = $res_count_product->fetch_row();
                          $count_product = $row[0];
                        } else {
                          $count_product = 0;
                        }
                      ?>
                        Over all products : <span class="text-blue-600 font-semibold text-xl"><?php echo $count_product ?></span>
                    </h5>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                <!-- search bar here  -->
                <div class="w-full md:w-1/2">
                  <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <!-- search functions  -->
                    <form class="lg:pr-3" method="POST">
                      <label for="users-search" class="sr-only">Search</label>
                      <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" name="search" id="users-search" placeholder="Search for users" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                      </div>
                    </form>
                    <a href="admin.php?tab=<?php echo $tab ?>" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white text-md font-semibold hover rounded transition">
                      Back
                    </a>
                  </div>
                </div>
                <!-- add product  -->
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                  <button type="button" data-modal-toggle="add-product-modal" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Add Product
                  </button>
                </div>
            </div>
            <?php
              // add to product 
              if(isset($_POST['add_product_submit']))
              {
                $product_id = $_POST['product_id'];
                $brand = $_POST['brand'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $xs_avail = $_POST['xs_avail'];
                $sm_avail = $_POST['sm_avail'];
                $md_avail = $_POST['md_avail'];
                $lg_avail = $_POST['lg_avail'];
                $xlg_avail = $_POST['xlg_avail'];

                $upload_ext = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
                $upload_name = 'product-' . rand(10000000,99999999);
                $product_image = '../product_upload/'. $upload_name .'.'. $upload_ext;

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

                  // check product id if existing 
                  $stmt_product_id = $conn->prepare("select * from products where product_id = ?");
                  $stmt_product_id->execute([$product_id]);
                  $res_product_id = $stmt_product_id->get_result();

                  if($res_product_id->num_rows > 0)
                  {
                    echo '
                    <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400  dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium">
                          Product ID should be unique.
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>';
                  }
                  else
                  {
                    $stmt_add_product = $conn->prepare("insert into products (product_id, image, brand, name, price, xs_avail, sm_avail, md_avail, lg_avail, xlg_avail)
                    values('$product_id','$product_image','$brand','$name','$price','$xs_avail','$sm_avail','$md_avail','$lg_avail','$xlg_avail' )");
                    $stmt_add_product->execute();

                    if($stmt_add_product->affected_rows > 0)
                    {
                      ?>
                      <script>
                        location.href = "admin.php?tab=products";
                      </script>
                      <?php
                    }
                  }

                  
                }

              }
            ?>
            <div class="overflow-x-auto">
                <!-- table here  -->
                <?php
                  if(isset($_POST['search']))
                  {
                    $search = $_POST['search'];
                    // get data of products 
                    $stmt_product = $conn->prepare("select * from products where product_id like '%$search%' or brand like '%$search%' or name like '%$search%' ");
                    $stmt_product->execute();
                    $res_product = $stmt_product->get_result();
                  }
                  else
                  {
                    // get data of products 
                    $stmt_product = $conn->prepare("select * from products order by product_id, brand");
                    $stmt_product->execute();
                    $res_product = $stmt_product->get_result();
                  }
                  if($res_product->num_rows > 0)
                  {
                    ?>
                    <table class="w-full text-sm text-left text-gray-500 ">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                        <tr>
                            <th scope="col" class="p-4">Product ID</th>
                            <th scope="col" class="p-4">Image</th>
                            <th scope="col" class="p-4">Brand</th>
                            <th scope="col" class="p-4">Name</th>
                            <th scope="col" class="p-4">Update</th>
                            <th scope="col" class="p-4">Remove</th>
                            <th scope="col" class="p-4">Price</th>
                            <th scope="col" class="p-4">Extra Small</th>
                            <th scope="col" class="p-4">Small</th>
                            <th scope="col" class="p-4">Medium</th>
                            <th scope="col" class="p-4">Large </th>
                            <th scope="col" class="p-4">Extra Large </th>
                            <th scope="col" class="p-4">Total </th>
                        </tr>
                      </thead>
                    <?php
                    while($row_product = $res_product->fetch_assoc())
                    {
                      $product_id = $row_product['product_id'];
                      $image = $row_product['image'];
                      $brand = $row_product['brand'];
                      $name = $row_product['name'];
                      $price = $row_product['price'];

                      $xs_avail = $row_product['xs_avail'];
                      $sm_avail = $row_product['sm_avail'];
                      $md_avail = $row_product['md_avail'];
                      $lg_avail = $row_product['lg_avail'];
                      $xlg_avail = $row_product['xlg_avail'];

                      $total_product = ($xs_avail + $sm_avail + $md_avail + $lg_avail + $xlg_avail);

                      $id = $row_product['id'];


                      //price format
                      $price_format = number_format($price, '2', '.', ',');

                      echo '
                      <tbody>
                        <tr class="border-b dark:border-gray-600 text-center hover:bg-gray-100 dark:hover:bg-gray-500">
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                              <div class="flex items-center">
                                '.$product_id.'
                              </div>
                              <div class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-1 border border-blue-500 hover:border-transparent rounded">
                                <a href="change_id_product.php?id='.$id.'">
                                  Change ID
                                </a>
                              </div>
                            </td>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                <div class="flex items-center mr-3">
                                  <img src="'.$image.'" class="h-8 w-auto mr-3">
                                </div>
                            </th>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                '.$brand.'
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                '.$name.'
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                <a href="action_product.php?tab='.$tab.'&action=update&id='.$id.'">
                                  <svg width="35" height="35" fill="#0009ff" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M13.293 3.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM14 4l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M14.146 8.354l-2.5-2.5.708-.708 2.5 2.5-.708.708zM5 12v.5a.5.5 0 00.5.5H6v.5a.5.5 0 00.5.5H7v.5a.5.5 0 00.5.5H8v-1.5a.5.5 0 00-.5-.5H7v-.5a.5.5 0 00-.5-.5H5z" clip-rule="evenodd"/>
                                  </svg>
                                </a>
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                <a href="action_product.php?tab='.$tab.'&action=remove&id='.$id.'" onclick="return confirm(\' Are You Sure you want to delete this product record ? \')">
                                  <svg width="35" height="35" fill="#ff001e" viewBox="0 0 20 20">
                                    <path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"/>
                                    <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"/>
                                  </svg>
                                </a>
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                Php '.$price_format.'
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                 <span class="text-red-600 text-lg"> ('.$xs_avail.')</span> 
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                 <span class="text-red-600 text-lg"> ('.$sm_avail.')</span> 
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                 <span class="text-red-600 text-lg"> ('.$md_avail.')</span> 
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                 <span class="text-red-600 text-lg"> ('.$lg_avail.')</span> 
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                 <span class="text-red-600 text-lg"> ('.$xlg_avail.')</span> 
                              </div>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                              <div class="flex items-center">
                                 <span class="text-violet-700 text-lg underline"> ' .$total_product.' </span> 
                              </div>
                            </td>
                        </tr>
                      </tbody>
                      ';
                    }
                    echo '
                    </table>
                    ';
                  }
                ?>
            </div>
          </div>
        <!--product modal (add product) here -->
        <div id="add-product-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-gray-200 rounded-lg shadow  sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 ">Add Product</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-gray-700" data-modal-toggle="add-product-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <!-- product id  -->
                            <div>
                              <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 ">Product ID</label>
                              <input type="text" name="product_id" id="product_id" placeholder="Type product ID" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <!-- product name  -->
                            <div>
                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
                              <input type="text" name="name" id="name" placeholder="Type product name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                              <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Brand</label>
                              <select id="category" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="shark" selected>Shark</option>
                                <option value="agv">Agv</option>
                                <option value="arai">Arai</option>
                                <option value="shoei">Shoei</option>
                              </select>
                            </div>
                            <div>
                              <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Sizes</label>
                              <!-- extra small  -->
                              <input type="number" name="xs_avail" id="xs_avail" min="0" placeholder="Extra Small" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                              <!--  small  -->
                              <input type="number" name="sm_avail" id="sm_avail" min="0" placeholder="Small" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                              <!--  medium  -->
                              <input type="number" name="md_avail" id="md_avail" min="0" placeholder="Medium" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                              <!--  Large  -->
                              <input type="number" name="lg_avail" id="lg_avail" min="0"placeholder="Large" required class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                              <!--  Extra Large  -->
                              <input type="number" name="xlg_avail" id="xlg_avail" min="0" placeholder="Extra Large" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                <input type="number" name="price" id="price" placeholder="Price here" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            </div>
                        </div>
                        <!-- image upload  -->
                        <div class="mb-4">
                            <span class="block mb-2 text-sm font-medium text-gray-900 ">Product Images</span>
                            <label class="block">
                              <span class="sr-only">Choose File</span>
                              <input type="file" name="product_image" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                            </label>
                        </div>
                        <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                            <button type="submit" name="add_product_submit" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                              Add product
                            </button>
                            <button data-modal-toggle="add-product-modal" type="button" class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-300 text-sm font-medium px-5 py-2 hover:text-gray-900 focus:z-10  dark:border-gray-500 dark:hover:text-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                              <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                              Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<?php
	}
  else 
  if ($tab == 'users') 
  {
		?>
		  <!--search tabs and add users -->
      <div class="p-4 bg-gray-200 block sm:flex items-center justify-between border-b border-gray-300 lg:mt-20 mt-10  ">
          <div class="w-full mb-1">
              <div class="mb-4">
                  <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">All users</h1>
              </div>
              <div class="sm:flex">
                  <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <!-- search functions  -->
                    <form class="lg:pr-3" method="POST">
                      <label for="users-search" class="sr-only">Search</label>
                      <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" name="search_user" id="users-search" placeholder="Search for users" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                      </div>
                    </form>
                    <a href="admin.php?tab=<?php echo $tab ?>" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white text-md font-semibold hover rounded transition">
                      Back
                    </a>
                  </div>
                  <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                      <button type="button" data-modal-toggle="add-user-modal" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                          Add user
                      </button>
                  </div>
              </div>
          </div>
      </div>
      <!-- users table  -->
      <div class="flex flex-col">
          <div class="overflow-x-auto">
              <div class="inline-block min-w-full align-middle">
                  <div class="overflow-hidden shadow">
                    <?php 
                      if(isset($_POST['search_user']))
                      {
                        $search_user = $_POST['search_user'];
                        $stmt_user = $conn->prepare("select * from users where email like '%$search_user%' or fname like '%$search_user%' or lname like '%$search_user%' ");
                        $stmt_user->execute();
                        $res_user = $stmt_user->get_result();
                      }
                      else{
                        $stmt_user = $conn->prepare("select * from users");
                        $stmt_user->execute();
                        $res_user = $stmt_user->get_result();
                      }

                      // edit user 
                      if(isset($_POST['edit_user_submit']))
                      {
                        $email = $_POST['email'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $contact = $_POST['contact'];
                        $address = $_POST['address'];
                        $verification = $_POST['verification'];

                        $stmt_edit_user = $conn->prepare("update users set fname = ?, lname = ?, contact = ?, address = ?, verification = ? where email = ?");
                        $stmt_edit_user->execute([$fname, $lname, $contact, $address, $verification, $email]);

                        if($stmt_edit_user-> affected_rows > 0 )
                        {
                          ?>
                          <script>
                            location.href = "admin.php?tab=<?php echo $tab ?>";
                          </script>
                          <?php
                        }
                      }
                      // add user 
                      if(isset($_POST['add_user_submit']))
                      {
                        $email = $_POST['email'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $contact = $_POST['contact'];
                        $address = $_POST['address'];
                        $pass = $_POST['pass'];
                        $cpass = $_POST['cpass'];
                        $msg = [];
                        $error = false;
                        
                        // generate pin
                        $pin = rand(100000, 999999);

                        // hashed password
                        $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

                        // check if email exist in users database
                        $stmt = $conn->prepare('select * from users where email = ?');
                        $stmt->bind_param('s', $email);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        // if email is already in database
                        if ($res->num_rows > 0) {
                          $msg[] = '
                          <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                              Email Not Available!
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                          </div>';
                          $error = true;
                        }
                        // check if password and confirm password match
                        if ($pass != $cpass) 
                        {
                          $msg[] = '
                          <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                              Password and Confirm Password Does not match!
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                              <span class="sr-only">Close</span>
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                          </div>';
                          $error = true;
                        } else if (!$error) {
                          // insert data
                          $stmt = $conn->prepare('insert into users (email, fname, lname, contact, address, pass, pin) values (?,?,?,?,?,?,?) ');
                          $stmt->bind_param('sssissi', $email, $fname, $lname, $contact, $address, $hash_pass, $pin);
                          $stmt->execute();

                          if ($stmt->affected_rows > 0) {
                            ?>
                              <script>
                                location.href = "admin.php?tab=<?php echo $tab ?>";
                              </script>
                              <?php
                          }
                        }
                        // display error message
                        foreach ($msg as $dis_msg)
                        {
                          echo $dis_msg;
                        }

                      }

                      if($res_user->num_rows > 0)
                      {
                        ?>
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                          <thead class="bg-gray-100 ">
                              <tr>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Profile Image
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Email
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      First name
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Last Name
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Contact
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Address
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Date Registration
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Actions
                                  </th>
                                  <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase">
                                      Verification
                                  </th>
                              </tr>
                          </thead>
                        <?php
                        while($row_user = $res_user->fetch_assoc())
                        {
                          $email = $row_user['email'];
                          $fname = $row_user['fname'];
                          $lname = $row_user['lname'];
                          $contact = $row_user['contact'];
                          $address = $row_user['address'];
                          $image = $row_user['image'];
                          $date_reg = $row_user['date_reg'];
                          $verification = $row_user['verification'];

                          if(empty($image))
                          {
                            $image_show = '<img src="../assets/images/profile/default_profile.png" class="w-10 h-10 rounded-full">';

                          }
                          else{
                            $image_show = '<img src="../'.$image.'" class="w-10 h-10 rounded-full">';
                          }

                          if($verification == 0)
                          {
                            $verification_show = ' <h6 class="text-orange-700">Not verified </h6> ';
                          }
                          else if($verification == 1)
                          {
                            $verification_show = ' <h6 class="text-green-700"> Verified </h6> ';
                          }
                          else if($verification == 2)
                          {
                            $verification_show = ' <h6 class="text-red-700"> Disabled </h6> ';
                          }
                          
                          echo '
                          <tbody class="bg-gray-200 divide-y divide-gray-200  dark:divide-gray-700">
                              <tr class="hover:bg-gray-200 dark:hover:bg-gray-500">
                                  <td class="items-center p-4 mr-12 ">
                                      '.$image_show.'
                                  </td>
                                  <td class="max-w-sm p-4 overflow-hidden text-gray-700 font-normal text-gray-500 truncate xl:max-w-xs">
                                  '.$email.'
                                  </td>
                                  <td class="p-4 text-base font-medium text-gray-700 whitespace-nowrap ">
                                  '.$fname.'
                                  </td>
                                  <td class="p-4 text-base font-medium text-gray-700 whitespace-nowrap ">
                                  '.$lname.'
                                  </td>
                                  <td class="p-4 text-base font-medium text-gray-700 whitespace-nowrap ">
                                  '.$contact.'
                                  </td>
                                  <td class="p-4 text-base font-medium text-gray-700 whitespace-nowrap ">
                                  '.$address.'
                                  </td>
                                  <td class="p-4 text-base font-medium text-gray-700 whitespace-nowrap ">
                                  '.$date_reg.'
                                  </td>
                                  <td class="p-4 space-x-2 whitespace-nowrap">
                                      <button type="button" data-modal-toggle="edit-user-modal-'.$email.'" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-slate-100 rounded-lg bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 transition">
                                          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                          Edit user
                                      </button>
                                      
                                  </td>
                                  <td>
                                    <div class="inline-flex items-center px-3 py-2 text-sm font-medium text-center">
                                      '.$verification_show.'
                                    </div>
                                  </td>
                              </tr>                        
                          </tbody>
                          ';
                          ?>
                            <!-- Edit User Modal -->
                            <div id="edit-user-modal-<?php echo $email ?>" class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
                                <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                                    <div class="relative bg-gray-200 rounded-lg shadow ">
                                        <div class="flex items-start justify-between p-5 border-b rounded-t ">
                                            <h3 class="text-xl font-semibold ">
                                                Edit user
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-500 " data-modal-toggle="edit-user-modal-<?php echo $email?>">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <form method="post">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <!-- first name  -->
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                                                        <input type="text" name="fname" id="fname" value="<?php echo $fname?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    </div>
                                                    <!-- last name  -->
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                                                        <input type="text" name="lname" id="lname" value="<?php echo $lname?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    </div>
                                                    <!-- contact  -->
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 ">Contact (63+)</label>
                                                        <input type="contact" name="contact" maxlength="10" minlength="10" id="Contact" 
                                                        value="<?php echo $contact?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    </div>
                                                    <!-- address  -->
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                                                        <input type="text" name="address" id="address" value="<?php echo $address?>" 
                                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    </div>
                                                    <!-- Verification  -->
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="verification" class="block mb-2 text-sm font-medium text-gray-900 ">Verification</label>
                                                        <input type="number" name="verification" id="verification" min="0" max="2" value="<?php echo $verification ?>" 
                                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    </div>
                                                    <!-- Verification Legend -->
                                                    <div class="col-span-6 sm:col-span-3">
                                                      <label for="verification" class="block mb-2 text-sm font-medium text-dark ">Legend :</label>
                                                      <label for="verification" class="block mb-2 text-sm font-medium text-orange-600 ">0 not verify</label>
                                                      <label for="verification" class="block mb-2 text-sm font-medium text-green-700 ">1 is to verify</label>
                                                      <label for="verification" class="block mb-2 text-sm font-medium text-red-700 ">2 is to disable</label>
                                                    </div>
                                                    <!-- hidden email used for id  -->
                                                    <input type="hidden" name="email" value="<?php echo $email ?>">
                                                </div> 
                                            </div>
                                            <!-- Modal submit -->
                                            <div class="items-center p-6 border-t border-gray-300 rounded-b ">
                                                <button type="submit" name="edit_user_submit" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                                                  Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                          <?php
                        }
                        echo '
                        </table>
                        ';
                      }
                    ?>
                    <!-- Add User Modal -->
                    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full" id="add-user-modal">
                      <div class="relative w-full h-full max-w-2xl px-4 md:h-auto">
                          <div class="relative bg-gray-200 rounded-lg shadow ">
                              <div class="flex items-start justify-between p-5 border-b rounded-t ">
                                  <h3 class="text-xl font-semibold ">
                                      Add new user
                                  </h3>
                                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-500 " data-modal-toggle="add-user-modal">
                                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                  </button>
                              </div>
                              <!-- Modal body -->
                              <div class="p-6 space-y-6">
                                  <form method="post">
                                      <div class="grid grid-cols-6 gap-6">
                                        <!-- Email  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                            <input type="text" name="email" id="email" placeholder="Email here" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                        <!-- First name  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 ">First Name</label>
                                            <input type="text" name="fname" id="fname" placeholder="First name here" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                        <!-- Last name  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="lname" class="block mb-2 text-sm font-medium text-gray-900 ">Last Name</label>
                                            <input type="text" name="lname" id="lname" placeholder="Last name here" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                        <!-- Contact  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 ">Contact</label>
                                            <input type="contact" name="contact" maxlength="10" minlength="10" placeholder="Contact (63+)" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                        <!-- Address  -->
                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                                            <input type="text" name="address" id="address" placeholder="Address here" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                        <!-- Password  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                            <input type="password" name="pass" id="pass" placeholder="password here" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                        <!-- Confirm Password  -->
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="cpass" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm Password</label>
                                            <input type="password" name="cpass" id="cpass" placeholder="Confirm password here" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                        </div>
                                      </div> 
                                  </div>
                                  <!-- Modal submit -->
                                  <div class="items-center p-6 border-t border-gray-300 rounded-b ">
                                      <button type="submit" name="add_user_submit" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                                        Add user
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>

      
    <?php
  } 
  else
  if ($tab == 'to_ship') 
  {
    ?>
    <!-- Code for the 'payment' tab -->
    <div class="p-4 mt-20 bg-gray-200 border border-gray-300 rounded-lg shadow-sm  sm:p-6">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <span class="bg-orange-200 text-orange-800 text-lg font-medium px-5 py-3 rounded-full dark:bg-orange-900 dark:text-orange-300">
            Orders To Ship
          </span>
        </div>
        <div class="sm:flex">
          <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <!-- search functions  -->
            <form class="lg:pr-3" method="POST">
              <label for="search_order" class="sr-only">Search</label>
              <div class="relative mt-1 lg:w-64 xl:w-96">
                <input type="text" name="search_order" id="search_order" placeholder="Search Order" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
              </div>
            </form>
            <a href="admin.php?tab=<?php echo $tab ?>" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white text-md font-semibold hover rounded transition">
              Back
            </a>
          </div>
        </div>
      </div>

      <?php 
        // view order details
        if(isset($_GET['order_id']) && isset($_GET['user_id']) && isset($_GET['email']))
        {
            $order_id = $_GET['order_id'];
            $user_id = $_GET['user_id'];
            $email = $_GET['email'];
            $address = $_GET['address'];

            $stmt_get_order_details = $conn->prepare("SELECT po.*,p.* 
                                                    from place_order po join products p on po.product_id = p.product_id
                                                    where po.user_id = ? and po.order_id = ? and shipped = 0
                                                    ");
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
                    Order: <span class="text-blue-700"> #'.$order_id.' </span><br>
                    Email: <span class="text-blue-700"> '.$email.' </span> <br>
                    Address: <span class="text-blue-700"> '.$address.' </span>
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
                    $shipped = $row2['shipped'];

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
                        <tr class="bg-white border-b">
                            <td class="py-4 font-bold bg-gray-100">
                                Total Bill :
                                <span class="text-red-600">
                                    ₱ '.$total_bill_format.' 
                                </span> 
                            </td>
                            ';
                            if($shipped == 0)
                            {
                              echo 
                              '<td class="py-4 font-bold bg-green-600">
                                <a href="admin.php?tab='.$tab.'&order_id='.$order_id.'&shipped=1" class="text-white" 
                                  onclick="return confirm(\'Are You sure you want to mark as delivered ?\')">
                                  Mark as Delivered 
                                </a>
                              </td>';
                            }
                            echo'
                            <td class="py-4 font-bold bg-red-600">
                              <a href="admin.php?tab='.$tab.'" class="text-white">
                                Close X 
                              </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h2 class="pb-5 pt-[50px] font-semibold text-xl">Proof of payment :</h2>
                <img src="../'.$proof_image.'" alt="" class="w-auto object-contain">
                ';
            }
        }

        //delivered functions
        if(isset($_GET['order_id']) && isset($_GET['shipped']))
        {
          $order_id = $_GET['order_id'];
          $shipped = $_GET['shipped'];

          if($shipped == 1)
          {
            $stmt_shipped = $conn->prepare("UPDATE place_order set shipped = ? where order_id = ?");
            $stmt_shipped->execute([$shipped, $order_id]);
            
            if($stmt_shipped->affected_rows > 0)
            {
              ?>
              <script>
                location.href = "admin.php?tab=<?php echo $tab?>";
              </script>
              <?php
            }else{
              ?>
              <script>
                location.href = "../404.php";
              </script>
              <?php
            }
          }else{
            ?>
              <script>
                location.href = "../404.php";
              </script>
            <?php
          }

        }
      ?>
      
      <!-- Table -->
      <?php
      if(isset($_POST['search_order'])){
        $search_order = $_POST['search_order'];
        $stmt_sel_place_order = $conn->prepare("SELECT u.email, u.address, u.fname, u.lname, COUNT(po.order_id),
                                                ANY_VALUE(u.email) as email,
                                                ANY_VALUE(u.address) as address,
                                                ANY_VALUE(u.fname) as fname,
                                                ANY_VALUE(u.lname) as lname,
                                                ANY_VALUE(po.user_id) as user_id, 
                                                ANY_VALUE(po.order_id) as order_id, 
                                                ANY_VALUE(po.qnty) as qnty, 
                                                ANY_VALUE(po.total_bill) as total_bill,
                                                ANY_VALUE(po.pay_method) as pay_method, 
                                                ANY_VALUE(po.order_date) as order_date,
                                                ANY_VALUE(po.shipped) as shipped
                                                  from users u join place_order po on po.user_id = u.id 
                                                  where 
                                                    shipped = 0 and
                                                      email like '%$search_order%' or
                                                      fname like '%$search_order%' or
                                                      lname like '%$search_order%' or
                                                      address like '%$search_order%' or
                                                      order_id like '%$search_order%'
                                                  group by order_id, u.id
                                                  order by order_date desc 
                                                ");
        $stmt_sel_place_order->execute();
        $res_sel_place_order = $stmt_sel_place_order->get_result();
      }
      else{
        $stmt_sel_place_order = $conn->prepare("SELECT u.email, u.address, u.fname, u.lname, COUNT(po.order_id),
                                                ANY_VALUE(u.email) as email,
                                                ANY_VALUE(u.address) as address,
                                                ANY_VALUE(u.fname) as fname,
                                                ANY_VALUE(u.lname) as lname,
                                                ANY_VALUE(po.user_id) as user_id, 
                                                ANY_VALUE(po.order_id) as order_id, 
                                                ANY_VALUE(po.qnty) as qnty, 
                                                ANY_VALUE(po.total_bill) as total_bill,
                                                ANY_VALUE(po.pay_method) as pay_method, 
                                                ANY_VALUE(po.order_date) as order_date, 
                                                ANY_VALUE(po.shipped) as shipped
                                                  from users u join place_order po on po.user_id = u.id 
                                                  where shipped = 0
                                                group by order_id, u.id
                                                order by shipped asc, order_date asc 
                                                ");
        $stmt_sel_place_order->execute();
        $res_sel_place_order = $stmt_sel_place_order->get_result();
      }

        if($res_sel_place_order->num_rows > 0)
        {
          echo '
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-center mt-5">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  EMAIL/ NAME
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  ADDRESS
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  ORDER ID 
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  TOTAL BILL
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  PAYMENT METHOD
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  ORDER DATE
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  Details
                </th>
              </tr>
            </thead>
          ';
          while($row = $res_sel_place_order->fetch_assoc())
          {
              $email = $row['email'];
              $address = $row['address'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $user_id = $row['user_id'];
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
                  $pay_method = '<h3 class="font-semibold text-blue-600"> Gcash </h3>';
              }
              else if($pay_method == 'maya')
              {
                  $pay_method = '<h3 class="font-semibold text-green-600"> Pay Maya </h3>';
              }
              echo '
              <tbody>
                  <tr class="bg-white border-b  dark:border-gray-700">
                      <td class="py-4">
                      <span class="font-semibold">'.$email.'</span> <br>
                      '.$fname.' '.$lname.'
                    </td>
                    <td class="py-4">
                      '.$address.'
                    </td>
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
                    <td class="">
                      <a href="admin.php?tab='.$tab.'&order_id='.$order_id.'&user_id='.$user_id.'&email='.$email.'&address='.$address.'">
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
          <h1 class="bg-gray-500 p-[5%] text-white w-[100%] text-center text-3xl font-bold">
            There are no records to ship yet.
          </h1>
          <?php
        }
      ?>

    </div>
    <?php
  } 
  else
  if ($tab == 'completed') 
  {
    ?>
    <!-- Code for the 'payment' tab -->
    <div class="p-4 mt-20 bg-gray-200 border border-gray-300 rounded-lg shadow-sm  sm:p-6">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <span class="bg-green-200 text-green-800 text-lg font-medium px-5 py-3 rounded-full dark:bg-green-900 dark:text-green-300">
            Orders Completed
          </span>
        </div>
        <div class="sm:flex">
          <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <!-- search functions  -->
            <form class="lg:pr-3" method="POST">
              <label for="search_order" class="sr-only">Search</label>
              <div class="relative mt-1 lg:w-64 xl:w-96">
                <input type="text" name="search_order" id="search_order" placeholder="Search Order" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" >
              </div>
            </form>
            <a href="admin.php?tab=<?php echo $tab ?>" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white text-md font-semibold hover rounded transition">
              Back
            </a>
          </div>
        </div>
      </div>

      <?php 
        // view order details
        if(isset($_GET['order_id']) && isset($_GET['user_id']) && isset($_GET['email']))
        {
            $order_id = $_GET['order_id'];
            $user_id = $_GET['user_id'];
            $email = $_GET['email'];
            $address = $_GET['address'];

            $stmt_get_order_details = $conn->prepare("SELECT po.*,p.* 
                                                    from place_order po join products p on po.product_id = p.product_id
                                                    where po.user_id = ? and po.order_id = ? and shipped = 1
                                                    ");
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
                    Order: <span class="text-blue-700"> #'.$order_id.' </span><br>
                    Email: <span class="text-blue-700"> '.$email.' </span> <br>
                    Address: <span class="text-blue-700"> '.$address.' </span>
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
                    $shipped = $row2['shipped'];

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
                        <tr class="bg-white border-b">
                            <td class="py-4 font-bold bg-gray-100">
                                Total Bill :
                                <span class="text-red-600">
                                    ₱ '.$total_bill_format.' 
                                </span> 
                            </td>
                            ';
                            if($shipped == 0)
                            {
                              echo 
                              '<td class="py-4 font-bold bg-green-600">
                                <a href="admin.php?tab='.$tab.'&order_id='.$order_id.'&shipped=1" class="text-white" 
                                  onclick="return confirm(\'Are You sure you want to mark as delivered ?\')">
                                  Mark as Delivered 
                                </a>
                              </td>';
                            }
                            echo'
                            <td class="py-4 font-bold bg-red-600">
                              <a href="admin.php?tab='.$tab.'" class="text-white">
                                Close X 
                              </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h2 class="pb-5 pt-[50px] font-semibold text-xl">Proof of payment :</h2>
                <img src="../'.$proof_image.'" alt="" class="w-auto object-contain">
                ';
            }
        }

      ?>
      
      <!-- Table -->
      <?php
      if(isset($_POST['search_order']))
      {
        $search_order = $_POST['search_order'];
        $stmt_sel_place_order = $conn->prepare("SELECT u.email, u.address, u.fname, u.lname, COUNT(po.order_id),
                                                ANY_VALUE(u.email) as email,
                                                ANY_VALUE(u.address) as address,
                                                ANY_VALUE(u.fname) as fname,
                                                ANY_VALUE(u.lname) as lname,
                                                ANY_VALUE(po.user_id) as user_id, 
                                                ANY_VALUE(po.order_id) as order_id, 
                                                ANY_VALUE(po.qnty) as qnty, 
                                                ANY_VALUE(po.total_bill) as total_bill,
                                                ANY_VALUE(po.pay_method) as pay_method, 
                                                ANY_VALUE(po.order_date) as order_date,
                                                ANY_VALUE(po.shipped) as shipped
                                                  from users u join place_order po on po.user_id = u.id 
                                                  where shipped = 1 and
                                                      email like '%$search_order%' or
                                                      fname like '%$search_order%' or
                                                      lname like '%$search_order%' or
                                                      address like '%$search_order%' or
                                                      order_id like '%$search_order%'
                                                group by order_id, u.id
                                                order by order_date desc 
                                                ");
        $stmt_sel_place_order->execute();
        $res_sel_place_order = $stmt_sel_place_order->get_result();
      }
      else{
        $stmt_sel_place_order = $conn->prepare("SELECT u.email, u.address, u.fname, u.lname, COUNT(po.order_id),
                                                ANY_VALUE(u.email) as email,
                                                ANY_VALUE(u.address) as address,
                                                ANY_VALUE(u.fname) as fname,
                                                ANY_VALUE(u.lname) as lname,
                                                ANY_VALUE(po.user_id) as user_id, 
                                                ANY_VALUE(po.order_id) as order_id, 
                                                ANY_VALUE(po.qnty) as qnty, 
                                                ANY_VALUE(po.total_bill) as total_bill,
                                                ANY_VALUE(po.pay_method) as pay_method, 
                                                ANY_VALUE(po.order_date) as order_date, 
                                                ANY_VALUE(po.shipped) as shipped
                                                  from users u join place_order po on po.user_id = u.id 
                                                  where shipped = 1
                                                group by order_id, u.id
                                                order by shipped asc, order_date asc 
                                                ");
        $stmt_sel_place_order->execute();
        $res_sel_place_order = $stmt_sel_place_order->get_result();
      }

        if($res_sel_place_order->num_rows > 0)
        {
          echo '
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-center mt-5">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  EMAIL/ NAME
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  ADDRESS
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  ORDER ID 
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  TOTAL BILL
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  PAYMENT METHOD
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  ORDER DATE
                </th>
                <th scope="col" class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase ">
                  Details
                </th>
              </tr>
            </thead>
          ';
          while($row = $res_sel_place_order->fetch_assoc())
          {
              $email = $row['email'];
              $address = $row['address'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $user_id = $row['user_id'];
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
                  $pay_method = '<h3 class="font-semibold text-blue-600"> Gcash </h3>';
              }
              else if($pay_method == 'maya')
              {
                  $pay_method = '<h3 class="font-semibold text-green-600"> Pay Maya </h3>';
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
                      <td class="py-4">
                      <span class="font-semibold">'.$email.'</span> <br>
                      '.$fname.' '.$lname.'
                    </td>
                    <td class="py-4">
                      '.$address.'
                    </td>
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
                    <td class="">
                      <a href="admin.php?tab='.$tab.'&order_id='.$order_id.'&user_id='.$user_id.'&email='.$email.'&address='.$address.'">
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
          <h1 class="bg-gray-500 p-[5%] text-white w-[100%] text-center text-3xl font-bold">
            There are no completed records yet.
          </h1>
          <?php
        }
      ?>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </body>
</html>	