<section class="navbar bg-gray-200 fixed z-30 lg:px-12">
  <div class="navbar bg-gray-200 lg:px-24">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li><a>Home</a></li>
          <li tabindex="0">
            <a class="justify-between">
              Shop
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
              </svg>
            </a>
            <ul class="p-2 border bg-gray-100">
              <li><a>Shoei</a></li>
              <li><a>Shark</a></li>
              <li><a>Arai</a></li>
              <li><a>AGV</a></li>
            </ul>
          </li>
          <li><a>About</a></li>
          <li><a>Contact</a></li>
        </ul>
      </div>
      <img class="hidden lg:flex h-20" src="assets/images/logo/Logo.png" alt="">
    </div>
    <div class="navbar-center hidden lg:flex z-60">
      <ul class="menu menu-horizontal px-1">
        <li><a href="index.php">Home</a></li>
        <li class="relative submenu-item group">
          <a href="shoei.php" class="relative mx-8 flex py-2 text-base text-dark after:absolute after:right-1 after:top-1/2 after:mt-[-2px] after:h-2 after:w-2 after:-translate-y-1/2 after:rotate-45 after:border-b-2 after:border-r-2 after:border-current group-hover:text-primary lg:mr-0 lg:ml-8 lg:inline-flex lg:py-6 lg:pl-0 lg:pr-4 lg:text-gray-800 lg:after:right-0 lg:group-hover:text-gray-800 lg:group-hover:opacity-70 xl:ml-12">
            Shop
          </a>
          <div class="submenu relative top-full left-0 hidden w-[250px] rounded-sm bg-white p-4 transition-[top] duration-300 group-hover:opacity-100 lg:invisible lg:absolute lg:top-[110%] lg:block lg:opacity-0 lg:shadow-lg lg:group-hover:visible lg:group-hover:top-full">
            <a href="about.html" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
              About Page
            </a>
            <a href="pricing.html" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
              Pricing Page
            </a>
            <a href="contact.html" class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
              Contact Page
            </a>
          </div>
        </li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a href="#" class="flex justify-center relative inline-block px-4 py-2 font-medium group">
        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
        <span class="relative text-black group-hover:text-white">Sign In</span>
      </a>
    </div>
  </div>
  <div class="flex-none">
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </label>
      <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body">
          <span class="font-bold text-lg">8 Items</span>
          <span class="text-info">Subtotal: $999</span>
          <div class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
        </div>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
        <li>
          <a class="justify-between">
            Profile
            <span class="badge">New</span>
          </a>
        </li>
        <li><a>Settings</a></li>
        <li><a>Logout</a></li>
      </ul>
    </div>
  </div>
</section>