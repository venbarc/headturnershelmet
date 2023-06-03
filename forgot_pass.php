<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password | HEADTURNERS</title>

    <?php
        include 'connect.php';
        include 'include/header_link.php';

        // email set up /////////////////////////////////////////////////
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';
        require 'PHPMailer-master/src/Exception.php';

        // navigation bar
        include 'include/navbar.php';

        if (isset($_SESSION['user_id'])) 
        {
            ?>
            <script>
                location.href = "404.php";
            </script>
            <?php
        }
    ?>

</head>

<body>
    <!-- ====== Banner Section Start -->
    <div class="relative z-10 overflow-hidden pt-[120px] pb-[100px] md:pt-[130px] lg:pt-[160px] bg-fixed bg-cover"
        style="background-image: url('header7.png');">
        <div class="container">
            <div class="container">
                <div class="flex flex-wrap items-center -mx-4">
                    <div class="w-full px-4">
                        <div class="text-center">
                            <h1 class="text-3xl font-semibold text-white">Forgot Password ?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== Banner Section End -->
        <!-- ====== Forms Section Start -->
        <!-- Container -->
        <section>
            <div class="container mx-auto">
                <div class="flex justify-center px-6 my-12">
                    <!-- Row -->
                    <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                        <!-- Col -->
                        <div class="w-full h-auto bg-gray-100 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
                            style="background-image: url('assets/images/logo/Logo.png')"></div>
                        <!-- Col -->
                        <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
                            <h3 class="pt-4 text-2xl font-bold text-center">Forgot password email here</h3>
                            <!-- if submit is submitted  -->
                            <?php
                                if(isset($_POST['submit_forgot_pass']))
                                {
                                    $email = $_POST['email'];
                                    // new pass generation 
                                    $char = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $new_pass = substr(str_shuffle($char), 0, 12);

                                    // hash the new password  
                                    $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

                                    $stmt = $conn->prepare("select * from users where email = ?");
                                    $stmt->execute([$email]);
                                    $res = $stmt->get_result();

                                    // check first if email exist on db 
                                    if($res->num_rows > 0)
                                    {
                                        // change password in db to new password 
                                        $stmt_update_pass = $conn->prepare("update users set pass = ? where email = ?");
                                        $stmt_update_pass->execute([$new_pass_hash, $email]);

                                        if($stmt_update_pass->affected_rows > 0)
                                        {
                                            // SMTP settings
                                            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                            $mail->isSMTP();
                                            $mail->Host = 'smtp.gmail.com';
                                            $mail->SMTPAuth = true;

                                            // headturners password form gmail
                                            $mail->Username = 'headturners09@gmail.com';
                                            $mail->Password = 'hbmjzwzpjjlxxhsg';
                                            $mail->SMTPSecure = 'tls';
                                            $mail->Port = 587;

                                            $mail->setFrom('headturners09@gmail.com', 'Headturners Reset Password');
                                            // users email
                                            $mail->addAddress($email);
                                            $mail->isHTML(true);
                                            $mail->Subject = 'HeadTurners Password reset';
                                            $mail->Body = '
                                                Your new password is : <span style="color:blue;">'.$new_pass.'</span> <br>
                                                <span style="color:red">
                                                    Note: Please change you password and don\'t show this message to anyone else for your account security.
                                                </span>
                                                ';
                                            $mail->send();
                                            echo '
                                            <div id="alert-2" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Info</span>
                                                <div class="ml-3 text-sm font-medium">
                                                    <span class="font-medium">
                                                        Please check '.$email.', we have sent you your password information. 
                                                    </span>
                                                </div>
                                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                </button>
                                            </div>';
                                        }
                                        $stmt_update_pass->close();
                                    }
                                    else
                                    {
                                        echo '
                                        <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Info</span>
                                            <div class="ml-3 text-sm font-medium">
                                                <span class="font-medium">
                                                    Email Does not Exist on our database. 
                                                </span>
                                            </div>
                                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </div>';
                                    }
                                    $stmt->close();
                                }
                            ?>
                            <form method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                                        Email
                                    </label>
                                    <input type="email" name="email"
                                        placeholder="Email here..."
                                        required
                                        class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                                </div>
                                <!-- submit  -->
                                <div class="mb-6 text-center">
                                    <button type="submit" name="submit_forgot_pass" class="w-full relative inline-block px-4 py-2 font-medium group">
                                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                                        <span class="relative text-black group-hover:text-white">Submit</span>
                                    </button>
                                </div>
                                <!-- link  -->
                                <hr class="mb-6 border-t" />
                                <div class="text-center">
                                    <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                        href="register.php">
                                        Create an Account!
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <section>

            <?php
                include 'contact.php';
                include 'include/footer.php';
                include 'include/footer_link.php';
            ?>

</body>

</html>