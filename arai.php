<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arai | HEADTURNERS</title>

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

            <nav id="arai" class="top-0 z-30 w-full px-6 py-1">
                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">

                    <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline "
                        href="#">
                        ARAI HELMETS
                    </a>
                </div>
            </nav>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/YcBrym7/product1-astro.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI ASTRO GX</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱36,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/3cfpzSG/product2-classic.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI CLASSIC AIR</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱27,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/BTwgr47/product3-naps.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI NAPS</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱26,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/3cnvhG2/product4-neo-black.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RAPIDE NEO BLACK</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱23,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/Dk9C8hv/product5-neo-orange.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RAPIDE NEO ORANGE</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱23,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/SP1mYkQ/product6-rx7x.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">Arai Helmet Rx-7v Evo</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱ 53,000</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/7CqhCT5/product7-firm-racing.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RX7X FIRM RACING</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱53,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/89hWC96/product8-repsol.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RX7X REPSOL GRAPHICS</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱70,732.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/HH1MVH8/product9-src.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RX7X SRC</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱55,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/D7HqM3Z/product10-tatsuki.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RX7X TATSUKI SUZUKI</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱38,500.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/k13L355/product11-tour.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RX7X TOUR</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱37,000.00</p>
                </a>
            </div>

            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                <a href="#">
                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                        src="https://i.ibb.co/9rKH51r/product12-IOM.png">
                    <div class="flex items-center justify-between pt-3">
                        <p class="">ARAI RX7X IOM TT 2022</p>
                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                        </svg>
                    </div>
                    <p class="pt-1 text-red-800">₱39,500.00</p>
                </a>
            </div>


        </div>

    </section>

    <section class="py-8 bg-gray-300">

        <div class="container px-6 py-8 mx-auto">

            <a class="mb-8 text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline"
                href="#">
                About ARAI HELMET'S
            </a>

            <p class="mt-8 mb-8">Superior quality, safety, and comfort
                <br>


            <p>Arai helmets are designed with safety as the top priority. The helmets go through rigorous
                testing and quality control measures to ensure that they provide maximum protection to the rider in the
                event of an accident. Arai also focuses on comfort and fit, as a helmet that doesn't fit properly can be
                uncomfortable and even dangerous.
                One unique aspect of Arai helmets is their handmade construction. Each helmet is crafted by skilled
                artisans, who work to create a helmet that is not only safe and comfortable but also aesthetically
                pleasing. The handmade process allows for more customization and attention to detail than mass-produced
                helmets.</p>

        </div>

    </section>



    <!-- REVIEWS -->

    <section class="container px-6 mx-auto">
        <div class="flex items-center  justify-center px-4 py-12 md:px-6 2xl:px-0 2xl:container 2xl:mx-auto">
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
                                ARAI RX7X TOUR</p>
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
                            <svg aria-hidden="true" class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
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
                                <p class="text-sm leading-none text-gray-600 ">23 Nov 2022</p>
                            </div>
                        </div>
                        <p class="w-full mt-3 text-base leading-normal text-gray-600  md:w-12/12 xl:w-6/6">
                            Sobrang Ganda ! and ang bait ng seller !
                        </p>
                        <!-- PRODUCT -->
                        <div class="flex-row items-start justify-start hidden mt-6 space-x-4 md:flex">
                            <!-- PRODUCT 1 -->
                            <div>
                                <a target="_blank"
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/233608284_235633241750775_4560895329908988277_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHL5PcfgUxZxfT6VnT3nB8y0j4Rz3C4hxvSPhHPcLiHG73l753EcFxwFiUosIha5sbaHkhgOf56YN3fMH9ZEbKC&_nc_ohc=Uydz8U7c5K0AX9-uP-B&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfD1OKG7uuZx5WnKxF4XGUK0LEQBqgXkfoRV6FCTgdMkGQ&oe=6460E1B1">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/233608284_235633241750775_4560895329908988277_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHL5PcfgUxZxfT6VnT3nB8y0j4Rz3C4hxvSPhHPcLiHG73l753EcFxwFiUosIha5sbaHkhgOf56YN3fMH9ZEbKC&_nc_ohc=Uydz8U7c5K0AX9-uP-B&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfD1OKG7uuZx5WnKxF4XGUK0LEQBqgXkfoRV6FCTgdMkGQ&oe=6460E1B1"
                                        alt="product1" />
                                </a>
                            </div>
                            <!-- PRODUCT 3 -->
                            <div class="hidden md:block">
                                <a
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/233754701_235628451751254_2600718328102378732_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHQz1pNlnrcab8UgyW8scRwgEEsSNPZF2qAQSxI09kXat-Ufpz8Eo3B_RKzlt41sBU_vSgUqokHF2MXONd8iCdh&_nc_ohc=kVDUg5DLp9IAX9MASCO&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAAWV_UJf1rNzPiu7OrE1r_wVwO5JJQUG-2NkPQAA9ylw&oe=6460F52E">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/233754701_235628451751254_2600718328102378732_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeHQz1pNlnrcab8UgyW8scRwgEEsSNPZF2qAQSxI09kXat-Ufpz8Eo3B_RKzlt41sBU_vSgUqokHF2MXONd8iCdh&_nc_ohc=kVDUg5DLp9IAX9MASCO&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAAWV_UJf1rNzPiu7OrE1r_wVwO5JJQUG-2NkPQAA9ylw&oe=6460F52E"
                                        alt="product3" />
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
                                ARAI RX7X TATSUKI SUZUKI</p>
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
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/344762768_796128941718205_7036592729847028179_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5cd70e&_nc_eui2=AeH-DXGZyKiOfgCMeCn7z_Y2q7FsZi_yLVyrsWxmL_ItXOB3i6wDPkJmhg1XOpKSVh7OxoyRqOxb2h2e6Q7UvECu&_nc_ohc=7AT_McvyIOQAX85iEsU&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAUGcPjxDPWJror_dNPAor_mgBz_dU2fyKu3YQnVvX0gA&oe=646052F0">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/344762768_796128941718205_7036592729847028179_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5cd70e&_nc_eui2=AeH-DXGZyKiOfgCMeCn7z_Y2q7FsZi_yLVyrsWxmL_ItXOB3i6wDPkJmhg1XOpKSVh7OxoyRqOxb2h2e6Q7UvECu&_nc_ohc=7AT_McvyIOQAX85iEsU&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAUGcPjxDPWJror_dNPAor_mgBz_dU2fyKu3YQnVvX0gA&oe=646052F0"
                                        alt="product1" />
                                </a>
                            </div>

                            <!-- PRODUCT 2 -->
                            <div>
                                <a
                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/344738815_1911317272564796_2805692050121740679_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5cd70e&_nc_eui2=AeHrdAaKOmOGBcqFmtTqqTv3NfmTH-7Xa-E1-ZMf7tdr4QK1RwZHVXXT2OP1IRCc1f3LhlqGJ9i9G7318bZ0MLh_&_nc_ohc=kwhEUyVNP7cAX9WISZp&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAxogle8pCWsJa61N7aboAkoHnutVHy7BEZDBaIIM11xA&oe=6461B095">
                                    <img class="h-32"
                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t39.30808-6/344738815_1911317272564796_2805692050121740679_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5cd70e&_nc_eui2=AeHrdAaKOmOGBcqFmtTqqTv3NfmTH-7Xa-E1-ZMf7tdr4QK1RwZHVXXT2OP1IRCc1f3LhlqGJ9i9G7318bZ0MLh_&_nc_ohc=kwhEUyVNP7cAX9WISZp&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAxogle8pCWsJa61N7aboAkoHnutVHy7BEZDBaIIM11xA&oe=6461B095"
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