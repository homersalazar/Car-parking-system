<?php
    require_once("../includes/header.php");
    require_once("../includes/navbar.php");
    // require_once("../lib/database.php");
    // require_once("../config/make.php");
    // $database = new Database();
    // $makeObj = new Make($database);
    // $data = $makeObj->index();
?>
    <div class="sm:ml-64 mt-14 p-4">
        <div class="flex">         
            <div class="w-full p-4 text-white bg-gray-800 border border-gray-200 rounded-lg shadow sm:p-8">
                <div class="flex">
                    <h1 class="text-xl mb-2 sm:mr-2 sm:mb-0">Edit Manufacturer</h1>
                </div>
                <div class="container mx-auto pt-5">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
                        <label class="col-span-1 lg:col-span-2 text-sm">Manufacturer Name</label>
                        <input 
                            type="text" 
                            name="make"
                            class="col-span-1 lg:col-span-10 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 p-2" 
                            placeholder="Manufacturer" 
                            required
                        >    
                        <div class="col-span-1 lg:col-span-10 lg:col-start-3 justify-end flex">
                            <button type="submut" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once("../includes/footer.php");
?>
