<!-- REVIEWS -->
<section class="container px-6 mx-auto" id="rating">
    <div class="flex items-center  justify-center px-4 py-12 md:px-6 2xl:px-0 2xl:container 2xl:mx-auto">
        <div class="flex flex-col items-start justify-start w-full space-y-8">
            <!-- REVIEW HEADER -->
            <div class="flex items-start justify-start">
                <?php
                // count place order 
                $stmt_count_review = $conn->prepare("SELECT * from reviews");
                $stmt_count_review->execute();
                $res_count_review = $stmt_count_review->get_result();
                $count_review = $res_count_review->num_rows > 0 ? $res_count_review->num_rows : 0;
                ?>
                <p class="text-3xl font-bold leading-7 text-gray-800 lg:text-4xl lg:leading-9  ">
                    Customer Reviews
                    [ <?php echo $count_review ?> ]
                </p>
            </div>

            <?php
                $stmt_review = $conn->prepare("SELECT r.*,u.* from reviews r join users u on r.user_id = u.id");
                $stmt_review->execute();
                $res_review = $stmt_review->get_result();

                if($res_review->num_rows > 0)
                {
                    while($row_review = $res_review->fetch_assoc())
                    {
                        $email = $row_review['email'];
                        $fname = $row_review['fname'];
                        $lname = $row_review['lname'];
                        $image = $row_review['image'];

                        $order_id = $row_review['order_id'];
                        $message = $row_review['message'];
                        $img = $row_review['img'];
                        $rating = $row_review['rating'];
                        $date = $row_review['date'];

                        // format date 
                        $dateTime = new DateTime($date);
                        $formattedDate = $dateTime->format("F j, Y");

                        if(empty($image))
                        {
                            $image = '../assets/images/profile/default_profile.png';
                        }else{
                            $image = $image;
                        }
                        ?>
                        <div class="flex flex-col items-start justify-start w-full p-8 bg-gray-100" id="rating">
                            <div class="flex flex-col justify-between w-full md:flex-row">
                                <!-- PRODUCT NAME TO REVIEW -->
                                <div class="flex flex-row items-start justify-between">
                                    <p class="text-xl font-bold leading-normal text-gray-800 md:text-2xl ">
                                        <?php echo $email ?>
                                    </p>
                                </div>
                                <!-- Star ratings -->
                                <div class="flex items-center  text-yellow-300">
                                    <input class="star star-5" id="star-5" type="radio" name="star<?php echo $order_id?>" <?php echo ($rating == 5) ? 'checked' : ''; ?> disabled/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star<?php echo $order_id?>" <?php echo ($rating == 4) ? 'checked' : ''; ?> disabled/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star<?php echo $order_id?>" <?php echo ($rating == 3) ? 'checked' : ''; ?> disabled/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star<?php echo $order_id?>" <?php echo ($rating == 2) ? 'checked' : ''; ?> disabled/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="star<?php echo $order_id?>" <?php echo ($rating == 1) ? 'checked' : ''; ?> disabled/>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <!--end Star ratings -->
                            </div>

                            <div id="menu" class="md:block">
                                <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                                    <div>
                                        <img src="<?php echo $image ?>" class="object-cover w-[70px] h-auto" />
                                    </div>
                                    <div class="flex flex-col items-start justify-start space-y-2">
                                        <p class="text-base font-medium leading-none text-gray-800 ">
                                            <?php echo $fname .' '. $lname ?>
                                        </p>
                                        <p class="text-sm leading-none text-gray-600 ">
                                            <?php echo $formattedDate ?>
                                        </p>
                                    </div>
                                </div>
                                <p class="w-full mt-3 text-base leading-normal text-gray-600  md:w-12/12 xl:w-6/6">
                                    <?php echo $message ?>
                                </p>
                                <!-- PRODUCT -->
                                <div class="flex-row items-start justify-start hidden mt-6 space-x-4 md:flex">
                                    <div>
                                        <img src="<?php echo $img ?>" class="object-cover w-[90px] h-auto">
                                    </div>
                                </div>
                                <!-- end of product -->
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>

        </div>
    </div>
</section>