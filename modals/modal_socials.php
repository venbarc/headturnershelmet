<!-- Add cart modal -->
<form method="post">
    <div id="modal_social" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Socials
                    </h2>
                </div>
                <!-- Modal body -->
                <div class="p-10">
                    <?php
                        $stmt_social = $conn->prepare("select * from socials");
                        $stmt_social->execute();
                        $res_social = $stmt_social->get_result();

                        if($res_social->num_rows > 0)
                        {
                            echo '
                            <label for="social_select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select</label>
                            <select name="social_select" id="social_select" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"">';
                            while($row_social = $res_social->fetch_assoc())
                            {
                                $social_name = $row_social['social_name'];
                                $social_icon = $row_social['social_icon'];

                                echo '
                                    <option value="'.$social_name.'">
                                    '.$social_name.'
                                    </option> 
                                ';
                            }
                            echo '</select>';
                            
                            echo '
                                <label for="social_link" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Social Link</label>
                                <input type="text" id="social_link" name="social_link" placeholder="social Link here" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            ';
                        }
                    ?>

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" name="add_social" class="flex items-center justify-center px-5 py-2 text-white bg-blue-800 hover:bg-blue-600 rounded-lg">
                        <p class="mr-3">Add To Socials</p>
                    </button>
                    <button data-modal-hide="modal_social" type="button" class="px-5 py-2 text-white bg-red-700 hover:bg-red-500 rounded-lg">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
