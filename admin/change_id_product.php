
<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />

    <title>Change Product Id | Headturners</title>
    
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
            <a href="admin.php?tab=transactions" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200 dark:hover:bg-gray-500">
              <svg width="30" height="30" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.5 5a.5.5 0 00-.5.5v2h5a.5.5 0 01.5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 01.5-.5h5v-2a.5.5 0 00-.5-.5h-13zM17 8.5h-4.551a2.678 2.678 0 01-.443 1.042c-.393.546-1.043.958-2.006.958-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 017.551 8.5H3v6a.5.5 0 00.5.5h13a.5.5 0 00.5-.5v-6zm-15-3A1.5 1.5 0 013.5 4h13A1.5 1.5 0 0118 5.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 012 14.5v-9z" clip-rule="evenodd"/>
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Transactions</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
<?php
  if(isset($_GET['id'])) 
  {
    $id = $_GET['id'];

    // get the product data in database 
    $stmt_product_data = $conn->prepare("select * from products where id = ?");
    $stmt_product_data->execute([$id]);
    $res_product_data = $stmt_product_data->get_result();
    $row_product_data = mysqli_fetch_assoc($res_product_data);

    $product_id = $row_product_data['product_id'];
    $name = $row_product_data['name'];
    $image = $row_product_data['image'];

    ?>
      <div class="bg-gray-200  relative shadow-md sm:rounded-lg overflow-hidden mt-20">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data">
              <h2 class="font-bold text-2xl p-2">Update Product ID</h2>
              <h1 class="font-bold text-xl text-red-500 p-5"> <?php echo $product_id  .' | '. $name ?> </h1>
              <!-- image preview  -->
              <img src="<?php echo $image ?>" width="100" height="100" class="py-4">
              <!-- product ID  -->
              <div class="mt-2">
                <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 ">Product ID</label>
                <input type="text" name="product_id" id="product_id" value="<?php echo $product_id?>" required class="bg-gray-50 mb-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
              </div>
              <!-- buttons  -->
              <button type="submit" name="update_product_id_submit" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-200 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-200 transition">
                Update product ID
              </button>
              <a href="admin.php?tab=products" class="w-full justify-center sm:w-auto text-white inline-flex items-center bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-300 text-sm font-medium px-5 py-2 hover:text-gray-900 focus:z-10  dark:border-gray-500 dark:hover:text-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Discard
              </a>
            </form>
            
            <!-- submit update button  -->
            <?php
              if(isset($_POST['update_product_id_submit']))
              {
                $product_id = $_POST['product_id'];

                // select product id in db 
                $stmt_product_id_db = $conn->prepare("select * from products where product_id = ?");
                $stmt_product_id_db->execute([$product_id]);
                $res_product_id_db = $stmt_product_id_db->get_result();

                if($res_product_id_db->num_rows > 0)
                {
                    echo '
                    <div id="alert-border-3" class="flex p-4 mb-4 mt-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400  dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium">
                            Product ID must be unique.
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8  dark:text-red-400 dark:hover:bg-gray-500"  data-dismiss-target="#alert-border-3" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>';
                }
                else
                {
                    $stmt_update_prod_id = $conn->prepare("update products set product_id = ? where id = ?");
                    $stmt_update_prod_id->execute([$product_id, $id]);
                    
                    if($stmt_update_prod_id->affected_rows > 0)
                    {
                        ?>
                        <script>
                            location.href = "admin.php?tab=products";
                        </script>
                        <?php
                    }
                }

              }
            ?>
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
?>


</div>

<!-- SIDEBAR AND NAVBAR-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </body>
</html>	