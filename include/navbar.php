<section class="navbar bg-gray-200 fixed z-50 lg:px-12">
  <div class="navbar bg-gray-200 lg:px-24 justify-around">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </label>
        <ul tabindex="0" class=" menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="index.php" class="block px-4 py-2 hover:bg-black  hover:text-white">Home</a></li>
          <li tabindex="0">
            <a class="hover:bg-black  hover:text-white">
              Shop
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
              </svg>
            </a>
            <ul class="p-2 border bg-gray-100">
              <li>
                <a href="shop.php?product=shark" class="block px-4 py-2 hover:bg-black hover:text-white">SHARK</a>
              </li>
              <li>
                <a href="shop.php?product=shoei" class="block px-4 py-2 hover:bg-black hover:text-white">SHOEI</a>
              </li>
              <li>
                <a href="shop.php?product=avg" class="block px-4 py-2 hover:bg-black hover:text-white">AGV</a>
              </li>
              <li>
                <a href="shop.php?product=arai" class="block px-4 py-2 hover:bg-black hover:text-white">ARAI</a>
              </li>
            </ul>
          </li>
          <li><a href="../index.php#about" class="block px-4 py-2 hover:bg-black hover:text-white">About</a></li>
          <li><a href="#contact" class="block px-4 py-2 hover:bg-black hover:text-white">Contact</a></li>
          <li><a href="login.php" class="block px-4 py-2 hover:bg-black hover:text-white">Log In</a></li>
          <li><a href="register.php" class="block px-4 py-2 hover:bg-black hover:text-white">Register</a></li>
        </ul>
      </div>
      <a href="index.php">
        <img class="hidden lg:flex h-20" src="assets/images/logo/Logo.png" alt="">
      </a>
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
      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
        class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
        <span
          class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
        <span class="relative text-black group-hover:text-white">SHOP</span>
      </button>
      <!-- Dropdown menu -->
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
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

    <?php
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
        // fetch image 
        $image = $user['image'];

        ?>
        <div class="flex-none">
          <!-- cart drop down  -->
          <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
              <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="badge badge-sm indicator-item">
                  <?php
                    // count all from cart 
                    $stmt_count = $conn->prepare("select count(*) from cart where user_id = ?");
                    $stmt_count->execute([$user_id]);
                    $res_count = $stmt_count->get_result();
                    $count_cart = mysqli_fetch_array($res_count)[0];
                    echo $count_cart;

                    // sum the amount of cart
                    $stmt_sum = $conn->prepare("SELECT SUM(price) AS subtotal FROM cart WHERE user_id = ?");
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
                <h3 class="">Subtotal :
                  <span class="text-red-600">
                    ₱ <?php echo $subtotal_format ?>
                  </span>
                </h3>
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
                if (empty($image)) {
                  $image = '
                              <img src="assets/images/profile/default_profile.png" >
                          ';
                } else {
                  $image = '
                              <img src="' . $image . '">
                          ';
                      }
                      echo $image;
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
                        <span class="relative text-black flex group-hover:text-white">Profile</span>
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
        <?php
        echo '</div>';
      } 
      else 
      {
        ?>
        <!-- login and register  -->
        <div class="navbar-end hidden sm:flex">
          <a href="login.php"
            class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group mr-4">
            <span
              class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">Login</span>
          </a>
          <a href="register.php"
            class="flex justify-center gap-1 relative inline-block px-3 py-2 text-sm font-medium group">
            <span
              class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
            <span class="relative text-black group-hover:text-white">Register</span>
          </a>
        </div>
        <?php
      }
    ?>
  </div>


</section>

<?php
    include "logout_modal.php";
?>
<!--END THIS IS FOR LOGOUT MODAL -->