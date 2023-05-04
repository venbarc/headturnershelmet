<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | HEADTURNER'S</title>

  <?php
  session_start();
  // include "connect.php";
  include "include/header_link.php";

  // navigation bar 
  include 'include/navbar.php';
  ?>

</head>


<body class="antialiased ">

  <section class="h-full py-12 bg-gray-300 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8">
      <div class="flex items-center justify-center">
        <h1 class="text-4xl font-semibold text-gray-900">Your Cart</h1>
      </div>

      <div class="max-w-2xl mx-auto mt-8 md:mt-12">
        <div class="bg-gray-100 shadow">
          <div class="px-4 py-6 sm:px-8 sm:py-10">
            <div class="flow-root">
              <ul class="-my-8">
                <li class="flex flex-col py-6 space-y-3 text-left sm:flex-row sm:space-x-5 sm:space-y-0">
                  <div class="shrink-0">

                      <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <img class="object-cover w-24 h-24 max-w-full rounded-lg" src="https://i.ibb.co/KbQcdfR/product2-cheeta.png" alt="" />
                  </div>
                  <div class="relative flex flex-col justify-between flex-1">
                    <div class="sm:col-gap-5 sm:grid sm:grid-cols-2">
                      <div class="pr-8 sm:pr-5">
                        <p class="text-base font-semibold text-gray-900">Shark RacerPro GP Martinator</p>
                        <p class="mx-0 mt-1 mb-0 text-sm text-gray-400">Size:
                          <span class="text-red-600">XS</span>
                        </p><!-- FOR SIZES -->

                      </div>

                      <div class="flex items-end justify-between mt-4 sm:mt-0 sm:items-start sm:justify-end">
                        <p class="w-20 text-base font-semibold text-gray-900 shrink-0 sm:order-2 sm:ml-8 sm:text-right">₱45,000</p>

                        <div class="sm:order-1">
                          <div class="flex items-stretch h-8 mx-auto text-gray-600">
                            <button class="flex items-center justify-center px-4 transition bg-gray-200 rounded-l-md hover:bg-black hover:text-white">-</button>
                            <div class="flex items-center justify-center w-full px-4 text-xs uppercase transition bg-gray-100">1</div>
                            <button class="flex items-center justify-center px-4 transition bg-gray-200 rounded-r-md hover:bg-black hover:text-white">+</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="flex flex-col py-6 space-y-3 text-left sm:flex-row sm:space-x-5 sm:space-y-0">
                  <div class="shrink-0">
                  <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <img class="object-cover w-24 h-24 max-w-full rounded-lg" src="https://i.ibb.co/Zf240Jj/shark-racerpro-gp-martinator.png" alt="" />
                  </div>

                  <div class="relative flex flex-col justify-between flex-1">
                    <div class="sm:col-gap-5 sm:grid sm:grid-cols-2">
                      <div class="pr-8 sm:pr-5">
                        <p class="text-base font-semibold text-gray-900">SHOEI GLAMSTER CHEETAH</p>
                        <p class="mx-0 mt-1 mb-0 text-sm text-gray-400">Size: <span class="text-red-600">L</span></p>
                      </div>

                      <div class="flex items-end justify-between mt-4 sm:mt-0 sm:items-start sm:justify-end">
                        <p class="w-20 text-base font-semibold text-gray-900 shrink-0 sm:order-2 sm:ml-8 sm:text-right">₱45,000</p>

                        <div class="sm:order-1">
                          <div class="flex items-stretch h-8 mx-auto text-gray-600">
                            <button class="flex items-center justify-center px-4 transition bg-gray-200 rounded-l-md hover:bg-black hover:text-white">-</button>
                            <div class="flex items-center justify-center w-full px-4 text-xs uppercase transition bg-gray-100">1</div>
                            <button class="flex items-center justify-center px-4 transition bg-gray-200 rounded-r-md hover:bg-black hover:text-white">+</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="py-2 mt-6 border-t border-b">
              <div class="flex items-center justify-between">
                <p class="text-sm text-gray-400">Subtotal</p>
                <p class="text-lg font-semibold text-gray-900">$399.00</p>
              </div>
              <div class="flex items-center justify-between">
                <p class="text-sm text-gray-400">Shipping</p>
                <p class="text-lg font-semibold text-gray-900">$8.00</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-6">
              <p class="text-sm font-medium text-gray-900">Total</p>
              <p class="text-2xl font-semibold text-gray-900"><span class="text-xs font-normal text-gray-400">USD</span> 408.00</p>
            </div>

            <div class="mt-6 text-center">
              <a href="check_out.php" class="inline-flex items-center justify-center w-full px-6 py-4 text-lg font-semibold text-white transition-all duration-200 ease-in-out bg-gray-900 rounded-md group focus:shadow hover:bg-gray-800">
                Checkout
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-4 transition-all group-hover:ml-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <?php
    // navigation bar 
    include 'include/contact.php';
    // navigation bar 
    include 'include/footer.php';
    // footer link
    include "include/footer_link.php";
    ?>

  </section>

</body>

</html>