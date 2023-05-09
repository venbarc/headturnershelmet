
<?php session_start()?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Check Out | HEADTURNERS</title>

    <?php
    
    include "connect.php";
    include "include/header_link.php";

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>


<body class="antialiased ">
    <section class="w-full h-full bg-gray-200 pt-14">
<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 pt-14">
  <div class="px-4 pt-8">
    <p class="text-3xl font-extrabold">Order Summary</p>
    <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
    <div class="px-2 py-4 mt-8 space-y-3 bg-white border rounded-lg sm:px-6">
      <div class="flex flex-col bg-white rounded-lg sm:flex-row">
        <img class="object-cover object-center h-24 m-2 border rounded-md w-28" src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
        <div class="flex flex-col w-full px-4 py-4">
          <span class="font-semibold">Shark RacerPro GP Martinator</span>
          <p class="float-right text-gray-400">Size : <span class="text-red-600">XS</span></p>

          <p class="text-lg font-bold">₱45,000</p>
        </div>
      </div>
      <div class="flex flex-col bg-white rounded-lg sm:flex-row">
        <img class="object-cover object-center h-24 m-2 border rounded-md w-28" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="" />
        <div class="flex flex-col w-full px-4 py-4">
          <span class="font-semibold">Nike Air Max Pro 8888 - Super Light</span>
          <p class="float-right text-gray-400">Size : <span class="text-red-600">XS</span></p>
          <p class="text-lg font-bold">₱45,000</p>
        </div>
      </div>
    </div>

    <p class="mt-8 text-lg font-medium">Payments Methods</p>
    <form class="grid gap-6 mt-5">
      <div class="relative">
        <input class="hidden peer" id="radio_1" type="radio" name="radio" checked />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50" for="radio_1">
          <img class="object-contain w-14" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">J&T Delivery</span>
            <p class="text-sm leading-6 text-slate-500">Delivery: 2-4 Days</p>
          </div>
        </label>
      </div>
      <div class="relative">
        <input class="hidden peer" id="radio_2" type="radio" name="radio" checked />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50" for="radio_2">
          <img class="object-contain w-14" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">Cash On Delivery</span>
            <p class="text-sm leading-6 text-slate-500">Delivery: 2-4 Days</p>
          </div>
        </label>
      </div>
      <div class="relative">
        <input class="hidden peer" id="radio_3" type="radio" name="radio" checked />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50" for="radio_3">
          <img class="object-contain w-14" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">E-wallet</span>
            <p class="text-sm leading-6 text-slate-500">GCASH ,MAYA ,7-eleven CLiQQ</p>
          </div>
        </label>
      </div>
    </form>
  </div>
  <div class="px-4 pt-8 mt-10 bg-gray-50 lg:mt-0">
    <p class="text-3xl font-extrabold">Payment Details</p>
    <p class="text-gray-400">Complete your order by providing your payment details.</p>
    <div class="">
      <label for="email" class="block mt-4 mb-2 text-sm font-medium">Email</label>
      <div class="relative">
        <input type="text" id="email" name="email" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
        <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
          </svg>
        </div>
      </div>
      <label for="card-holder" class="block mt-4 mb-2 text-sm font-medium">Card Holder</label>
      <div class="relative">
        <input type="text" id="card-holder" name="card-holder" class="w-full px-4 py-3 text-sm uppercase border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your full name here" />
        <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
          </svg>
        </div>
      </div>
      <label for="card-no" class="block mt-4 mb-2 text-sm font-medium">Card Details</label>
      <div class="flex">
        <div class="relative flex-shrink-0 w-7/12">
          <input type="text" id="card-no" name="card-no" class="w-full px-2 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
          <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
              <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
            </svg>
          </div>
        </div>
        <input type="text" name="credit-expiry" class="w-full px-2 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
        <input type="text" name="credit-cvc" class="flex-shrink-0 w-1/6 px-2 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
      </div>
      <label for="billing-address" class="block mt-4 mb-2 text-sm font-medium">Billing Address</label>
      <div class="flex flex-col sm:flex-row">
        <div class="relative flex-shrink-0 sm:w-7/12">
          <input type="text" id="billing-address" name="billing-address" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
          <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
            <img class="object-contain w-4 h-4" src="https://flagpack.xyz/_nuxt/4c829b6c0131de7162790d2f897a90fd.svg" alt="" />
          </div>
        </div>
        <select type="text" name="billing-state" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
          <option value="State">State</option>
        </select>
        <input type="text" name="billing-zip" class="flex-shrink-0 px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
      </div>

      <!-- Total -->
      <div class="py-2 mt-6 border-t border-b">
        <div class="flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Subtotal</p>
          <p class="font-semibold text-gray-900">$399.00</p>
        </div>
        <div class="flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Shipping</p>
          <p class="font-semibold text-gray-900">$8.00</p>
        </div>
      </div>
      <div class="flex items-center justify-between mt-6">
        <p class="text-sm font-medium text-gray-900">Total</p>
        <p class="text-2xl font-semibold text-gray-900">$408.00</p>
      </div>
    </div>
    <a href="shoei.php" class="flex justify-center relative inline-block px-4 py-2 font-medium group">
<span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
<span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
<span class="relative text-black group-hover:text-white">Place Order</span>
</a>

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
    include 'include/footer.php';
    // footer link
    include "include/footer_link.php";
    ?>
</section>


</body>

</html>
