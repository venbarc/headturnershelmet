        
<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | HEADTURNER'S</title>

    <?php
        include "connect.php";
        include "include/header_link.php";

        // navigation bar 
        include 'include/navbar.php';

        // Check if user is signed in
        if(isset($_SESSION['user_id']))
        {
            $user_id = $_SESSION['user_id'];
            // get user statement data 
            $stmt_get_user = $conn->prepare("select * from users where id = ? ");
            $stmt_get_user->bind_param('i', $user_id);
            $stmt_get_user->execute();   
            $res_get_user = $stmt_get_user->get_result();
            
            // fetch users data
            $user = $res_get_user->fetch_assoc();

            $email = $user['email'];
            $fname = $user['fname']; 
            $lname = $user['lname']; 
            $contact = $user['contact']; 
            $address = $user['address']; 
            $image = $user['image']; 
            $date_reg = $user['date_reg'];
            
            // formatted date 
            $formattedDate = (new DateTime($user['date_reg']))->format('F j, Y');
        }
    ?>

</head>

<body class="antialiased ">
    <!-- ======  hero Start -->
    <section id="hero" class="bg-gray-950 pt-32 pb-20 lg:pt-[220px] lg:pb-[120px] bg-fixed bg-cover" style="background-image: url('header7.png');">
        <div class="container">
            <div class="wow fadeInUp" data-wow-delay=".2s">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full px-4">
                        <div class="items-center justify-between overflow-hidden lg:flex">
                            <div class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">
                                <h1 class="my-3 text-sm font-bold leading-tight text-center text-gray-300 opacity-75 md:text-xl md:text-left ">
                                    Discover style and safety at
                                    <span class="text-3xl font-extrabold text-transparent max-[320px]:text-3xl lg:text-6xl xl:text-8xl 2xl:text-9xl  md:text-6xl bg-clip-text bg-gradient-to-r from-white via-gray-500 to-gray-300 max-[760px]:text-5xl">
                                        HEADTURNERS
                                    </span>
                                </h1>

                                <p class="mb-8 text-sm leading-normal text-center text-gray-300 opacity-75 md:text-lg md:text-left">
                                    We offer premium, original motorcycle helmets from Japan with a
                                    focus on quality and safety. Trust us for the best products and
                                    customer service.
                                </p>
                                <!--SOCIAL MEDIA   -->
                                <div class="flex justify-center mt-4 space-x-6 text-center lg:justify-start md:justify-start sm:mt-0">
                                    <a href="https://www.facebook.com/HeadTurnerMCgears" target="_blank" class="text-gray-200 hover:text-black ">
                                        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Facebook page</span>
                                    </a>
                                    <a href="https://www.instagram.com/headturnerpremiumhelmets/" target="_blank" class="text-gray-200 hover:text-red-500 ">
                                        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Instagram page</span>
                                    </a>
                                    <a href="#" class="text-gray-200 hover:text-blue-600 ">
                                        <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24" aria-hidden="true">
                                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                        <span class="sr-only">Twitter page</span>
                                    </a>

                                </div>
                                <div class="flex justify-center mt-4 space-x-6 text-center lg:justify-start md:justify-start">
                                    <a href="shoei.php" class="relative inline-block px-4 py-2 font-medium group">
                                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                        <span class="relative text-black group-hover:text-white">Shop Now</span>
                                    </a>

                                </div>
                            </div>

                            <div class="text-center">
                                <div class="relative z-10 inline-block">
                                    <div class="w-full p-12 overflow-hidden pl-14">

                                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                            <!-- Carousel wrapper -->
                                            <div class="relative overflow-hidden rounded-lg h-50 w-50 md:h-96 md:w-96">
                                                <!-- Item 1 -->
                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                    <img src="https://i.ibb.co/ZdZYj8w/product6-neotec.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                </div>
                                                <!-- Item 2 -->
                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                    <img src="https://i.ibb.co/Zf240Jj/shark-racerpro-gp-martinator.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                </div>
                                                <!-- Item 3 -->
                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                    <img src="https://i.ibb.co/3cfpzSG/product2-classic.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                </div>
                                                <!-- Item 4 -->
                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                    <img src="https://i.ibb.co/KbQcdfR/product2-cheeta.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                </div>
                                                <!-- Item 5 -->
                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                    <img src="https://i.ibb.co/wKkbqxT/shark-spartan-gt-carbon-full-face-helmet.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
    </section>

    <?php
        include 'include/Feature.php';
        include 'include/sample_product.php';
        include "about.php";
    ?>

    <!-- ====== Faq Section Start -->
    <section  id="navbarToggler" class="relative z-20 overflow-hidden bg-gray-300 pt-20 pb-12  lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                    <span class="inline-block px-5 py-2 mb-5 text-sm font-medium text-white">
                                    <p href="#_" class="relative inline-block px-4 py-2 font-medium group">
                                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                        <span class="relative text-black group-hover:text-white">FAQ</span>
                                    </p>
                                </span>
                        <h2 class="text-4xl font-extrabold leading-none tracking-tight md:text-5xl text-gray-950">
                            Any Questions? Answered
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            There are many variations of passages of Lorem Ipsum available
                            but the majority have suffered alteration in some form.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 lg:w-1/2">
                    <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE] p-5 sm:p-8 bg-gray-200" data-wow-delay=".1s
                                                  ">
                        <button class="flex items-center w-full text-left faq-btn ">
                            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-gray-200">
                                <svg width="17" height="10" viewbox="0 0 17 10" class="fill-current icon">
                                    <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What types of helmets are available for purchase on eCommerce websites?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                There are various types of helmets available for purchase on eCommerce websites,
                                including full-face helmets, open-face helmets, modular helmets, dirt bike helmets, and
                                more.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE]  p-5 sm:p-8  bg-gray-200" data-wow-delay=".15s
                                                  ">
                        <button class="flex items-center w-full text-left faq-btn">
                            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-gray-200">
                                <svg width="17" height="10" viewbox="0 0 17 10" class="fill-current icon">
                                    <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    How do I know which size helmet to buy online?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Most eCommerce websites have a sizing chart available to help you determine the correct
                                size for your helmet. You can measure your head circumference and compare it to the
                                chart to find the right size.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE]  p-5 sm:p-8  bg-gray-200" data-wow-delay=".2s
                                                  ">
                        <button class="flex items-center w-full text-left faq-btn">
                            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-gray-200">
                                <svg width="17" height="10" viewbox="0 0 17 10" class="fill-current icon">
                                    <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What safety standards should I look for when purchasing a helmet online?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                You should look for helmets that meet safety standards such as DOT, ECE, or Snell. These
                                standards ensure that the helmet has passed certain safety tests and is suitable for
                                use.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE]  p-5 sm:p-8  bg-gray-200" data-wow-delay=".1s
                                                  ">
                        <button class="flex items-center w-full text-left faq-btn">
                            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-gray-200">
                                <svg width="17" height="10" viewbox="0 0 17 10" class="fill-current icon">
                                    <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    How do I know if a helmet is comfortable before purchasing it online?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                While it may be difficult to determine the comfort of a helmet before purchasing it
                                online, you can read reviews from other customers who have purchased the same helmet to
                                get an idea of its comfort level.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE]  p-5 sm:p-8  bg-gray-200" data-wow-delay=".15s
                                                  ">
                        <button class="flex items-center w-full text-left faq-btn">
                            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-gray-200">
                                <svg width="17" height="10" viewbox="0 0 17 10" class="fill-current icon">
                                    <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What materials are helmets made from?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Helmets can be made from various materials, including polycarbonate, fiberglass, carbon
                                fiber, and Kevlar. Each material has its own advantages and disadvantages in terms of
                                weight, durability, and cost.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq wow fadeInUp mb-8 w-full rounded-lg border border-[#F3F4FE]  p-5 sm:p-8  bg-gray-200 " data-wow-delay=".2s
                                                  ">
                        <button class="flex items-center w-full text-left faq-btn">
                            <div class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-gray-200">
                                <svg width="17" height="10" viewbox="0 0 17 10" class="fill-current icon">
                                    <path d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z" fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What should I do if my helmet doesn't fit properly after purchasing it online?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Most eCommerce websites have a return policy that allows you to return or exchange the
                                helmet if it doesn't fit properly. Be sure to check the website's return policy before
                                making a purchase to ensure that you can return the helmet if needed.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Faq Section End -->

    <!-- ====== Testimonials Start ====== -->
    <section id="testimonials" class="pt-20 md:pt-[120px] bg-cover bg-fixed" style="background-image: url('header7.png');">
        <div class="container px-4">
            <div class="flex flex-wrap">
                <div class="w-full mx-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
                    <span class="inline-block px-5 py-2 mb-5 text-sm font-medium text-white">
                                    <p href="#_" class="relative inline-block px-4 py-2 font-medium group">
                                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                        <span class="relative text-black group-hover:text-white">Testimonials</span>
                                    </p>
                                </span>
                        <h2 class="mb-4 text-3xl font-bold text-gray-300 sm:text-4xl md:text-[42px]">
                            What our Customer Say
                        </h2>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="p-8 mb-12 bg-gray-200 rounded-md" data-wow-delay=".1s
                                                  ">
                        <div class="flex items-center mb-3 ud-testimonial-ratings">
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-6 ud-testimonial-content">
                            <p class="text-base tracking-wide text-body-color">
                                “Sobrang tibay mas matibay pa sa relasyon niyo!.
                            </p>
                        </div>
                        <div class="flex items-center ud-testimonial-info">
                            <div class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full">
                                <img src="assets/images/testimonials/author-01.png" alt="author" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h4 class="text-sm font-semibold">Dharlyn Deplomo</h4>
                                <p class="text-xs text-[#969696]">@darlyngmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="p-8 mb-12 bg-gray-200 rounded-md" data-wow-delay=".15s
                                                  ">
                        <div class="flex items-center mb-3 ud-testimonial-ratings">
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-6 ud-testimonial-content">
                            <p class="text-base tracking-wide text-body-color">
                                “Their customer support is excellent."
                            </p>
                        </div>
                        <div class="flex items-center ud-testimonial-info">
                            <div class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full">
                                <img src="assets/images/testimonials/author-02.png" alt="author" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h4 class="text-sm font-semibold">delposo </h4>
                                <p class="text-xs text-[#969696]">uwu @ UI Hunter</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="p-8 mb-12 bg-gray-200 rounded-md" data-wow-delay=".2s
                                                  ">
                        <div class="flex items-center mb-3 ud-testimonial-ratings">
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewbox="0 0 18 16" class="fill-current">
                                    <path d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-6 ud-testimonial-content">
                            <p class="text-base tracking-wide text-body-color">
                                “Even though I got hit by a bus, my helmet remained intact but I am already dead."
                            </p>
                        </div>
                        <div class="flex items-center ud-testimonial-info">
                            <div class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full">
                                <img src="assets/images/testimonials/author-03.png" alt="author" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h4 class="text-sm font-semibold">Ben</h4>
                                <p class="text-xs text-[#969696]">ben @ obre</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ====== Testimonials End ====== -->

    <?php
        include "contact.php";
        include 'include/footer.php';
        include "include/footer_link.php";
    ?>

</body>

</html>