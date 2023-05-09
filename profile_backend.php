<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile | HEADTURNERS</title>

    <?php
    include "connect.php";
    include "include/header_link.php";

    // navigation bar 
    include 'include/navbar.php';

    // Check if user is signed in
    if (isset($_SESSION['user_id'])) {
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
    } else {
        ?>
        <script>
            location.href = "login.php";
        </script>
        <?php
    }

    ?>

</head>


<body class="antialiased ">

    <!-- component -->
    <div class="flex flex-wrap w-full pt-[7rem] h-screen bg-gray-100">
        <div class="w-3/12 p-3 bg-white rounded shadow-lg">
            <div class="flex items-center p-2 mb-5 space-x-4">
                <!-- display image  -->
                <?php
                if (empty($image)) {
                    echo '
                        <img src="assets/images/profile/default_profile.png" class="h-12 rounded-full  w-[50px] h-[50px]">
                    ';
                } else {
                    echo '
                        <img src="' . $image . '" class="h-12 rounded-full  w-[50px] h-[50px]">
                    ';
                }
                ?>
                <div>
                    <h4 class="text-lg font-semibold tracking-wide text-gray-700 capitalize font-poppins">
                        <?php echo $fname . ' ' . $lname ?>
                    </h4>
                    <span class="flex items-center space-x-1 text-sm tracking-wide">
                        <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-gray-600">
                            <?php echo $email ?>
                        </span>
                    </span>
                    <span class="text-gray-700 text-sm">
                        <?php echo $address . ' | ' ?>
                    </span>
                    <span class="text-gray-700 text-sm">
                        <?php echo $contact ?>
                    </span>
                </div>
            </div>

            <ul class="space-y-2 text-sm">
                <li>
                    <a href="profile.php?sidenav_link=profile_info"
                        class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                        <span class="text-gray-600">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                        </span>
                        <span>Personal Information</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                        <span class="text-gray-600 ">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </span>
                        <span>My Cart</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                        <span class="text-gray-600">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </span>
                        <span>My orders</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                        <span class="text-gray-600">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <span>Change password</span>
                    </a>
                </li>
                <li class="pt-40">
                    <span>Member since
                        <?php echo $formattedDate ?>
                    </span>
                </li>
            </ul>
        </div>

        <div class="w-9/12">
            <div class="p-4 text-gray-500">
                <?php
                // edit personal information 
                if (isset($_GET['sidenav_link'])) {
                    // get url data 
                    $sidenav_link = $_GET['sidenav_link'];

                    // if updated profile image is pressed in form 
                    if (isset($_POST['upload_profile'])) {
                        $upload_ext = strtolower(pathinfo($_FILES['upload_profile']['name'], PATHINFO_EXTENSION));
                        $upload_name = 'profile-' . rand(10000000, 99999999);
                        $upload_profile = 'profile_upload/' . $upload_name . '.' . $upload_ext;

                        if (!in_array($upload_ext, array('jpg', 'jpeg', 'png'))) {
                            echo '
                                <div class="msg_001">
                                    Only JPG, JPEG, and PNG files are allowed.
                                </div>
                            ';
                        } else if ($_FILES['upload_profile']['size'] > 2000000) {
                            echo '
                                <div class="msg_001">
                                    Only JPG, JPEG, and PNG files are allowed.
                                </div>
                            ';
                        } else if (move_uploaded_file($_FILES['upload_profile']['tmp_name'], $upload_profile)) {
                            // update users profile picture 
                            $stmt = $conn->prepare("update users set image = ? where id = ?");
                            $stmt->execute([$upload_profile, $user_id]);

                            if ($stmt->affected_rows > 0) {
                                echo 'successfully';
                            } else {
                                echo 'failed';
                            }
                        }
                    }
                    // if updated profile info is pressed in form 
                    if (isset($_POST['update_personal'])) {
                        // initialization 
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $contact = $_POST['contact'];
                        $address = $_POST['address'];

                        $stmt = $conn->prepare("update users set fname = ?, lname = ?, contact = ?, address = ? where id = ?");
                        $stmt->bind_param("ssisi", $fname, $lname, $contact, $address, $user_id);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            ?>
                            <script>
                                location.href = "profile.php?sidenav_link=profile_info";
                            </script>
                        <?php
                        } else {
                            echo '
                            <div class="msg_001">
                                Nothing has been changed.
                            </div>
                            ';
                        }
                        $stmt->close();
                    }

                    //=================== start nav links here 
                    if ($sidenav_link == 'profile_info') {
                        ?>
                        <!-- edit profile image  -->
                        <form method="post" enctype="multipart/form-data" class="mb-20">
                            <h1><strong>Profile Picture</strong></h1>
                            <?php
                            if (empty($image)) {
                                echo '
                                            <img src="assets/images/profile/default_profile.png" class="h-50 rounded-full w-[60px] h-[60px]">
                                        ';
                            } else {
                                echo '
                                            <img src="' . $image . '" class="h-50 rounded-full w-[60px] h-[60px]">
                                        ';
                            }
                            ?>
                            <input type="file" name="upload_profile">
                            <!-- update btn  -->
                            <input type="submit" value="Upload Image" name="upload_profile" class="btn bg-black">
                        </form>

                        <!-- edit personal information  -->
                        <form method="post">
                            <h1><strong>Personal Information</strong></h1>
                            <!-- First name  -->
                            <label><strong>First Name</strong></label> <br>
                            <input type="text" value="<?php echo $fname ?>" name="fname" required><br>
                            <!-- Last name  -->
                            <label><strong>Last Name</strong></label> <br>
                            <input type="text" value="<?php echo $lname ?>" name="lname" required><br>
                            <!-- contact  -->
                            <label><strong>Contact</strong></label> <br>
                            <input type="text" value="<?php echo $contact ?>" name="contact" pattern="[0-9]{10}" required><br>
                            <!-- address  -->
                            <label><strong>Address</strong></label> <br>
                            <input type="text" value="<?php echo $address ?>" name="address" required><br>
                            <!-- submit button  -->
                            <input type="submit" value="Update Personal information" name="update_personal"
                                class="btn bg-black">
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- ====== Forms Section End -->

    <?php
    include 'contact.php';
    include 'include/footer.php';
    include "include/footer_link.php";
    ?>



</body>

</html>