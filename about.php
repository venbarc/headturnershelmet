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

  <!-- about us  -->
  <!-- ====== Forms Section Start -->
  <div class="flex items-center justify-center min-h-screen bg-fixed bg-cover"
        style="background-image: url('header7.png');">
  <div class="absolute z-0 hidden h-40 transform rotate-45 bg-gray-300 w-36 rounded-xl -top-5 -left-16 md:block"></div>
  <div class="absolute hidden transform bg-gray-300 w-28 h-28 rounded-xl -bottom-6 -right-10 rotate-12 md:block"></div>
  <div class="justify-start max-w-screen-xl px-4 py-8 mx-auto">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-200 md:text-2xl lg:text-3xl">Welcome to
     </h1>
     <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-200 md:text-6xl lg:text-8xl">HeadTurners
    </h1>
     <h2 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-200 md:text-2xl lg:text-2xl"> eCommerce helmet store!</h2>
    <p class="mb-8 text-lg font-normal text-justify text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">We are a team of passionate helmet enthusiasts who are dedicated to providing our customers with high-quality helmets at competitive prices.</p>
    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Our goal is to make it easy for you to find the perfect helmet for your needs, whether you're a motorcycle rider, a cyclist, or someone who just wants to stay safe while enjoying outdoor activities. We have a wide variety of helmets available, including full-face helmets, open-face helmets, modular helmets, dirt bike helmets, and more.</p>
    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">We believe that safety should always come first, which is why we only sell helmets that meet safety standards such as DOT, ECE, or Snell. We also understand that comfort and style are important factors when choosing a helmet, so we offer a range of materials and designs to suit your preferences.</p>
    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">At our eCommerce store, we are committed to providing excellent customer service. If you have any questions or concerns, please don't hesitate to contact us. We are always happy to help and we strive to respond to all inquiries as quickly as possible.</p>

</div>
  <div class="absolute top-0 hidden bg-gray-300 rounded-full w-28 h-28 right-12 md:block"></div>
  <div class="absolute hidden transform bg-gray-300 w-28 h-28 rounded-xl -bottom-6 -left-10 rotate-6 md:block"></div>
</div>


  <!-- ====== Forms Section End -->

  <?php
        // navigation bar 
        include 'include/contact.php';
    // navigation bar 
    include 'include/footer.php';
    // footer link
    include "include/footer_link.php";
    ?>



</body>

</html>