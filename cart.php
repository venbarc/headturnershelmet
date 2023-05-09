<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | HEADTURNER'S</title>

  <?php
  session_start();
  include "connect.php";
  include "include/header_link.php";

  // navigation bar 
  include 'include/navbar.php';
  ?>

</head>


<body class="antialiased ">

  <section class="h-full py-12 bg-gray-300 sm:py-16 lg:py-44">
    <div class="px-4 mx-auto sm:px-6 lg:px-8">
      <div class="flex items-center justify-center">
        <h1 class="text-4xl font-bold text-gray-900">Your Cart</h1>
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
                <p class="text-lg font-semibold text-gray-900">₱399.00</p>
              </div>
              <div class="flex items-center justify-between">
                <p class="text-sm text-gray-400">Shipping</p>
                <p class="text-lg font-semibold text-gray-900">₱8.00</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-6">
              <p class="text-sm font-medium text-gray-900">Total</p>
              <p class="text-2xl font-semibold text-gray-900"><span class="text-xs font-normal text-gray-400">PHP</span> 408.00</p>
            </div>

            <div class="mt-6 text-end">
            <a href="check_out.php" class="relative inline-block px-4 py-2 font-medium group">
<span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
<span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
<span class="relative text-black group-hover:text-white">Check out</span>
</a>
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
                                        <path d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                                        <path d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
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
                                        <path d="M30.5156 0.960938H3.17188C1.42188 0.960938 0 2.38281 0 4.13281V20.9219C0 22.6719 1.42188 24.0938 3.17188 24.0938H30.5156C32.2656 24.0938 33.6875 22.6719 33.6875 20.9219V4.13281C33.6875 2.38281 32.2656 0.960938 30.5156 0.960938ZM30.5156 2.875C30.7891 2.875 31.0078 2.92969 31.2266 3.09375L17.6094 11.3516C17.1172 11.625 16.5703 11.625 16.0781 11.3516L2.46094 3.09375C2.67969 2.98438 2.89844 2.875 3.17188 2.875H30.5156ZM30.5156 22.125H3.17188C2.51562 22.125 1.91406 21.5781 1.91406 20.8672V5.00781L15.0391 12.9922C15.5859 13.3203 16.1875 13.4844 16.7891 13.4844C17.3906 13.4844 17.9922 13.3203 18.5391 12.9922L31.6641 5.00781V20.8672C31.7734 21.5781 31.1719 22.125 30.5156 22.125Z" />
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
                    <div class="wow fadeInUp rounded-lg bg-gray-100 py-10 px-8 sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]" data-wow-delay=".2s
                                                  ">
                        <h3 class="mb-8 text-2xl font-semibold md:text-[26px]">
                            Send us a Message
                        </h3>
                        <form>
                            <div class="mb-6">
                                <label for="fullName" class="block text-xs text-gray-950">Full Name*</label>
                                <input type="text" name="fullName" placeholder="Jane Doe" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
                            </div>
                            <div class="mb-6">
                                <label for="email" class="block text-xs text-gray-950">Email*</label>
                                <input type="email" name="email" placeholder="example@yourmail.com" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block text-xs text-gray-950">Phone*</label>
                                <input type="text" name="phone" placeholder="+63912345678" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
                            </div>
                            <div class="mb-6">
                                <label for="message" class="block text-xs text-gray-950">Message*</label>
                                <textarea name="message" rows="1" placeholder="  type your message here" class="w-full resize-none border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"></textarea>
                            </div>
                            <div class="mb-0">
                                <button type="submit" class="relative inline-block px-4 py-2 font-medium group">
                                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
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