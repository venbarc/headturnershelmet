<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | HEADTURNER'S</title>

  <?php
  include "connect.php";
  include "include/header_link.php";

  // navigation bar 
  include 'include/navbar.php';

  // email set up /////////////////////////////////////////////////
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  require 'PHPMailer-master/src/Exception.php';
  ?>

</head>

<body>

  <!-- ====== Banner Section Start -->
  <div class="relative z-10 overflow-hidden bg-primary pt-[120px] pb-[100px] md:pt-[130px] lg:pt-[160px]">
    <div class="container">
      <div class="-mx-4 flex flex-wrap items-center">
        <div class="w-full px-4">
          <div class="text-center">
            <h1 class="text-4xl font-semibold text-white">Register Here</h1>
          </div>
        </div>
      </div>
    </div>
    <div>
      <span class="absolute top-0 left-0 z-[-1]">
        <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
          <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
          <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white" stroke-opacity="0.08" stroke-width="12" />
        </svg>
      </span>
      <span class="absolute top-0 right-0 z-[-1]">
        <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
          <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
          <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white" stroke-opacity="0.06" stroke-width="13" />
        </svg>
      </span>
    </div>
  </div>
  <!-- ====== Banner Section End -->

  <!-- ====== Forms Section Start -->
  <section class="bg-[#F4F7FF] py-14 lg:py-20">
    <div class="container">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="wow fadeInUp relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-14 px-8 text-center sm:px-12 md:px-[60px]" data-wow-delay=".15s">
            <div class="mb-10 text-center">
              <!-- <img src="assets/images/logo/logo.svg" alt="logo" /> -->
              <strong>Come Join us now</strong>
            </div>
            <!-- if register is submitted  -->
            <?php
            if (isset($_POST['register'])) {
              $email = $_POST['email'];
              $fname = $_POST['fname'];
              $contact = $_POST['contact'];
              $address = $_POST['address'];
              $pass = $_POST['pass'];
              $cpass = $_POST['cpass'];
              $msg = array();
              $error = false;

              // generate pin 
              $pin = rand(100000, 999999);

              // hashed password 
              $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

              // check if email exist in users database 
              $stmt = $conn->prepare("select * from users where email = ?");
              $stmt->bind_param('s', $email);
              $stmt->execute();
              $res = $stmt->get_result();

              // if email is already in database
              if ($res->num_rows > 0) {
                $msg[] = '
                            <div> Email not available! </div>
                        ';
                $error = true;
              }
              // check if password and confirm password match 
              if ($pass != $cpass) {
                $msg[] = '
                            <div> Password and Confirm password does not match! </div>
                        ';
                $error = true;
              } else
                    if (!$error) {
                // insert data 
                $stmt = $conn->prepare("insert into users (email, fname, contact, address, pass, pin) values (?,?,?,?,?,?) ");
                $stmt->bind_param('ssissi', $email, $fname, $contact, $address, $hash_pass, $pin);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
            ?>
                  <script>
                    location.href = "verify_email.php?email=<?php echo $email ?>";
                  </script>
            <?php

                  //SMTP settings
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

            <form method="post">
              <!-- email here  -->
              <div class="mb-6">
                <input type="email" placeholder="Email" name="email" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
              </div>
              <!-- full name here  -->
              <div class="mb-6">
                <input type="text" placeholder="Full Name" name="fname" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
              </div>
              <!-- contact here  -->
              <div class="mb-6">
                <input type="contact" placeholder="Contact (63+)" name="contact" pattern="[0-9]{10}" maxlength="10" minlength="10" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
              </div>
              <!-- address here  -->
              <div class="mb-6">
                <input type="text" placeholder="Address" name="address" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
              </div>
              <!-- password here  -->
              <div class="mb-6">
                <input type="password" placeholder="Password" name="pass" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
              </div>
              <!--Confirm password here  -->
              <div class="mb-6">
                <input type="password" placeholder="Confirm Password" name="cpass" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
              </div>
              <!-- register button here  -->
              <div class="mb-10">
                <input type="submit" value="Register" name="register" class="border-primary w-full cursor-pointer rounded-md border bg-primary py-3 px-5 text-base text-white transition duration-300 ease-in-out hover:shadow-md" />
              </div>
            </form>
            <!-- privacy and policy  -->
            <p class="mb-4 text-base text-[#adadad]">
              By creating an account you are agree with our
              <a href="javascript:void(0)" class="text-primary hover:underline">Privacy</a>and
              <a href="javascript:void(0)" class="text-primary hover:underline">Policy</a>
            </p>
            <!-- already have an account link  -->
            <p class="text-base text-[#adadad]">
              Already have an account?
              <a href="login.php" class="text-primary hover:underline">
                Login
              </a>
            </p>

            <div>
              <span class="absolute top-1 right-1">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="1.39737" cy="38.6026" r="1.39737" transform="rotate(-90 1.39737 38.6026)" fill="#3056D3" />
                  <circle cx="1.39737" cy="1.99122" r="1.39737" transform="rotate(-90 1.39737 1.99122)" fill="#3056D3" />
                  <circle cx="13.6943" cy="38.6026" r="1.39737" transform="rotate(-90 13.6943 38.6026)" fill="#3056D3" />
                  <circle cx="13.6943" cy="1.99122" r="1.39737" transform="rotate(-90 13.6943 1.99122)" fill="#3056D3" />
                  <circle cx="25.9911" cy="38.6026" r="1.39737" transform="rotate(-90 25.9911 38.6026)" fill="#3056D3" />
                  <circle cx="25.9911" cy="1.99122" r="1.39737" transform="rotate(-90 25.9911 1.99122)" fill="#3056D3" />
                  <circle cx="38.288" cy="38.6026" r="1.39737" transform="rotate(-90 38.288 38.6026)" fill="#3056D3" />
                  <circle cx="38.288" cy="1.99122" r="1.39737" transform="rotate(-90 38.288 1.99122)" fill="#3056D3" />
                  <circle cx="1.39737" cy="26.3057" r="1.39737" transform="rotate(-90 1.39737 26.3057)" fill="#3056D3" />
                  <circle cx="13.6943" cy="26.3057" r="1.39737" transform="rotate(-90 13.6943 26.3057)" fill="#3056D3" />
                  <circle cx="25.9911" cy="26.3057" r="1.39737" transform="rotate(-90 25.9911 26.3057)" fill="#3056D3" />
                  <circle cx="38.288" cy="26.3057" r="1.39737" transform="rotate(-90 38.288 26.3057)" fill="#3056D3" />
                  <circle cx="1.39737" cy="14.0086" r="1.39737" transform="rotate(-90 1.39737 14.0086)" fill="#3056D3" />
                  <circle cx="13.6943" cy="14.0086" r="1.39737" transform="rotate(-90 13.6943 14.0086)" fill="#3056D3" />
                  <circle cx="25.9911" cy="14.0086" r="1.39737" transform="rotate(-90 25.9911 14.0086)" fill="#3056D3" />
                  <circle cx="38.288" cy="14.0086" r="1.39737" transform="rotate(-90 38.288 14.0086)" fill="#3056D3" />
                </svg>
              </span>
              <span class="absolute left-1 bottom-1">
                <svg width="29" height="40" viewBox="0 0 29 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="2.288" cy="25.9912" r="1.39737" transform="rotate(-90 2.288 25.9912)" fill="#3056D3" />
                  <circle cx="14.5849" cy="25.9911" r="1.39737" transform="rotate(-90 14.5849 25.9911)" fill="#3056D3" />
                  <circle cx="26.7216" cy="25.9911" r="1.39737" transform="rotate(-90 26.7216 25.9911)" fill="#3056D3" />
                  <circle cx="2.288" cy="13.6944" r="1.39737" transform="rotate(-90 2.288 13.6944)" fill="#3056D3" />
                  <circle cx="14.5849" cy="13.6943" r="1.39737" transform="rotate(-90 14.5849 13.6943)" fill="#3056D3" />
                  <circle cx="26.7216" cy="13.6943" r="1.39737" transform="rotate(-90 26.7216 13.6943)" fill="#3056D3" />
                  <circle cx="2.288" cy="38.0087" r="1.39737" transform="rotate(-90 2.288 38.0087)" fill="#3056D3" />
                  <circle cx="2.288" cy="1.39739" r="1.39737" transform="rotate(-90 2.288 1.39739)" fill="#3056D3" />
                  <circle cx="14.5849" cy="38.0089" r="1.39737" transform="rotate(-90 14.5849 38.0089)" fill="#3056D3" />
                  <circle cx="26.7216" cy="38.0089" r="1.39737" transform="rotate(-90 26.7216 38.0089)" fill="#3056D3" />
                  <circle cx="14.5849" cy="1.39761" r="1.39737" transform="rotate(-90 14.5849 1.39761)" fill="#3056D3" />
                  <circle cx="26.7216" cy="1.39761" r="1.39737" transform="rotate(-90 26.7216 1.39761)" fill="#3056D3" />
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Forms Section End -->

  <?php
  include "contact.php";
  include 'include/footer.php';
  include "include/footer_link.php";
  ?>

</body>

</html>