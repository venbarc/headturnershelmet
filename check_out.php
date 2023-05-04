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
          <span class="float-right text-gray-400">42EU - 8.5US</span>
          <p class="mt-auto text-lg font-bold">$238.99</p>
        </div>
      </div>
    </div>

    <p class="mt-8 text-lg font-medium">Payments Methods</p>
    <form class="grid gap-6 mt-5">

      <div class="relative"><!-- END J & T -->
        <input class="hidden peer" id="radio_1" type="radio" name="radio" checked />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50" for="radio_1">
          <img class="object-contain w-14" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">J&T Delivery</span>
            <p class="text-sm leading-6 text-slate-500">Delivery: 2-4 Days</p>
          </div>
        </label>
      </div>  <!-- END J & T -->

      <div class="relative">  <!-- CASH ON Delivery -->
        <input class="hidden peer" id="radio_2" type="radio" name="radio" checked />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50" for="radio_2">
          <img class="object-contain w-14" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">Cash On Delivery</span>
            <p class="text-sm leading-6 text-slate-500">Delivery: 2-4 Days</p>
          </div>
        </label>
      </div>       <!--END CASH ON Delivery -->

      <div class="relative"> <!-- START ONLINE PAYMENT -->
        <input class="hidden peer" id="radio_2" type="radio" name="radio" checked />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full peer-checked:border-gray-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50" for="radio_2">
          <img class="object-contain w-14" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">E- wallet</span>
            <p class="text-sm leading-6 text-slate-500">Gcash ,7-eleven CLiQQ, Maya ,etc.</p>
          </div>
        </label>
      </div><!--END ONLINE PAYMENT -->
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
        <label for="billing-address" class="block mt-4 mb-2 text-sm">Region ,Province,City,Barangay</label>
          <input type="text" id="billing-address" name="billing-address" class="w-full px-4 py-3 text-sm border border-gray-200 rounded-md shadow-sm outline-none pl-11 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Region ,Province,City,Barangay" />
          <div class="absolute inset-y-0 left-0 inline-flex items-center px-3 pointer-events-none">
            <img class="object-contain w-4 h-4" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Flag_of_the_Philippines.svg" alt="" />
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
    <button class="w-full px-6 py-3 mt-4 mb-8 font-medium text-white bg-gray-900 rounded-md">Place Order</button>
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
