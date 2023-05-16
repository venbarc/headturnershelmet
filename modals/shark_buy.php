<!-- Add cart modal -->
<form method="post">
    <!-- data of products hidden  -->
    <input type="hidden" name="product_id" value="<?php echo $product_id?>">
    <input type="hidden" name="image" value="<?php echo $image?>">
    <input type="hidden" name="brand" value="<?php echo $brand?>">
    <input type="hidden" name="name" value="<?php echo $name?>">
    <input type="hidden" name="price" value="<?php echo $price?>">

    <div id="modal2_<?php echo $product_id?>" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Place Order | <?php echo $product_id?>
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
                            echo $xs_avail ;
                            echo $sm_avail ;
                            echo $md_avail ;
                            echo $lg_avail ;
                            echo $xlg_avail ;
                        ?>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" name="add_order" class="flex items-center justify-center px-5 py-2 text-white bg-gray-800 hover:bg-gray-600 rounded-lg">
                        <p class="mr-3">Add to placed order</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>
                    <button data-modal-hide="modal2_<?php echo $product_id?>" type="button" class="px-5 py-2 text-white bg-red-700 hover:bg-red-500 rounded-lg">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
