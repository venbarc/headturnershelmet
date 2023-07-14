<!-- Add cart modal -->
<form method="post">
    <!-- data of products hidden  -->
    <input type="hidden" name="product_id" value="<?php echo $product_id?>">
    <input type="hidden" name="image" value="<?php echo $image?>">
    <input type="hidden" name="brand" value="<?php echo $brand?>">
    <input type="hidden" name="name" value="<?php echo $name?>">
    <input type="hidden" name="price" value="<?php echo $price?>">

    <div id="modal_<?php echo $product_id?>" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add to Cart | <?php echo $product_id?>
                    </h2>
                    <!-- product id and name  -->
                    <h3 class="text-red-600">
                        <?php echo  $name?>
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="grid grid-cols-2">
                    <!-- image  -->
                    <div>
                        <div class="flex items-center justify-center pt-10">
                            <img src="<?php echo $image ?>" width="200" height="auto" >
                        </div>
                        <h1 class="font-semibold text-red-600 pt-5 pb-5 text-center">
                            ₱ <?php echo $price_format ?>
                        </h1>
                    </div>
                    <!-- sizes  -->
                    <div class="grid grid-cols-2 pt-5 pb-5">
                        <?php
                            echo $xs_avail = ($xs_avail <= 0) ? 
                            '<label>
                                Extra small <span class="text-red-600"> <br> ['.$xs_avail.']</span>
                                <span class="text-red-600">Not Available</span>
                            </label>' : 
                            '<label>
                                Extra small <span class="text-red-600"> <br> ['.$xs_avail.']</span>
                                <input type="radio" name="size" value="xs" required>
                            </label>';
                            echo $sm_avail = ($sm_avail <= 0) ? 
                            '<label>
                                Small <span class="text-red-600"> <br> ['.$sm_avail.']</span>
                                <span class="text-red-600">Not Available</span>
                            </label>' : 
                            '<label>
                                Small <span class="text-red-600"> <br> ['.$sm_avail.']</span>
                                <input type="radio" name="size" value="sm" required>
                            </label>';
                            echo $md_avail = ($md_avail <= 0) ? 
                            '<label>
                                Medium <span class="text-red-600"> <br> ['.$md_avail.']</span>
                                <span class="text-red-600">Not Available</span>
                            </label>' : 
                            '<label>
                                Medium <span class="text-red-600"> <br> ['.$md_avail.']</span>
                                <input type="radio" name="size" value="md" required>
                            </label>';
                            echo $lg_avail = ($lg_avail <= 0) ? 
                            '<label>
                                Large <span class="text-red-600"> <br> ['.$lg_avail.']</span>
                                <span class="text-red-600">Not Available</span>
                            </label>' : 
                            '<label>
                                Large <span class="text-red-600"> <br> ['.$lg_avail.']</span>
                                <input type="radio" name="size" value="lg" required>
                            </label>';
                            echo $xlg_avail = ($xlg_avail <= 0) ? 
                            '<label>
                                Extra large <span class="text-red-600"> <br> ['.$xlg_avail.']</span>
                                <span class="text-red-600">Not Available</span>
                            </label>' : 
                            '<label>
                                Extra large <span class="text-red-600"> <br> ['.$xlg_avail.']</span>
                                <input type="radio" name="size" value="xlg" required>
                            </label>';
                        ?>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" name="add_cart" class="flex items-center justify-center px-5 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-lg">
                        <p class="mr-3">Add To Cart</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16" id="IconChangeColor"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" id="mainIconPathAttribute" fill="#ec3636" stroke-width="0" stroke="#813131"></path> 
                        </svg>  
                    </button>
                    <button data-modal-hide="modal_<?php echo $product_id?>" type="button" class="px-5 py-2 text-white bg-red-700 hover:bg-red-500 rounded-lg">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
