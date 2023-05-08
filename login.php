<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In | HEADTURNER'S</title>

  <?php
  include "connect.php";
  include "include/header_link.php";

  // navigation bar 
  include 'include/navbar.php';
  
  if(isset($_SESSION['user_id']))
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
              <h1 class="text-3xl font-semibold text-white">Already a member ?</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ====== Banner Section End -->

    <!-- ====== Forms Section Start -->

    <!-- component -->
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
              <h3 class="pt-4 text-2xl text-center">Log In Here!</h3>
              <!-- if login is submitted  -->
              <?php
              if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                // check if data is in database 
                $stmt = $conn->prepare("select * from users where email = ?");
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows == 1) 
                {
                  $row = $res->fetch_assoc();
                  $pass_hash = $row['pass'];

                  if (password_verify($pass, $pass_hash)) 
                  {
                    // check if the user is verified
                    $stmt = $conn->prepare("select * from users where email = ? and verification = 1");
                    $stmt->bind_param('s', $email);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    if ($res->num_rows > 0) 
                    {
                      $id = $row['id'];
                      // Start the session and allow login
                      $_SESSION['user_id'] = $id;
                      echo $_SESSION['user_id'];
                      // Redirect user to profile 
                      ?>
                        <script>
                          location.href = "profile.php";
                        </script>
                      <?php
                      exit();
                    } 
                    else 
                    {
                      echo '
                      <div class="msg_001"> 
                        Please check 
                        <span style="color: #007bff; text-decoration: underline;">' . $email . '</span> for email verification!
                      </div>';
                    }
                  }
                  else {
                    echo '<div class="msg_001"> Credentials Does not match, Pls try again. </div>';
                  }
                } 
                else {
                  echo '<div class="msg_001"> Credentials Does not match, Pls try again. </div>';
                }
              }
              ?>
              <form method="post" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="username">
                    Email
                  </label>
                  <input type="email" name="email" <?php echo isset($_GET['email']) ? "value='" . $_GET['email'] . "'" : "placeholder=Email" ?> required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                </div>
                <div class="mb-4">
                  <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                    Password
                  </label>
                  <input type="password" placeholder="Password" name="pass" required
                    class="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none transition focus:border-primary focus-visible:shadow-none" />
                  <p class="text-xs italic text-red-500">Please choose a password.</p>
                </div>
                <div class="mb-4">
                  <input class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
                  <label class="text-sm" for="checkbox_id">
                    Remember Me
                  </label>
                </div>
                <div class="mb-6 text-center">
                  <button type="submit" value="Login" name="login"
                    class="w-full relative inline-block px-4 py-2 font-medium group">
                    <span
                      class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                    <span
                      class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                    <span class="relative text-black group-hover:text-white">Log In</span>
                  </button>
                </div>
                <hr class="mb-6 border-t" />
                <div class="text-center">
                  <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="register.php">
                    Create an Account!
                  </a>
                </div>
                <div class="text-center">
                  <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                    Forgot Password?
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <section>

      <?php
        include "contact.php";
        include 'include/footer.php';
        include "include/footer_link.php";
      ?>

</body>

</html>