<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In | HEADTURNER'S</title>
  <!-- my own css  -->
  <link rel="stylesheet" href="assets/css/addons.css">

  <?php
  include "connect.php";
  include "include/header_link.php";

  // navigation bar 
  include 'include/navbar.php';
  ?>

</head>

<body>


  <!-- ====== Banner Section Start -->
  <div class="relative z-10 overflow-hidden pt-[120px] pb-[100px] md:pt-[130px] lg:pt-[160px] bg-fixed bg-cover" style="background-image: url('header7.png');">
    <div class="container">
      <div class="flex flex-wrap items-center -mx-4">
        <div class="w-full px-4">
          <div class="text-center">
            <?php
            if (isset($_GET['email'])) {
              $email = $_GET['email'];
              echo '
                        <h3 class="text-1xl font-semibold text-white">We have sent your verification pin on your email</h3>
                        <h1 class="text-2xl font-semibold text-white" style="text-decoration:underline;">
                            ' . $email . '
                        </h1>
                    ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ====== Banner Section End -->

  <!-- ====== Forms Section Start -->
  <section class="bg-gray-300 py-14 lg:py-20">
    <div class="container">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
          <div class="wow fadeInUp relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-gray-100 py-14 px-8 text-center sm:px-12 md:px-[60px]" data-wow-delay=".15s">

            <?php
            // if the pin is posted 
            if (isset($_POST['submit_pin'])) {
              $pin = $_POST['pin'];

              $stmt = $conn->prepare("select * from users where email = ?");
              $stmt->bind_param('s', $email);
              $stmt->execute();
              $res = $stmt->get_result();

              if ($res->num_rows > 0) {
                // get the pin in database 
                $row = mysqli_fetch_assoc($res);
                $pin_db = $row['pin'];

                if ($pin == $pin_db) {
                  // update activation in database if pin matched 
                  $stmt = $conn->prepare("update users set verification = 1 and email = ?");
                  $stmt->bind_param('s', $email);
                  $stmt->execute();
                } else {
                  echo '
                  <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                  <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Info</span>
                  <div class="ml-3 text-sm font-medium">
                  Verification Pin Does not match, Please check you email.
                  </div>
                  <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </div>
                            ';
                }
              } else {
                echo '


                <div id="alert-border-2" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div class="ml-3 text-sm font-medium">
    Something went wrong
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
                      
                       ';
              }
            }
            ?>

            <?php
            // check if email already activated
            $stmt = $conn->prepare("select * from users where email = ? and verification = 0");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
            ?>
              <div class="mb-10 text-center">
                <strong>Verify your Email</strong>
              </div>
              <form method="post" id="pin_code">
                <!-- pin code here  -->
                <div class="mb-6">
                  <input type="text" maxlength="6" name="pin" required class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>
                <!-- submit here  -->
                <div class="mb-10">
                <button type="submit" name="submit_pin" class="relative inline-block px-4 py-2 font-medium group">
<span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
<span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
<span class="relative text-black group-hover:text-white">Verify</span>
            </button>
                </div>
              </form>
            <?php
            } else {
              echo '
              <div id="alert-additional-content-3" class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
              <div class="flex items-center">
                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium">Verification Successful</h3>
              </div>
              <div class="mt-2 mb-4 text-sm">
             Your email
              <span style="color : #007bff; text-decoration: underline;">' . $email . '</span>
              has been Verified.
          </h3>
              </div>
              <div class="flex">
                <a href="login.php?email=' . $email . '" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                  <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                  Login Here
                </a>
                <button type="button" class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800" data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                  Dismiss
                </button>
              </div>
                    ';
            }
            ?>
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