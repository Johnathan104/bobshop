<section class="my-5" id="login">
    <div id="loginBox" class="container hidden text-white bg-black p-4">
        <div class="d-flex flex-column align-items-center">
            <h1>Login</h1>
        </div>
        <div class="py-3">
            <form action="pages/login.php" method="POST">
                <div class="row my-5">
                    <span>Email</span>
                    <div class="input-group">
                        <span class="input-group-text" id="emailAddress1"><i class="far fa-envelope text-black-50"></i></span>
                        <input class="form-control p-3" name="email" type="email" placeholder="Enter email address..." required />
                    </div>
                </div>
                <div class="row my-5">
                    <span>Password</span>
                    <div class="input-group">
                        <span class="input-group-text" id="1"><i class="fa-solid fa-key text-black-50"></i></span>
                        <input class="form-control p-3" name="password" type="password" placeholder="password" required />
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <span id="loginSwitch" class="text-white-50 mt-3">Don't have an account? <a href="#signupBox">Sign up here!</a></span>
            </form>
        </div>
    </div>

    <div id="signupBox" class="container hidden text-white bg-black p-4">
        <div class="d-flex flex-column align-items-center">
            <h1>Signup</h1>
        </div>
        <div class="py-3">
            <form action="pages/signup.php" method="POST">
                <div class="row my-5">
                    <span>Email</span>
                    <div class="input-group">
                        <span class="input-group-text" id="emailAddress1"><i class="far fa-envelope text-black-50"></i></span>
                        <input class="form-control p-3" name="email" type="email" placeholder="Enter email address..." required />
                    </div>
                </div>
                <div class="row my-5">
                    <span>Password</span>
                    <div class="input-group">
                        <span class="input-group-text" id="1"><i class="fa-solid fa-key text-black-50"></i></span>
                        <input class="form-control p-3" name="password" type="password" placeholder="password" required />
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <input type="submit" class="btn btn-primary" value="Sign Up">
                </div>
                <span id="signupSwitch" class="text-white-50 mt-3">Already have an account? <a href="#loginBox">Login here!</a></span>
            </form>
        </div>
    </div>
</section>
