<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | HEADTURNERS</title>

  <?php
  include 'connect.php';
  include 'include/header_link.php';

  // navigation bar
  include 'include/navbar.php';

  // email set up /////////////////////////////////////////////////
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  require 'PHPMailer-master/src/Exception.php';

  // Check if user is signed in
  if (isset($_SESSION['user_id'])) {
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
              <h1 class="text-3xl font-semibold text-white">Register Here</h1>
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
          <div class="w-full xl:w-3/4 lg:w-11/12 flex justify-center">
            <div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
              <div>
                <h3 class="pt-4 text-2xl text-center">Come Join Us now!</h3>
              </div>

              <!-- if register is submitted  -->
              <?php
              if (isset($_POST['register'])) 
              {
                $email = $_POST['email'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $contact = $_POST['contact'];
                $address = $_POST['address'];
                $pass = $_POST['pass'];
                $cpass = $_POST['cpass'];
                $msg = [];
                $error = false;

                // generate pin
                $pin = rand(100000, 999999);

                // hashed password
                $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

                // check if email exist in users database
                $stmt = $conn->prepare('select * from users where email = ?');
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $res = $stmt->get_result();

                // if email is already in database
                if ($res->num_rows > 0) {
                  $msg[] = '
                  <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                      Email Not Available!
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>';
                  $error = true;
                }
                // check if password and confirm password match
                if ($pass != $cpass) 
                {
                  $msg[] = '
                  <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                      Password and Confirm Password Does not match!
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>';
                  $error = true;
                } else if (!$error) 
                {
                  // insert data
                  $stmt = $conn->prepare('insert into users (email, fname, lname, contact, address, pass, pin) values (?,?,?,?,?,?,?) ');
                  $stmt->bind_param('sssissi', $email, $fname, $lname, $contact, $address, $hash_pass, $pin);
                  $stmt->execute();

                  if ($stmt->affected_rows > 0) {
                    ?>
                      <script>
                        location.href = "verify_email.php?email=<?php echo $email; ?>";
                      </script>
                      <?php

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

                      $mail->setFrom('headturners09@gmail.com', 'Headturners Verification Pin');
                      // users email
                      $mail->addAddress($email);
                      $mail->isHTML(true);
                      $mail->Subject = 'Verification Pin';
                      $mail->Body = '
                          <div style="border: 5px dashed black; padding: 5%; margin: 0 15%">
                              <h1> 
                                Verify your Account here  <br>
                              </h1> 
                              <h2>
                                Your verification pin: <br> 
                                <span style="text-decoration: underline;"> ' . $pin . '</span> 
                              </h4>
                          </div>
                          ';
                      $mail->send();
                  }
                }
                // display error message
                foreach ($msg as $dis_msg) {
                  echo $dis_msg;
                }
              }
              ?>

              <form method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                <!-- email here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                    Email
                  </label>
                  <input type="email" placeholder="Email" name="email" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>
                <!-- First name here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="fname">
                    First name
                  </label>
                  <input type="text" placeholder="First Name" name="fname" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>
                <!-- Last Name here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="lname">
                    Last name
                  </label>
                  <input type="text" placeholder="Last Name" name="lname" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>
                <!-- contact here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="contact">
                    Contact (+63)
                  </label>
                  <input type="contact" placeholder="Contact (63+)" name="contact" maxlength="10" minlength="10" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>

                <!-- address here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="address">
                    Address
                  </label>
                  <input type="text" placeholder="Address" name="address" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>

                <!-- password here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="pass">
                    Password
                  </label>
                  <input type="password" placeholder="Password" name="pass" required minlength="8"  required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>

                <!--Confirm  password here  -->
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="cpass">
                    Confirm Password
                  </label>
                  <input type="password" placeholder="Confirm Password" name="cpass" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>

                <!-- register button here  -->
                <div class="mb-6 text-center">
                  <button type="submit" value="Register" name="register"
                    class="w-full relative inline-block px-4 py-2 font-medium group">
                    <span
                      class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span
                      class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white">Register</span>
                  </button>
                </div>
                <hr class="mb-6 border-t" />
                <!-- privacy and policy  -->
                <p class="mb-4 text-base text-gray-700">
                  By creating an account you are agree with our
                  <a href="javascript:void(0)" class="text-primary hover:underline">Privacy</a> and
                  <a href="javascript:void(0)" class="text-primary hover:underline">Policy</a>
                </p>
                <!-- already have an account link  -->
                <p class="text-base text-gray-700">
                  Already have an account?
                  <a href="login.php" class="text-primary hover:underline">
                    Login
                  </a>
                </p>
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
        include 'include/messenger.php';
        ?>

</body>

</html>