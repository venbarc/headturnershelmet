<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop | HEADTURNERS</title>

    <?php
    include "connect.php";
    include "include/header_link.php";

    // Check if user is signed in
    if (isset($_SESSION['user_id'])) 
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


<body class="antialiased" id="shop">

    <?php
        if(isset($_GET['product']))
        {  
            $product = $_GET['product'];

            if($product == 'shark')
            {
                if(isset($_POST['add_cart']))
                {
                    // initialization 
                    $product_id = $_POST['product_id'];
                    $image = $_POST['image'];
                    $brand = $_POST['brand'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $size = $_POST['size'];

                    $stmt = $conn->prepare("insert into cart (user_id, product_id, image, brand, name, price, size) values(?,?,?,?,?,?,?)");
                    $stmt->execute([$user_id, $product_id, $image, $brand, $name, $price, $size]);

                    if($stmt->affected_rows > 0)
                    {
                        echo'
                        <div class="cart_add_alert bg-green-500 text-white font-bold py-2 px-4 rounded fixed bottom-0 left-0 mb-4 ml-4 z-50">
                            Added to cart.
                        </div>
                        ';
                        ?>
                        <script>
                            location.href = "shop.php?product=shark#<?php echo $product_id ?>";
                        </script>
                        <?php
                    }
                }
                else
                if(isset($_POST['remove_cart']))
                {
                    // initialization 
                    $product_id = $_POST['product_id'];
                    // remove from cart 
                    $stmt = $conn->prepare("delete from cart where user_id = ? and product_id = ?");
                    $stmt->execute([$user_id, $product_id]);

                    if($stmt->affected_rows > 0)
                    {
                        echo'
                        <div class="cart_remove_alert bg-red-500 text-white font-bold py-2 px-4 rounded fixed bottom-0 left-0 mb-4 ml-4 z-50">
                            Removed to cart.
                        </div>';
                        ?>
                        <script>
                            location.href = "shop.php?product=shark#<?php echo $product_id ?>";
                        </script>
                        <?php
                    }
                    
                }

                include 'include/navbar.php';

                ?>
                    <!-- section for products  -->
                    <section class="py-32 bg-gray-300"> 
                        <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">
                            <!-- title here  -->
                            <nav id="shark" class="top-0 z-30 w-full px-6 py-1">
                                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">
                                    <div class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline ">
                                        SHARK HELMETS
                                    </div>
                                </div>
                            </nav>

                            <!-- products  -->
                            <?php
                                $stmt1 = $conn->prepare("select * from products where brand = 'shark' ");
                                $stmt1->execute();
                                $res1 = $stmt1->get_result();

                                if($res1->num_rows > 0)
                                {
                                    while($row = $res1->fetch_assoc())
                                    {
                                        $product_id = $row['product_id'];
                                        $image = $row['image'];
                                        $brand = $row['brand'];
                                        $name = $row['name'];
                                        $price = $row['price'];

                                        $xs_avail = $row['xs_avail'];
                                        $sm_avail = $row['sm_avail'];
                                        $md_avail = $row['md_avail'];
                                        $lg_avail = $row['lg_avail'];
                                        $xlg_avail = $row['xlg_avail'];

                                        $available = ($xs_avail + $sm_avail + $md_avail + $lg_avail + $xlg_avail);

                                        $price_format = number_format($price, 2, '.', ',');

                                        ?>
                                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 pt-[10%]" id="<?php echo $product_id ?>">
                                                <!-- product id  -->
                                                <h6><strong><?php echo $product_id ?></strong></h6>     
                                                <!-- image and short description  -->
                                                <img src="<?php echo $image ?>" class="w-full">
                                                <div class="flex items-center justify-between pt-3">
                                                    <!-- product name  -->
                                                    <p><?php echo $name ?></p>
                                                    <!--////////////////////////////// add to cart  -->
                                                        <?php
                                                            if(isset($_SESSION['user_id']))//if user is logged in
                                                            {
                                                                $stmt2 = $conn->prepare("select * from cart where user_id = ? and product_id = ?");
                                                                $stmt2->execute([$user_id, $product_id]);
                                                                $res2 = $stmt2->get_result();

                                                                if($res2->num_rows > 0) 
                                                                {
                                                                    while($row2 = $res2->fetch_assoc())
                                                                    {
                                                                        $in_order = $row2['in_order'];

                                                                        if($in_order == 0) // in cart already
                                                                        {
                                                                            echo'
                                                                            <form method="post">
                                                                            <input type="hidden" name="product_id" value="'.$product_id.'">
                                                                                <button type="submit" name="remove_cart" class="px-5">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="ml-5 bi bi-heart-fill" viewBox="0 0 16 16" id="IconChangeColor"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" id="mainIconPathAttribute" fill="#ec3636" stroke-width="0" stroke="#813131"></path> 
                                                                                    </svg>
                                                                                </button>
                                                                            </form>
                                                                            ';
                                                                        }
                                                                        else 
                                                                        if($in_order == 1) // in order already
                                                                        {
                                                                            echo'
                                                                                <a href="check_out.php" class="px-5">
                                                                                    <svg width="40" height="40" fill="#4f4fbd" viewBox="0 0 20 20">
                                                                                        <path fill-rule="evenodd" d="M2.125 13.17A.5.5 0 012.5 13H8a.5.5 0 01.5.5 1.5 1.5 0 003 0 .5.5 0 01.5-.5h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 18H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393zM5.81 2.563A1.5 1.5 0 016.98 2h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 11-.78.624l-3.7-4.624A.5.5 0 0013.02 3H6.98a.5.5 0 00-.39.188l-3.7 4.624a.5.5 0 11-.78-.624l3.7-4.625z" clip-rule="evenodd"/>
                                                                                        <path fill-rule="evenodd" d="M2.125 7.17A.5.5 0 012.5 7H8a.5.5 0 01.5.5 1.5 1.5 0 003 0A.5.5 0 0112 7h5.5a.5.5 0 01.496.562l-.39 3.124A1.5 1.5 0 0116.117 12H3.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z" clip-rule="evenodd"/>
                                                                                    </svg>
                                                                                </a>
                                                                            ';
                                                                        }
                                                                    }
                                                                }
                                                                else // add to cart
                                                                {
                                                                    echo'
                                                                    <button type="button" data-modal-target="modal_'.$product_id.'" data-modal-toggle="modal_'.$product_id.'">
                                                                        <svg class="ml-5 w-8 h-8 text-black-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                                                        </svg>
                                                                    </button>
                                                                    ';
                                                                }
                                                            }
                                                            else // if user is not logged in
                                                            {
                                                                echo'
                                                                <a href="login.php">
                                                                    <svg class="w-6 h-6 text-black-500 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                                                    </svg>
                                                                </a>
                                                                ';
                                                            }
                                                        ?>
                                                </div>
                                                <!-- product availability  -->
                                                <h6 class="font-semibold text-black-600">Available : <?php echo $available ?></h6>
                                                <!-- price  -->
                                                <p class="pt-1 text-red-800 font-bold">₱ <?php echo $price_format ?></p>
                                                <br>
                                                <p class="font-semibold">
                                                    <span class="border border-black p-1 mr-2">
                                                        xs <span class="text-red-600"><?php echo $xs_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2">
                                                        sm <span class="text-red-600"><?php echo $sm_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2">
                                                        md <span class="text-red-600"><?php echo $md_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2">
                                                        lg <span class="text-red-600"><?php echo $lg_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2">
                                                        xlg <span class="text-red-600"><?php echo $xlg_avail ?></span> 
                                                    </span>
                                                </p>
                                                <div class="flex justify-center mt-4 space-x-6 text-center lg:justify-start md:justify-start">
                                                    <!-- ///////////////////////////// buy now  -->
                                                    <?php
                                                        if(isset($_SESSION['user_id']))// if user is logged in
                                                        {
                                                            if($available <= 0)
                                                            {
                                                                echo'
                                                                    <h6 class="text-red-600 border border-red-600 p-1"> 
                                                                        Not Available 
                                                                    </h6>
                                                                ';
                                                            }
                                                            else{
                                                                echo'
                                                                <h6 class="text-green-600 border border-green-600 p-1"> 
                                                                    Available 
                                                                </h6>
                                                                ';
                                                            }
                                                        }
                                                        else // if user is not logged in
                                                        {
                                                            if($available <= 0)
                                                            {
                                                                echo'
                                                                    <h6 class="text-red-600 font-bold border border-red-600 p-1"> Not Available </h6>
                                                                ';
                                                            }
                                                            else{
                                                                echo'
                                                                <a href="login.php" class="relative inline-block px-4 py-2 font-medium group">
                                                                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                                                    <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                                                    <span class="relative text-black group-hover:text-white">Buy now</span>
                                                                </a>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        // for modals 
                                        include "modals/shark_cart.php";
                                    }
                                }
                            ?>

                        </div>
                    </section>
                    <!-- ABOUT SHARK HELMET -->
                    <section class="py-8">
                        <div class="container px-6 mx-auto">

                            <a class="mb-8 text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline"
                                href="#">
                                About SHARK MOTORCYCLE HELMETS
                            </a>

                            <p class="mt-8 mb-2">Shark Helmets is a French motorcycle helmet manufacturer founded in 1986. The company
                                is known for its high-quality, innovative helmets that offer superior protection and style for
                                motorcyclists.
                                <br>
                            <p class="mt-8 mb-20">Shark helmets are designed and manufactured using advanced technologies and materials,
                                such as
                                carbon fiber and Kevlar, to provide maximum protection and comfort for riders. The company offers a wide
                                range of helmet styles, including full-face, modular, and open-face helmets, as well as specialized
                                helmets for racing and off-road use.

                                In addition to their focus on safety and performance, Shark Helmets also places a strong emphasis on
                                design, with many of their helmets featuring bold graphics and unique styling. The company is a favorite
                                among motorcyclists around the world, and their helmets are often used by professional racers in 0MotoGP
                                and other racing circuits.</p>

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
                                                Shark Spartan GT Carbon Skin Full Face Helmet</p>
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
                                                    href="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/89665440_124012725853354_6280785291192041472_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH1Wv9c4Xr5baZ0rFlVhvfq0wGfmIISmrHTAZ-YghKasVOwFILHcWlUgU1IXQ65V0Q2H4Sn3deIKyreqkiAyoB0&_nc_ohc=HIiGcUeGA0oAX-RquP4&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfBia3MdaWh8NbvcoQhyTnrjrF431rQ1ZiuS3UxlrHsfcQ&oe=64818D86">
                                                    <img class="h-32"
                                                        src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/89665440_124012725853354_6280785291192041472_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH1Wv9c4Xr5baZ0rFlVhvfq0wGfmIISmrHTAZ-YghKasVOwFILHcWlUgU1IXQ65V0Q2H4Sn3deIKyreqkiAyoB0&_nc_ohc=HIiGcUeGA0oAX-RquP4&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfBia3MdaWh8NbvcoQhyTnrjrF431rQ1ZiuS3UxlrHsfcQ&oe=64818D86"
                                                        alt="product1" />
                                                </a>
                                            </div>

                                            <!-- PRODUCT 2 -->
                                            <div>
                                                <a
                                                    href="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/89873814_124012762520017_8161881211929624576_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGMVZcbjCbevBd2rVtDQSlzwTmsZPQl16DBOaxk9CXXoB3-oymJubJkwsYhwW5serwSauujR_-u23aCr19Ebki2&_nc_ohc=eD0ZPp5j1wkAX-iVMAO&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfDWMxDK1_7oOsQCTrvfHn5Jzn8RH9gD8tT270xk8cKpBg&oe=64817D1A">
                                                    <img class="h-32"
                                                        src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/89873814_124012762520017_8161881211929624576_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGMVZcbjCbevBd2rVtDQSlzwTmsZPQl16DBOaxk9CXXoB3-oymJubJkwsYhwW5serwSauujR_-u23aCr19Ebki2&_nc_ohc=eD0ZPp5j1wkAX-iVMAO&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfDWMxDK1_7oOsQCTrvfHn5Jzn8RH9gD8tT270xk8cKpBg&oe=64817D1A"
                                                        alt="product2" />
                                                </a>
                                            </div>

                                            <!-- PRODUCT 3 -->
                                            <div class="hidden md:block">
                                                <a
                                                    href="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/89833222_124012799186680_8106668664310202368_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeED4eXh2VKdTcmGeHnxEJkvgkhcMy3wNiuCSFwzLfA2K6GDGgiMcTf-_jZ1oHmh06T-SbniAA9FkPmiUR2ef7sX&_nc_ohc=Ryd6qvTLWWUAX8A-BoN&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfBqtMGCawgTcnbbLafdoy_G4TN8w1gvGI_umiDLLQlViQ&oe=648188D5">
                                                    <img class="h-32"
                                                        src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/89833222_124012799186680_8106668664310202368_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeED4eXh2VKdTcmGeHnxEJkvgkhcMy3wNiuCSFwzLfA2K6GDGgiMcTf-_jZ1oHmh06T-SbniAA9FkPmiUR2ef7sX&_nc_ohc=Ryd6qvTLWWUAX8A-BoN&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfBqtMGCawgTcnbbLafdoy_G4TN8w1gvGI_umiDLLQlViQ&oe=648188D5"
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
                                                Shark RacerPro GP Martinator</p>
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
                                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t1.6435-9/104233610_154159356172024_5893453477269628135_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH6qIuF8Qr-cKqh0jyTIqOh50M5RhQF0KjnQzlGFAXQqHJNcLaLhLKUvT642UDnfJES18zC2scMvgci219xL0Hn&_nc_ohc=hsyWQqlsNjgAX8W171H&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAWXyNziWvWPZtsDbsVFoaWECMZHAZdFrfh1TtFrAEekg&oe=64832DF7">
                                                    <img class="h-32"
                                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t1.6435-9/104233610_154159356172024_5893453477269628135_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeH6qIuF8Qr-cKqh0jyTIqOh50M5RhQF0KjnQzlGFAXQqHJNcLaLhLKUvT642UDnfJES18zC2scMvgci219xL0Hn&_nc_ohc=hsyWQqlsNjgAX8W171H&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfAWXyNziWvWPZtsDbsVFoaWECMZHAZdFrfh1TtFrAEekg&oe=64832DF7"
                                                        alt="product1" />
                                                </a>
                                            </div>

                                            <!-- PRODUCT 2 -->
                                            <div>
                                                <a
                                                    href="https://scontent.fcrk4-1.fna.fbcdn.net/v/t1.6435-9/82947289_154159376172022_8230141418113889212_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeFCn90CIaPPvEr1Lkc_MyTBFbhOCmVKzEkVuE4KZUrMSdbSGLFRKADTKlBeiAUI-4BwAX-tGBpKBgqYlK7sg8_n&_nc_ohc=e2ep70HovUMAX_pPmac&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfD4YZzOPQ4es8CFsJ5ugELl2l8keWn0NmTMBQpw0xfHJw&oe=6483453A">
                                                    <img class="h-32"
                                                        src="https://scontent.fcrk4-1.fna.fbcdn.net/v/t1.6435-9/82947289_154159376172022_8230141418113889212_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeFCn90CIaPPvEr1Lkc_MyTBFbhOCmVKzEkVuE4KZUrMSdbSGLFRKADTKlBeiAUI-4BwAX-tGBpKBgqYlK7sg8_n&_nc_ohc=e2ep70HovUMAX_pPmac&_nc_ht=scontent.fcrk4-1.fna&oh=00_AfD4YZzOPQ4es8CFsJ5ugELl2l8keWn0NmTMBQpw0xfHJw&oe=6483453A"
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
            }
            else
            if($product == 'shoei')
            {
                ?>
                    <!-- section for products  -->
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
                    <!-- ABOUT SHOEI HELMET  -->
                    <section class="py-8">

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
            }
            else
            if($product == 'avg')
            {
                ?>
                    <!-- section for products  -->
                    <section class="py-32 bg-gray-300">
                        <div class="container flex flex-wrap items-center pt-4 pb-20 mx-auto">
                            <nav id="agv" class="top-0 z-30 w-full px-6 py-1">
                                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">
                                    <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline "
                                        href="#">
                                        AGV HELMET'S
                                    </a>
                                </div>
                            </nav>
                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/cgzcdXy/AGV-K-1-S-Salom-Helmet-multicolored.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv K-1 S Salom Helmet multicolored</p>
                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱12,737.00</p>
                                </a>
                            </div>
                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/HzRXy20/agv-pistagprr-helmet-2206-italia.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv pistagprr helmet 2206 italia</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱61,418.00</p>
                                </a>
                            </div>

                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/9VQpWTk/agv-compact-st-solid-plk-modular-helmet.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv compact st solid plk modular helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱49,000.00</p>
                                </a>
                            </div>

                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/r62Lbr4/agv-k3-sv-top-mplk-full-face-helmet.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv k3 sv top mplk full face helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱16,950.00</p>
                                </a>
                            </div>

                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/2tVmF7Z/agv-k5-s-multi-mplk-full-face-helmet.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv k5 s multi mplk full face helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱17,911.00</p>
                                </a>
                            </div>

                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/8B8spny/agv-k5-s-multi-mplk-full-face-helmet-1.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv k5 s multi mplk full face helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱17,911.00</p>
                                </a>
                            </div>

                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/rfHxD7N/agv-k6-s-e2206-mplk-full-face-helmet.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv k6 s e2206 mplk full face helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱15,992.00</p>
                                </a>
                            </div>


                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/jVh2w0k/agv-pista-gp-rr-e2206-dot-mplk-full-face-helmet.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv pista gp rr e2206 dot mplk full face helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱49,000.00</p>
                                </a>
                            </div>

                            <div class="flex flex-col w-full p-6 md:w-1/3 xl:w-1/4 wow fadeInUp group " data-wow-delay=".2s">
                                <a href="#">
                                    <img class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                                        src="https://i.ibb.co/cb0Lhb0/agv-tourmodular-solid-mplk-modular-helmet.png">
                                    <div class="flex items-center justify-between pt-3">
                                        <p class="">agv tourmodular solid mplk modular helmet</p>

                                        <svg class="w-6 h-6 text-gray-500 fill-current hover:text-black"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                        </svg>
                                    </div>
                                    <p class="pt-1 text-red-800">₱35,633.00</p>
                                </a>
                            </div>


                        </div>
                    </section>
                    <!-- ABOUT AVG HELMET  -->
                    <section class="py-8">
                        <div class="container px-6 py-8 mx-auto">
                            <a class="mb-8 text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline"
                                href="#">
                                About
                            </a>
                            <p class="mt-8 mb-8">This template is inspired by the stunning nordic minamalist design - in particular:
                                <br>
                                <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/"
                                    target="_blank">Savoy Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900"
                                    href="https://nordicmade.com/">https://nordicmade.com/</a> and <a
                                    class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/"
                                    target="_blank">https://www.metricdesign.no/</a>
                            </p>
                            <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan
                                lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis
                                mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam
                                vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed
                                faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum
                                quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas
                                dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu
                                consequat ac.</p>
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
                                                agv compact st solid plk modular helmet
                                            </p>
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
                                                    href="https://th.bing.com/th/id/OIP.8jttVhkgc9ooag93TT0HCgHaJ4?pid=ImgDet&rs=1">
                                                    <img class="h-32"
                                                        src="https://th.bing.com/th/id/OIP.8jttVhkgc9ooag93TT0HCgHaJ4?pid=ImgDet&rs=1"
                                                        alt="product1" />
                                                </a>
                                            </div>

                                            <div>
                                                <a target="_blank"
                                                    href="https://i2.wp.com/www.asphaltandrubber.com/wp-content/uploads/2016/12/AGV-Corsa-R-02.jpg">
                                                    <img class="h-32"
                                                        src="https://i2.wp.com/www.asphaltandrubber.com/wp-content/uploads/2016/12/AGV-Corsa-R-02.jpg"
                                                        alt="product1" />
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
            }
            else
            if($product == 'arai')
            {
                ?>
                    <!-- section for products  -->
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
                    <!-- ABOUT ARAI HELMET  -->
                    <section class="py-8">
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
                                helmets.
                            </p>
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
            }
        }
    ?>

    <?php
        include 'contact.php';
        include 'include/footer.php';
        include 'include/footer_link.php';
    ?>
    <script>
        // ==========================ajax request starts here 

    </script>
</body>

</html>