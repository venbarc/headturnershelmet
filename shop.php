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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                                                <h6 class="text-gray-900"><strong><?php echo $product_id ?></strong></h6>     
                                                <!-- image and short description  -->
                                                <img src="<?php echo $image ?>" class="w-full">
                                                <div class="flex items-center justify-between pt-3">
                                                    <!-- product name  -->
                                                    <p class="text-gray-900 "><?php echo $name ?></p>
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
                                                                        <svg class="ml-5 w-8 h-8 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
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
                                                                    <svg class="w-6 h-6 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                                                    </svg>
                                                                </a>
                                                                ';
                                                            }
                                                        ?>
                                                </div>
                                                <!-- product availability  -->
                                                <h6 class="font-semibold text-gray-700">Available : <?php echo $available ?></h6>
                                                <!-- price  -->
                                                <p class="pt-1 text-red-800 font-bold">₱ <?php echo $price_format ?></p>
                                                <br>
                                                <p class="font-semibold flex">
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        xs <span class="text-red-600"><?php echo $xs_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        sm <span class="text-red-600"><?php echo $sm_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        md <span class="text-red-600"><?php echo $md_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        lg <span class="text-red-600"><?php echo $lg_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
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
                                                                <h6 class="text-green-600 border border-green-600 p-1"> 
                                                                    Available 
                                                                </h6>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        // for modals 
                                        include "modals/modal_cart.php";
                                    }
                                }
                                else{
                                    ?>
                                    <h1 class="text-white bg-gray-600 text-4xl">No Available Products</h1>
                                    <?php
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
                <?php
                include 'include/reviews.php';

            }
            else
            if($product == 'shoei')
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                                        SHOEI HELMETS
                                    </div>
                                </div>
                            </nav>

                            <!-- products  -->
                            <?php
                                $stmt1 = $conn->prepare("select * from products where brand = 'shoei' ");
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
                                                <h6 class="text-gray-900"><strong><?php echo $product_id ?></strong></h6>     
                                                <!-- image and short description  -->
                                                <img src="<?php echo $image ?>" class="w-full">
                                                <div class="flex items-center justify-between pt-3">
                                                    <!-- product name  -->
                                                    <p class="text-gray-900"><?php echo $name ?></p>
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
                                                                        <svg class="ml-5 w-8 h-8 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
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
                                                                    <svg class="w-6 h-6 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                                                    </svg>
                                                                </a>
                                                                ';
                                                            }
                                                        ?>
                                                </div>
                                                <!-- product availability  -->
                                                <h6 class="font-semibold text-gray-700">Available : <?php echo $available ?></h6>
                                                <!-- price  -->
                                                <p class="pt-1 text-red-800 font-bold">₱ <?php echo $price_format ?></p>
                                                <br>
                                                <p class="font-semibold flex">
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        xs <span class="text-red-600"><?php echo $xs_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        sm <span class="text-red-600"><?php echo $sm_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        md <span class="text-red-600"><?php echo $md_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        lg <span class="text-red-600"><?php echo $lg_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
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
                                                                <h6 class="text-green-600 border border-green-600 p-1"> 
                                                                    Available 
                                                                </h6>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        // for modals 
                                        include "modals/modal_cart.php";
                                    }
                                }
                                else{
                                    ?>
                                    <h1 class="text-white bg-gray-600 text-4xl p-4">No Available Products</h1>
                                    <?php
                                }
                            ?>

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
                <?php
                include 'include/reviews.php';

            }
            else
            if($product == 'agv')
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                            <nav id="agv" class="top-0 z-30 w-full px-6 py-1">
                                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">
                                    <div class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline ">
                                        AGV HELMETS
                                    </div>
                                </div>
                            </nav>

                            <!-- products  -->
                            <?php
                                $stmt1 = $conn->prepare("select * from products where brand = 'agv' ");
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
                                                <h6 class="text-gray-900"><strong><?php echo $product_id ?></strong></h6>     
                                                <!-- image and short description  -->
                                                <img src="<?php echo $image ?>" class="w-full">
                                                <div class="flex items-center justify-between pt-3">
                                                    <!-- product name  -->
                                                    <p class="text-gray-900"><?php echo $name ?></p>
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
                                                                        <svg class="ml-5 w-8 h-8 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
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
                                                                    <svg class="w-6 h-6 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                                                    </svg>
                                                                </a>
                                                                ';
                                                            }
                                                        ?>
                                                </div>
                                                <!-- product availability  -->
                                                <h6 class="font-semibold text-gray-700">Available : <?php echo $available ?></h6>
                                                <!-- price  -->
                                                <p class="pt-1 text-red-800 font-bold">₱ <?php echo $price_format ?></p>
                                                <br>
                                                <p class="font-semibold flex">
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        xs <span class="text-red-600"><?php echo $xs_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        sm <span class="text-red-600"><?php echo $sm_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        md <span class="text-red-600"><?php echo $md_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        lg <span class="text-red-600"><?php echo $lg_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
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
                                                                <h6 class="text-green-600 border border-green-600 p-1"> 
                                                                    Available 
                                                                </h6>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        // for modals 
                                        include "modals/modal_cart.php";
                                    }
                                }
                                else{
                                    ?>
                                    <h1 class="text-white bg-gray-600 text-4xl p-4">No Available Products</h1>
                                    <?php
                                }
                            ?>

                        </div>
                    </section>

                    <!-- ABOUT AGV HELMET  -->
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
                <?php
                include 'include/reviews.php';

            }
            else
            if($product == 'arai')
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                            location.href = "shop.php?product=<?php echo $product ?>#<?php echo $product_id ?>";
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
                            <nav id="agv" class="top-0 z-30 w-full px-6 py-1">
                                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">
                                    <div class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline ">
                                        ARAI HELMETS
                                    </div>
                                </div>
                            </nav>

                            <!-- products  -->
                            <?php
                                $stmt1 = $conn->prepare("select * from products where brand = 'arai' ");
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
                                                <h6 class="text-gray-900"><strong><?php echo $product_id ?></strong></h6>     
                                                <!-- image and short description  -->
                                                <img src="<?php echo $image ?>" class="w-full">
                                                <div class="flex items-center justify-between pt-3">
                                                    <!-- product name  -->
                                                    <p class="text-gray-900"><?php echo $name ?></p>
                                                    
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
                                                                        <svg class="ml-5 w-8 h-8 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
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
                                                                    <svg class="w-6 h-6 text-gray-700 fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" />
                                                                    </svg>
                                                                </a>
                                                                ';
                                                            }
                                                        ?>
                                                </div>
                                                <!-- product availability  -->
                                                <h6 class="font-semibold text-gray-700">Available : <?php echo $available ?></h6>
                                                <!-- price  -->
                                                <p class="pt-1 text-red-800 font-bold">₱ <?php echo $price_format ?></p>
                                                <br>
                                                <p class="font-semibold flex">
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        xs <span class="text-red-600"><?php echo $xs_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        sm <span class="text-red-600"><?php echo $sm_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        md <span class="text-red-600"><?php echo $md_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
                                                        lg <span class="text-red-600"><?php echo $lg_avail ?></span> 
                                                    </span>
                                                    <span class="border border-black p-1 mr-2 text-gray-900">
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
                                                                <h6 class="text-green-600 border border-green-600 p-1"> 
                                                                    Available 
                                                                </h6>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        // for modals 
                                        include "modals/modal_cart.php";
                                    }
                                }
                                else{
                                    ?>
                                    <h1 class="text-white bg-gray-600 text-4xl p-4">No Available Products</h1>
                                    <?php
                                }
                            ?>

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
                <?php
                include 'include/reviews.php';
            }
            else
            {
                ?>
                <script>
                    location.href = "404.php";
                </script>
                <?php
            }
        }
    ?>

    <?php
        include 'contact.php';
        include 'include/footer.php';
        include 'include/footer_link.php';
        include 'include/messenger.php';
    ?>
    <script>
        // ==========================ajax request starts here 

    </script>
</body>

</html>