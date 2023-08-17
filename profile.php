<?php 
    require_once("./includes/header.php");
    require_once("./lib/database.php");
    require_once("./auth/user.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $database = new Database();
        $userObj = new User($database);
        $editUser = $userObj->edit($id);
    }


?>  
    <div class="overflow-y-hidden h-screen">
        <div class="flex">
            <a href="register.php" class="py-2 px-3 text-xl">
                <i class="fa-solid max-sm:text-3xl fa-arrow-left"></i> 
                <span class="font-semibold">
                    Fill Your Profile
                </span>
            </a>
        </div>
        <form action="./entities/action.php?id=<?php echo $_GET['id'] ?>" method="POST" id="myForm">
            <div class="flex flex-col items-center px-5 sm:justify-center pt-4">
                <div class="mb-3">
                    <img 
                        class="w-24 h-24 rounded-full border-2" 
                        id="profile-preview"
                        src="./assets/img/default-pfp.png" 
                    />
                    <label class="cursor-pointer ml-20 bg-blue-700 text-white rounded-lg p-1">
                        <input 
                            type="file" 
                            id="profile-image"
                            class="hidden"
                            onchange="previewImage(this)"
                        >
                        <i class="fa-solid fa-pen"></i>                
                    </label>
                </div>
                <div class="py-2">
                    <input 
                        type="text" 
                        name="fullName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-16 py-3" 
                        placeholder="Full Name"
                        required
                    >
                </div>
                <div class="py-2">
                    <input 
                        type="text"
                        name="nickName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-16 py-3" 
                        placeholder="Nickname"
                        required
                    >
                </div>
                <div class="relative max-w-sm py-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <input 
                        datepicker 
                        type="text"
                        name="birthDate"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-16 py-3" 
                        placeholder="Date of Birth"
                        required
                    >
                </div>
                <div class="relative py-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <input 
                        type="text"
                        name="e_mail"
                        value="<?php echo $editUser['e_mail'] ?>"
                        class="block w-full px-16 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Email" 
                        required
                    >
                </div>
                <div class="relative py-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        +63
                    </div>
                    <input 
                        type="text"
                        name="phoneNum"
                        id="phoneInput" 
                        class="block w-full px-16 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Phone Number" 
                        maxlength="10"
                        required
                    >
                </div>
                <div class="relative py-2 mb-3">
                    <select 
                        name="gender"
                        required
                        class="select w-full max-w-xs text-start text-gray-900 border border-gray-300 px-[6.7rem] py-2 rounded-lg">
                            <option disabled selected>Gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                    </select>
                </div>
                <input type="hidden" name="btn_action" value="update_register">
                <button type="submit" class="px-[7.5rem] py-3 bg-blue-700 rounded-full text-white mb-10">
                    Continue
                </button>
            </div>
        </form>
    </div>
    <script src="./assets/js/profile.js"></script>
<?php 
    require_once("./includes/footer.php");
?>