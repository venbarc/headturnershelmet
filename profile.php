<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About | HEADTURNER'S</title>
    
    <?php
    session_start();
    include "connect.php";
    include "include/header_link.php";

    // navigation bar 
    include 'include/navbar.php';

    // Check if user is signed in
    if(isset($_SESSION['user_id']))
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
        $contact = $user['contact']; 
        $address = $user['contact']; 
        $image = $user['image']; 
        $date_reg = $user['date_reg']; 
    }
    else
    {
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
<div class="flex flex-wrap w-full h-screen pt-20 bg-gray-100">
    <div class="w-3/12 p-3 bg-white rounded shadow-lg">
        <div class="flex items-center p-2 mb-5 space-x-4">
            <img class="h-12 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="James Bhatta">
            <div>
                <h4 class="text-lg font-semibold tracking-wide text-gray-700 capitalize font-poppins">Noel Deplomo</h4>
                <span class="flex items-center space-x-1 text-sm tracking-wide">
                    <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg><span class="text-gray-600">noeldeplomo@gmail.com</span>
                </span>
            </div>
        </div>
        <ul class="space-y-2 text-sm">

            <li>
                <a href="#" class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                    <span class="text-gray-600">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                       
                    </span>
                    <span>Notifications</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                    <span class="text-gray-600">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                    </span>
                    <span>Billing Address</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                    <span class="text-gray-600">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </span>
                    <span>My orders</span>
                </a>
            </li>
            <li>
                <a href="" class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                    <span class="text-gray-600 ">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </span>
                    <span>My Cart</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                    <span class="text-gray-600">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </span>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="" class="flex items-center p-2 space-x-3 font-medium text-gray-700 rounded-md hover:bg-gray-200 focus:bg-gray-200 focus:shadow-outline">
                    <span class="text-gray-600">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <span>Change password</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="w-9/12">
        <div class="p-4 text-gray-500">
            
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