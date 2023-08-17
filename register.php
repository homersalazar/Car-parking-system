<?php 
    require_once("./includes/header.php");    
?>  
    <div class="overflow-x-hidden h-screen">
        <div class="flex">
            <a href="link_account.php" class="py-2 px-3 text-xl">
                <span>
                    <i class="fa-solid max-sm:text-3xl fa-arrow-left"></i>
                </span>
                <span class="max-sm:hidden">
                    Back
                </span>
            </a>
        </div>
        <div class="flex flex-col items-center px-5 sm:justify-center pt-12">
            <div class="font-bold text-4xl sm:text-center mb-10">
                <h1>Create your Account</h1>
            </div>
            <form action="./entities/action.php" method="POST">
                <div class="relative py-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <input 
                        type="text"
                        name="e_mail"
                        class="block w-full px-16 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Email" 
                        required
                    >
                </div>
                <div class="relative py-5">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input 
                        type="password"
                        name="pass_word"
                        class="block w-full px-16 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Password" 
                        id="password"
                        required
                    >
                    <button type="button" 
                        class="absolute right-2.5 bottom-2.5 mb-5"
                        id="check"
                    >
                        <i class="fa-solid fa-eye hidden" id="eyeIcon"></i>
                        <i class="fa-solid fa-eye-slash" id="eyeSlashIcon"></i>
                    </button>
                </div>
                <input type="hidden" name="btn_action" value="register">
                <button type="submit" class="px-[7.5rem] py-3 bg-blue-700 rounded-full text-white mb-10">
                    Sign up
                </button>
            </form>
            <div class="text-xl mb-10">
                or continue with
            </div>
            <div class="grid grid-cols-3 gap-5 place-items-center">
                <div class="border-2 px-3 py-2 rounded-xl hover:bg-blue-700 text-blue-600 hover:text-white">
                    <i class="fa-brands text-2xl fa-facebook"></i>
                </div>
                <div class="border-2 px-3 py-2 rounded-xl hover:bg-blue-700 text-red-600 hover:text-white">
                    <i class="fa-brands text-2xl fa-google"></i>
                </div>            
                <div class="border-2 px-3 py-2 rounded-xl hover:bg-blue-700 text-black hover:text-white">
                    <i class="fa-brands text-2xl fa-apple"></i>
                </div>         
            </div>
            <div class="pt-10">
                <span>Already have an account?</span> <a class="text-blue-700 hover:underline" href="login.php">Sign in</a>
            </div>
        </div>
    </div>
    <script src="./assets/js/register.js"></script>
<?php 
    require_once("./includes/footer.php");
?>