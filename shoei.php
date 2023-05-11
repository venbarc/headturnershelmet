<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SHOEI HELMETS | HEADTURNERS</title>

    <?php
    include "connect.php";
    include "include/header_link.php";

    // navigation bar 
    include 'include/navbar.php';
    ?>

</head>


<body class="antialiased ">

    <section class="py-32 bg-gray-300">

        <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">

            <!-- HEADING -->
            <nav id="sgoei" class="top-0 z-30 w-full px-6 py-1">
                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">

                    <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline "
                        href="#">
                        SHOEI PREMIUM HELMETS
                    </a>
                </div>
            </nav>

            <div class="flex flex-col w-full p-6 mb-10 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#" id="readProductButton" data-modal-toggle="readProductModal">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/SNPJHS8/product1-exzero.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">SHOEI Ex zero</p>
                </a>
                <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512">
                    <path
                        d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                </svg>
            </div>
            <p class="pt-1 text-red-800">₱26,741</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/KbQcdfR/product2-cheeta.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI GLAMSTER CHEETAH
            </a> CUSTOM CYCLE</p>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱32,807</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/12CPbjG/product3-offwhite.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI GLAMSTER OFFWHITE 1</p>
            </a>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱26,741</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/ZxBzY3c/product4-ressur.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI GLAMSTER RESURRE
            </a>CTION TC10 1</p>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱23,000</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/xXZwK5v/Glamster-Ressurection-TC.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI Glamster-Ressurection</p>
            </a>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱23,000</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/ZdZYj8w/product6-neotec.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI NEOTEC 2 1</p>
            </a>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱39,000</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/sy7Q1wG/product7-fifteen.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI X FIFTEEN 1</p>
            </a>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱48,973</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/t3cBM64/product8-fourteen.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI X FOURTEEN MM93< </a>/p>
                            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path
                                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                            </svg>
                </div>
                <p class="pt-1 text-red-800">₱47,972</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/6P51mgJ/product9-aerody.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI X-SPIRIT III AER
            </a>ODYNE TC-4</p>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱9.99</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/wwzHc29/product10-Z-8-ACCOLADE-NXR2-ACCOLADE.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI X14 ACCOLADE NXR
            </a>2 ACCOLADE</p>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱9.99</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/0JTByQz/product11-Z-8-ORIGAMI-NXR2-ORIGAMI.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI z8 ORIGAMI NXR2
            </a>ORIGAMI</p>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱9.99</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">
                <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                    src="https://i.ibb.co/dcfMmcK/product12-Z-8-FAUST-NXR2-FAUST.png">
                <div class="flex items-center justify-between pt-3">
                    <p class="">SHOEI z8 FAUST NXR2 FA
            </a>UST</p>
            <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
            </svg>
        </div>
        <p class="pt-1 text-red-800">₱9.99</p>
        </div>

        <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
            <a href="#">

            </a> <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                src="https://i.ibb.co/5Rpsszm/product13-Z-8-MM93-RETRO-NXR2-MM93-RETRO.png">
            <div class="flex items-center justify-between pt-3">
                <p class="">SHOEI z8 MM93 RETRO NXR2 MM93 RETRO</p>

                <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512">
                    <path
                        d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                </svg>
            </div>
            <p class="pt-1 text-red-800">₱41,500</p>

        </div>

        </div>

    </section>

    <section class="py-8 bg-gray-300">

        <div class="container px-6 py-8 mx-auto">

            <a class="mb-8 text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline"
                href="#">
                About Shoei Helmets
            </a>

            <p class="mt-8 mb-8">THE WORLD’S PREMIER HELMET MANUFACTURER
                <br>
            <p>The name SHOEI has long been synonymous with “premium” in the motorcycle helmet market-a credential that
                hundreds of loyal men and women in our Japan factories wear with great pride. The evolution and
                production of our world-class helmet line is a meticulous process that combines the very latest in
                technology with consumer feedback, modern testing practices, advanced materials, and 60 years of helmet
                building experience. Just like the very first SHOEI helmet built by our founder back in 1959, every
                SHOEI today is still handmade in Japan utilizing a sophisticated process that involves over 50 people
                for each and every helmet.</p>

        </div>

    </section>

    <!-- REVIEWS -->

    <section class="container px-6 mx-auto">
        <div class="flex items-center justify-center px-4 py-12 md:px-6 2xl:px-0 2xl:container 2xl:mx-auto">
            <div class="flex flex-col items-start justify-start w-full space-y-8">
                <!-- REVIEW HEADER -->
                <div class="flex items-start justify-start">
                    <p class="text-3xl font-bold leading-7 text-gray-800 lg:text-4xl lg:leading-9  ">
                        Customer Reviews</p>
                </div>

                <div class="flex flex-col items-start justify-start w-full p-8 bg-gray-100 dark:bg-gray-800">
                    <div class="flex flex-col justify-between w-full md:flex-row">
                        <!-- PRODUCT NAME TO REVIEW -->
                        <div class="flex flex-row items-start justify-between">
                            <p class="text-xl font-bold leading-normal text-gray-800 md:text-2xl ">
                                SHOEI GLAMSTER OFFWHITE 1</p>
                        </div>
                        <!-- Star ratings -->
                        <div class="flex items-center  text-yellow-300">
                            <!--STAR 1  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 2  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 3  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 4  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 5  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="gray" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>

                        </div>
                        <!--end Star ratings -->
                    </div>

                    <div id="menu" class="md:block">
                        <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                            <div>
                                <img src="https://i.ibb.co/QcqyrVG/Mask-Group.png" alt="girl-avatar" />
                            </div>
                            <div class="flex flex-col items-start justify-start space-y-2">
                                <p class="text-base font-medium leading-none text-gray-800 ">Jake David
                                </p>
                                <p class="text-sm leading-none text-gray-600 ">03 April 2023</p>
                            </div>
                        </div>
                        <p class="w-full mt-3 text-base leading-normal text-gray-600  md:w-12/12 xl:w-6/6">
                            Good quality and sulit binayad !
                        </p>
                        <!-- PRODUCT -->
                        <div class="flex-row items-start justify-start hidden mt-6 space-x-4 md:flex">
                            <!-- PRODUCT 1 -->
                            <div>
                                <a target="_blank"
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/335290831_897317101513274_6203625818937751612_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH7Bdebra-xhcQDJ4w75kEm6GIRj8VAT2roYhGPxUBPav3LKqSBt7ndfgnPs08kFO3RLwDxAM-KN3SaJD1Y796Y&_nc_ohc=vuaFhNNqonYAX-M3fYn&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfA53HRBcKxhwWUmtABkf59qEhvM8Vy3XpATyDDappG7dA&oe=646003D4">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/335290831_897317101513274_6203625818937751612_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH7Bdebra-xhcQDJ4w75kEm6GIRj8VAT2roYhGPxUBPav3LKqSBt7ndfgnPs08kFO3RLwDxAM-KN3SaJD1Y796Y&_nc_ohc=vuaFhNNqonYAX-M3fYn&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfA53HRBcKxhwWUmtABkf59qEhvM8Vy3XpATyDDappG7dA&oe=646003D4"
                                        alt="product1" />
                                </a>
                            </div>
                        </div>
                        <!-- end of product -->
                    </div>

                    <!-- REVIEW PRODUCT 2 -->
                    <div class="flex flex-col justify-between w-full md:flex-row mt-6">
                        <!-- PRODUCT NAME TO REVIEW -->
                        <div class="flex flex-row items-start justify-between">
                            <p class="text-xl font-bold leading-normal text-gray-800 md:text-2xl ">
                                SHOEI Ex zero</p>
                        </div>
                        <!-- Star ratings -->
                        <div class="flex items-center  text-yellow-300">
                            <!--STAR 1  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 2  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 3  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 4  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <!--STAR 5  -->
                            <svg aria-hidden="true" class="w-7 h-7" fill="gray" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>

                        </div>
                        <!--end Star ratings -->
                    </div>

                    <div id="menu" class="md:block">
                        <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                            <div>
                                <img class="h-14 w-14 rounded-full"
                                    src="https://static01.nyt.com/images/2021/10/13/science/13shatner-launch-oldest-person-sub/13shatner-launch-oldest-person-sub-superJumbo.jpg?quality=75&auto=webp"
                                    alt="boy-avatar" />
                            </div>
                            <div class="flex flex-col items-start justify-start space-y-2">
                                <p class="text-base font-medium leading-none text-gray-800 ">William Shatner
                                </p>
                                <p class="text-sm leading-none text-gray-600 ">14 July 2021</p>
                            </div>
                        </div>
                        <p class="w-full mt-3 text-base leading-normal text-gray-600  md:w-12/12 xl:w-6/6">
                            high-quality and good Customer service
                        </p>
                        <!-- PRODUCT -->
                        <div class="flex-row items-start justify-start hidden mt-6 space-x-4 md:flex">
                            <!-- PRODUCT 1 -->
                            <div>
                                <a target="_blank"
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/331501070_711263287304673_8220231681485262221_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeE1lrE5bh_AGuVJxrC8cyT0pzjzeI_T4JynOPN4j9PgnOG3hBJcvMXjx2VgvLy1xuTh2KqdvnrvKVrEG8pcbBTI&_nc_ohc=zAn0-j2PfMkAX9w6pwH&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfC0UNhGfoPaMUJhJqWvisXRiHyhNxvW8UkxTwT-bhmIQw&oe=6461356F">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/331501070_711263287304673_8220231681485262221_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeE1lrE5bh_AGuVJxrC8cyT0pzjzeI_T4JynOPN4j9PgnOG3hBJcvMXjx2VgvLy1xuTh2KqdvnrvKVrEG8pcbBTI&_nc_ohc=zAn0-j2PfMkAX9w6pwH&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfC0UNhGfoPaMUJhJqWvisXRiHyhNxvW8UkxTwT-bhmIQw&oe=6461356F"
                                        alt="product1" />
                                </a>
                            </div>

                            <!-- PRODUCT 2 -->
                            <div>
                                <a
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/331513867_6698074936875571_1235317802167273110_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHS5qcGo_d_Cmo4mAJwzjbGwweRy5CcbzXDB5HLkJxvNY5CSN0TxOqvON7MpH7wb3kqam4w8YXtn0RSPL8AAIc9&_nc_ohc=2wCImofrttYAX-bOBfe&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfBIxX3k3JJcunMcTOmhLTfunapapOzswqz_iYEZ3q5SxA&oe=646116B2">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/331513867_6698074936875571_1235317802167273110_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHS5qcGo_d_Cmo4mAJwzjbGwweRy5CcbzXDB5HLkJxvNY5CSN0TxOqvON7MpH7wb3kqam4w8YXtn0RSPL8AAIc9&_nc_ohc=2wCImofrttYAX-bOBfe&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfBIxX3k3JJcunMcTOmhLTfunapapOzswqz_iYEZ3q5SxA&oe=646116B2"
                                        alt="product2" />
                                </a>
                            </div>
                        </div>
                        <!-- end of product -->
                    </div>
                </div>


            </div>
        </div>

    </section>



    <?php
    // navigation bar 
    include 'contact.php';
    // navigation bar 
    include 'include/footer.php';
    // footer link
    include "include/footer_link.php";
    ?>



</body>

</html>