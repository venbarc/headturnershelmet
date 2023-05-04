    <!-- ====== Navbar Section Start -->
    <div class="fixed left-0 z-40 flex items-center w-full bg-fixed bg-cover" style="background-image: url('header7.png');">
      <div class="container">
        <div class="flex items-center justify-between w-full pt-12 md:pt-8 lg:pt-4">
          <div>
            <button id="navbarToggler" class="absolute right-4 top-1/2 block -translate-y-1/2  rounded-lg px-3 py-[24px] ring-primary focus:ring-2 lg:hidden">
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
            </button>
            <nav id="navbarCollapse" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-8 shadow-lg lg:static lg:block lg:w-full sm:pt-10 lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
              <ul class="block lg:flex">
                <li class="relative group">
                  <a href="index.php" class="flex py-2 mx-8 text-lg ud-menu-scroll text-gray-950 md:text-gray-950 group-hover:text-gray-200 lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-gray-300 lg:group-hover:text-gray-300 lg:group-hover:opacity-70">
                    Home
                  </a>
                </li>
                <li class="relative group">
                  <a href="about.php" class="flex py-2 mx-8 text-lg ud-menu-scroll text-gray-950 md:text-gray-950 group-hover:text-gray-200 lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-gray-300 lg:group-hover:text-gray-300 lg:group-hover:opacity-70 xl:ml-12">
                    About
                  </a>
                </li>
                <li class="relative group">
                  <a href="contact.php" class="flex py-2 mx-8 text-lg ud-menu-scroll text-gray-950 md:text-gray-950 group-hover:text-gray-200 lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-gray-300 lg:group-hover:text-gray-300 lg:group-hover:opacity-70 xl:ml-12">
                    Contact
                  </a>
                </li>
                <li class="relative submenu-item group">
                  <a href="javascript:void(0)" class="relative mx-8 flex py-2 text-lg text-gray-950 md:text-gray-950 md:hover-gray-800 after:absolute after:right-1 after:top-1/2 after:mt-[-2px] after:h-2 after:w-2 after:-translate-y-1/2 after:rotate-45 after:border-b-2 after:border-r-2 after:border-current after:border-rounded group-hover:text-gray-800 lg:mr-0 lg:ml-8 lg:inline-flex lg:py-6 lg:pl-0 lg:pr-4 lg:text-gray-300 lg:after:right-0 lg:group-hover:text-gray-300 lg:group-hover:opacity-70 xl:ml-12">
                    Shop
                  </a>
                  <div class="submenu relative top-full left-0 hidden w-[250px] rounded-sm md:text-gray-950 md:hover-gray-800 bg-white p-4 transition-[top] duration-300 group-hover:opacity-100 lg:invisible lg:absolute lg:top-[110%] lg:block lg:opacity-0 lg:shadow-lg lg:group-hover:visible lg:group-hover:top-full">
                    <a href="shoei.php" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-gray-200">
                      SHOEI
                    </a>
                    <a href="shark.php" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-gray-200">
                      SHARK
                    </a>
                    <a href="agv.php" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-gray-200">
                      AGV
                    </a>
                    <a href="arai.php" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-gray-200">
                      ARAI
                    </a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>

          <div class="justify-end hidden pr-16 sm:flex lg:pr-0">

            <!-- login Modal toggle -->
            <button data-modal-target="login-modal" data-modal-toggle="login-modal" class="py-3 text-base font-medium text-gray-300 loginBtn px-7 hover:opacity-70">
              Sign In
            </button>
            <!-- end of login toggle -->

            <!-- signup toggle -->
            <button data-modal-target="signup-modal" data-modal-toggle="signup-modal" class="px-6 py-3 text-base font-medium text-gray-300 duration-300 ease-in-out bg-white rounded-lg signUpBtn bg-opacity-20 hover:bg-opacity-100 hover:text-gray-950">
              Sign Up
            </button>

            <div class="flex items-center ml-8">
              <div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                </button>
              </div>
              <div class="z-50 hidden my-4 text-base list-none bg-gray-300 divide-y divide-gray-100 rounded shadow " id="dropdown-user">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm text-gray-900" role="none">
                    Username
                  </p>
                  <p class="text-sm font-medium text-gray-900 truncate " role="none">
                   your@gmail.com
                  </p>
                </div>
                <ul class="py-1" role="none">
                  <li>
                    <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Profile</a>
                  </li>
                  <li>
                    <a data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 " role="menuitem">Sign Out</a>
                  </li>
                </ul>
              </div>
              <!-- CART -->
              <li class="block mt-4 font-sans text-gray-300 align-middle lg:inline-block lg:mt-0 lg:ml-6 hover:text-gray-700">
                <a href="add_to_cart.php" class="relative flex">
                  <svg class="flex-1 w-8 h-8 fill-current" viewbox="0 0 24 24">
                    <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
                  </svg>
                  <span class="absolute top-0 right-0 w-4 h-4 p-0 m-0 font-mono text-sm leading-tight text-center text-white bg-red-600 rounded-full top right">5
                  </span>
                </a>
              </li>
              <!-- end CART -->
            </div>
            <!-- end of signup toggle -->
          </div>
        </div>
      </div>
    </div>

    <?php
    // FOR SIGN IN MODAL
    include 'sign_in_modal.php';

    // FOR SIGN UP MODAL
    include 'sign_up_modal.php';
    include 'logout.php';

    ?>
    <!-- FEATURE END -->