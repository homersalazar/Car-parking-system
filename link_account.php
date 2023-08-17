<?php 
    require_once("./includes/header.php");
?>
    <div class="flex flex-col justify-center items-center h-screen gap-3 overflow-x-hidden">
        <div class="font-bold text-4xl py-10">
            <h1>Let's you in</h1>
        </div>
        <div class="border-2 px-10 py-2 font-semibold text-center rounded-xl hover:bg-blue-600 hover:text-white">
            <a href="">
                <i class="fa-brands text-blue-700 text-2xl fa-facebook"></i> <span class="text-xl">Continue with Facebook</span>
            </a>
        </div>
        <div class="border-2 px-[3.2rem] py-2 font-semibold text-center rounded-xl hover:bg-blue-600 hover:text-white">
            <a href="">
                <i class="fa-brands text-red-600 text-2xl fa-google"></i> <span class="text-xl">Continue with Google</span>
            </a>
        </div>
        <div class="border-2 px-[3.8rem] py-2 font-semibold text-center rounded-xl hover:bg-blue-600 hover:text-white">
            <a href="">
                <i class="fa-brands text-black text-2xl fa-apple"></i> <span class="text-xl">Continue with Apple</span>
            </a>
        </div>
        <div class="text-xl">
            or
        </div>
        <a href="login.php" class="px-[5.5rem] py-3 bg-blue-700 rounded-full text-white mb-12">
            Sign in with password
        </a>
        <div>
            <span>Dont have an account?</span> <a class="text-blue-700 hover:underline" href="register.php">Sign up</a>
        </div>
    </div>
<?php 
    require_once("./includes/footer.php");
?>