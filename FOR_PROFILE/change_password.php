    <!-- Large Modal -->
    <div id="large-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-gray-300 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between border-b rounded-t ">
                    <button type="button" class="text-red-500 bg-transparent hover:bg-gray-200 hover:text-red-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 " data-modal-hide="large-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="container mx-auto mt-10">
                    <div class="flex my-10 shadow-md">
                        <div class="w-3/4 px-10 mb-8 bg-gray-200">
                            <div class="flex justify-between pb-8 border-b">
                                <h1 class="pt-2 text-2xl font-semibold">Shopping Cart</h1>
                                <h2 class="pt-2 text-2xl font-semibold">Selected Item :<span class="text-red-500">3</span></h2>
                            </div>
                            <div class="flex mt-10 mb-5">
                                <h3 class="w-2/5 text-xs font-semibold text-gray-600 uppercase">Product Details</h3>
                                <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Quantity</h3>
                                <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Price</h3>
                                <h3 class="w-1/5 text-xs font-semibold text-center text-gray-600 uppercase">Total</h3>
                            </div>
                            <div class="flex items-center px-6 py-5 -mx-8 hover:bg-gray-100">
                                <!-- check box if the item selected -->
                            <input id="link-checkbox" type="checkbox" value="" class="w-6 h-6 mx-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 ">
                            <!-- check box if the item selected -->
                                <div class="flex w-2/5"> <!-- product -->
                                    <div class="w-20">
                                        <img class="h-12" src="https://i.ibb.co/12CPbjG/product3-offwhite.png" alt="">
                                    </div>
                                    <div class="flex flex-col justify-between flex-grow ml-4">
                                        <span class="text-sm font-bold">SHOEI GLAMSTER OFFWHIT</span>
                                        <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Size:<span class="text-xs text-red-500"> S</span></a>
                                        <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Remove</a>
                                    </div>
                                </div>
                                <div class="flex justify-center w-1/5">
                                    <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                        <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>

                                    <input class="w-8 mx-2 text-center border" type="text" value="1">

                                    <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </div>
                                <span class="w-1/5 text-sm font-semibold text-center">$400.00</span>
                                <span class="w-1/5 text-sm font-semibold text-center">$400.00</span>
                            </div>

                            <div class="flex items-center px-6 py-5 -mx-8 hover:bg-gray-100">
                                                                <!-- check box if the item selected -->
                            <input id="link-checkbox" type="checkbox" value="" class="w-6 h-6 mx-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 ">
                            <!-- check box if the item selected -->
                                <div class="flex w-2/5"> <!-- product -->
                                    <div class="w-20">
                                        <img class="h-12" src="https://i.ibb.co/dG9HdjM/shark-spartan-rs-byhron-full-face-helmet.png" alt="">
                                    </div>
                                    <div class="flex flex-col justify-between flex-grow ml-4">
                                        <span class="text-sm font-bold">Shark Spartan RS Byhron</span>
                                        <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Size:<span class="text-xs text-red-500"> L</span></a>
                                        
                                        <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Remove</a>
                                    </div>
                                </div>
                                <div class="flex justify-center w-1/5">
                                    <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                        <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>

                                    <input class="w-8 mx-2 text-center border" type="text" value="1">

                                    <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </div>
                                <span class="w-1/5 text-sm font-semibold text-center">$40.00</span>
                                <span class="w-1/5 text-sm font-semibold text-center">$40.00</span>
                            </div>

                            <div class="flex items-center px-6 py-5 -mx-8 hover:bg-gray-100">
                                                                <!-- check box if the item selected -->
                            <input id="link-checkbox" type="checkbox" value="" class="w-6 h-6 mx-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 ">
                            <!-- check box if the item selected -->
                                <div class="flex w-2/5"> <!-- product -->
                                    <div class="w-20">
                                        <img class="h-10" src="https://i.ibb.co/cb0Lhb0/agv-tourmodular-solid-mplk-modular-helmet.png" alt="">
                                    </div>
                                    <div class="flex flex-col justify-between flex-grow ml-4">
                                        <span class="text-sm font-bold">agv tourmodular solid mplk</span>
                                        <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Size:<span class="text-xs text-red-500"> XL</span></a>
                                        
                                        <a href="#" class="text-xs font-semibold text-gray-500 hover:text-red-500">Remove</a>
                                    </div>
                                </div>
                                <div class="flex justify-center w-1/5">
                                    <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                        <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                    <input class="w-8 mx-2 text-center border" type="text" value="1">

                                    <svg class="w-3 text-gray-600 fill-current" viewBox="0 0 448 512">
                                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </div>
                                <span class="w-1/5 text-sm font-semibold text-center">$150.00</span>
                                <span class="w-1/5 text-sm font-semibold text-center">$150.00</span>
                            </div>

                            <a href="shoei.php" class="flex my-6 text-sm font-semibold text-indigo-600">

                                <svg class="w-4 mr-2 text-indigo-600 fill-current" viewBox="0 0 448 512">
                                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                                </svg>
                                Continue Shopping
                            </a>
                        </div>

                        <div id="summary" class="w-1/4 px-4 pt-4">
                            <h1 class="text-2xl font-semibold border-b">Order Summary</h1>
                            <div class="flex justify-between mt-10 mb-5">
                                <span class="text-sm font-semibold uppercase">Items 3</span>
                                <span class="text-sm font-semibold">590$</span>
                            </div>
                            <div>
                                <label class="inline-block mb-3 text-sm font-medium uppercase">Shipping</label>
                                <select class="block w-full p-3 text-sm text-gray-600">
                                    <option>Standard shipping</option>
                                    <option>Cash on Delivery</option>
                                    <option>Premium Shipping</option>
                                </select>
                            </div>
                            <div class="py-10">
                                <label for="promo" class="inline-block mb-3 text-sm font-semibold uppercase">Promo Code</label>
                                <input type="text" id="promo" placeholder="Enter your code" class="w-full p-2 text-sm">
                            </div>
                            <button class="px-5 py-2 text-sm text-white uppercase bg-red-500 hover:bg-red-600">Apply</button>
                            <div class="mt-8 border-t">
                                <div class="flex justify-between py-6 text-sm font-semibold uppercase">
                                    <span>Total cost</span>
                                    <span>$600</span>
                                </div>
                                <button  class="w-full py-3 text-sm font-semibold text-white uppercase bg-indigo-500 hover:bg-indigo-600"> <a href="check_out.php">Checkout</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>