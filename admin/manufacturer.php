<?php
    require_once("../includes/header.php");
    require_once("../includes/navbar.php");
    require_once("modal.php");
    require_once("../lib/database.php");
    require_once("../config/make.php");
    $database = new Database();
    $makeObj = new Make($database);
    $data = $makeObj->index();
?>
    <div class="sm:ml-64 mt-14 p-4">
        <div class="flex">         
            <div class="w-full p-4 text-white bg-gray-800 border border-gray-200 rounded-lg shadow sm:p-8">
                <div class="flex flex-col sm:flex-row justify-between">
                    <h1 class="text-xl mb-2 sm:mr-2 sm:mb-0">Manage Manufacturer</h1>
                    <button data-modal-target="add_make" data-modal-toggle="add_make" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Manufacturer</button>
                </div>
                <div class="w-full pt-5">
                    <div class="relative">
                        <!-- <table id="makeTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Make
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($data AS $row){ 
                                ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <?php echo $row['id']; ?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $row['make']; ?>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table> -->
                        <table id="makeTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Make</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($data AS $row){ 
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['make']; ?></td>
                                        <td class="text-right">
                                            <button type="button" onclick="edit_make('<?php echo $row['id']; ?>', '<?php echo $row['make']; ?>')" data-modal-target="edit_make" class="px-2" data-modal-toggle="edit_make">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" onclick="delete_make('<?php echo $row['id']; ?>', '<?php echo $row['make']; ?>')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <script src="../assets/js/manufacturer.js"></script>
<?php
    require_once("../includes/footer.php");
?>