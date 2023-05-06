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
  <div class="relative z-10 overflow-hidden bg-primary pt-[120px] pb-[100px] md:pt-[130px] lg:pt-[160px]">
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
      <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
          <div class="wow fadeInUp relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-14 px-8 text-center sm:px-12 md:px-[60px]" data-wow-delay=".15s">

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
                            <div>
                                Verification Pin Does not match, Please check you email.
                            </div>
                            ';
                }
              } else {
                echo '
                        <div>Something went wrong</div>
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
                  <button type="submit" name="submit_pin" class="w-full px-5 py-3 text-base text-white transition duration-300 ease-in-out border rounded-md cursor-pointer border-primary bg-primary hover:shadow-md">
                    Verify
                  </button>
                </div>
              </form>
            <?php
            } else {
              echo '
                    <div class="mb-10 text-center">
                        <strong style="color: #28a745;">Verification Successful</strong>
                    </div>
                    <div>
                        <h3>
                            <span style="color : #007bff; text-decoration: underline;">' . $email . '</span>
                            has been Verified.
                        </h3>
                        <h3 style="color: #007bff;">
                            <a href="login.php?email=' . $email . '">Login here</a>
                        </h3>
                    </div>
                    ';
            }
            ?>


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