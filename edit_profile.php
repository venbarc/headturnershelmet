<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'header_link.php';
    ?>

    <title>Edit Profile | Headturners</title>
</head>

<body>
    <?php
    include "connect.php";
    include "navbar.php";

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $sql = "select * from users where id = '$user_id' ";
        $res = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($res);

        $email = $user['email'];
        $fname = $user['fname'];
        $contact = $user['contact'];
        $address = $user['address'];
        $date_reg = $user['date_reg'];
        $image = $user['image'];
    } else {
        header("Location: login.php");
        exit();
    }
    ?>

    <!-- component -->
    <div class="mt-40 mb-40 p-10" style="padding: 0 20%">

        <?php
        // edit image ///////////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['edit_image'])) {
            $upload_ext = strtolower(pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION)); // Get the file extension
            $upload_name = 'profile-' . rand(100000, 800000) . '.' . $upload_ext; // Generate the file name
            $upload_file = 'uploads/' . $upload_name; // Combine the folder and name
        
            if (!in_array($upload_ext, array('jpg', 'jpeg', 'png'))) // Check if the file is a valid image file
            {
                echo '<div class="popup-message">Only JPG, JPEG, and PNG files are allowed.</div>';
            }

            if ($_FILES['upload_file']['size'] > 2000000) // Check if the file is not larger than 2MB
            {
                echo '<div class="popup-message">Maximum file size is 2MB.</div>';
            }

            if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $upload_file)) // Move the temporary uploaded file to the target folder
            {
                // update image users 
                $sql_upload_img = "UPDATE users SET image = '$upload_file' WHERE id ='$user_id' ";
                $res_upload_img = mysqli_query($conn, $sql_upload_img);

                if ($res_upload_img) {
                    ?>
                    <script>
                        location.href = "edit_profile.php";
                    </script>
                    <?php
                } else {
                    echo '<div class="popup-message">Something went wrong. Please try again!</div>';
                }
                mysqli_close($conn);
            } else {
                echo '<div class="popup-message">Error Occurred. Please try again later!</div>';
            }
        }
        // edit Email ///////////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['edit_email'])) {
            $email = $_POST['email'];

            // check if email exist first 
            $sql_exist = "select * from users where email = '$email' ";
            $res_exist = mysqli_query($conn, $sql_exist);

            if ($res_exist->num_rows > 0) {
                echo '<div class="popup-message">Email is not available.</div>';
            } else {
                $sql_update_email = "update users set email='$email' where id='$user_id' ";
                $res_update_email = mysqli_query($conn, $sql_update_email);

                if ($res_update_email) {
                    echo '<div class="popup-message2">Email updated successfully.</div>';
                }
            }

        }
        // edit personal info ///////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['edit_personal'])) {
            $fname = $_POST['fname'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];

            $sql_update_personal = "update users set fname='$fname', contact='$contact', address='$address' where id='$user_id' ";
            $res_update_personal = mysqli_query($conn, $sql_update_personal);

            if ($res_update_personal) {
                echo '<div class="popup-message2">Personal Information updated successfully.</div>';
            } else {
                echo '<div class="popup-message">Something went wrong pls try again!.</div>';
            }
        }
        // Change password /////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['change_pass'])) {
            $current_pass = $_POST['current_pass'];
            $new_pass = $_POST['new_pass'];
            $c_new_pass = $_POST['c_new_pass'];

            // get original password first 
            $sql_get_pass = "select * from users where id = '$user_id' ";
            $res_get_pass = mysqli_query($conn, $sql_get_pass);
            $row = mysqli_fetch_assoc($res_get_pass);
            $pass_from_db = $row['pass'];

            // check if current pass and password from db match 
            if (password_verify($current_pass, $pass_from_db)) {
                // check if the new password match the confirm password 
                if ($new_pass == $c_new_pass) {
                    //hashed the new password
                    $new_hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                    // update pass into database 
                    $sql_update_pass = "update users set pass='$new_hash_pass' where id='$user_id' ";
                    $res_update_pass = mysqli_query($conn, $sql_update_pass);

                    if ($res_update_pass) {
                        echo '<div class="popup-message2">Password Updated successfully.</div>';
                    }
                } else {
                    echo '<div class="popup-message">New password and confirm password does not match.</div>';
                }
            } else {
                echo '<div class="popup-message">Current password does not match pls try again.</div>';
            }
        }

        ?>

        <center>
            <h1 class="text-white" style="font-size: 50px; font-weight: 600;">Edit Personal Information</h1>
            <!-- edit profile image ///////////////////////////////// -->
            <?php
            // check first if image is empty or not 
            if (empty($image)) {
                $image = 'assets/img/profile/default.png';
            } else {
                $image = $user['image'];
            }
            ?>
            <img class="mt-5" src="<?php echo $image ?>"
                style="width:150px; height:150px; border-radius: 100%; border:5px solid #99aab5;"><br>
            <span style="color: #99aab5;">Date registered :</span>
            <?php echo $date_reg ?> <br>
            <button data-modal-target="edit_image" data-modal-toggle="edit_image" type="button"
                class="mt-3 block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-indigo-600 dark:focus:ring-blue-800">
                Update profile
            </button>
        </center>

        <!-- edit personal information ///////////////////////////////// -->
        <div class="row mt-5">
            <div class="col-md-4">
                <Label><span style="color: #99aab5;">Full Name : </span>
                    <?php echo $fname ?>
                </Label>
            </div>
            <div class="col-md-4">
                <Label><span style="color: #99aab5;">Contact : </span>
                    <?php echo $contact ?>
                </Label>
            </div>
            <div class="col-md-4">
                <Label><span style="color: #99aab5;">Address : </span>
                    <?php echo $address ?>
                </Label>
            </div>
            <div class="col-md-6 mt-3">
                <button data-modal-target="edit_profile" data-modal-toggle="edit_profile" type="button"
                    class="block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-indigo-600 dark:focus:ring-blue-800">
                    Update Information
                </button>
            </div>
        </div>

        <!-- Edit Email /////////////////////////////////////  -->
        <div class="row mt-5">
            <div class="col-md-12">
                <Label><span style="color: #99aab5;">Email : </span>
                    <?php echo $email ?>
                </Label>
            </div>
            <!--(Update Email)-->
            <div class="col-sm-6 mt-3">
                <button data-modal-target="edit_email" data-modal-toggle="edit_email" type="button"
                    class="block text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-indigo-600 dark:focus:ring-blue-800">
                    Update Email
                </button>
            </div>
            <!--(Change password)-->
            <div class="col-sm-6 mt-3">
                <button data-modal-target="change_pass" data-modal-toggle="change_pass" type="button"
                    class="block text-white btn btn-danger rounded-lg text-sm px-5 py-2.5 text-center">
                    Change Password
                </button>
            </div>
        </div>


        <!-- modals and forms are here  -->
        <?php
        include "modals.php";
        ?>


    </div>

    <?php
    include "footer.php";
    include "preloader.php";
    ?>

    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js?Version=<?php echo time() ?>"></script>
</body>

</html>