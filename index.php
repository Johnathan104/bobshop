<?php
    session_start();
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL);

    include('config/conn_db.php');

    // Periksa apakah pengguna sudah login atau belum
    $isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'static/head.php'; ?>
</head>
<body id="page-top">
    <!-- Navigation-->
    <?php include 'static/nav.php'; ?>
    
    <?php if (!$isLoggedIn): ?>
        <!-- Tampilkan hanya bagian login jika pengguna belum login -->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center ">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Welcome</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Please login to access more features.</h2>
                        <a class="btn btn-primary" href="#login">Get Started</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Login Section-->
        <?php include "./sections/loginSection.php"; ?>

    <?php else: ?>
        <!-- Jika sudah login, sembunyikan login section dan tampilkan section lainnya -->

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center ">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Welcome</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">A free, online hardware diagnostic tool for your computer.</h2>
                        <a class="btn btn-primary" href="#about">Get Started</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 ">
                        <h2 class="text-white about-content mb-4">Got any hardware issues?</h2>
                        <p class="text-white-50 about-content">
                            Has your computer been malfunctioning lately? Well, you can use our free online diagnostic tool to see what exactly is wrong with your computer 
                            and what to do when you know the problem.
                        </p>
                    </div>
                </div>
                <div class="about-content">
                    <img class="img-motherboard" src="assets/img/motherboard.png" alt="..." />
                </div>
            </div>
        </section>

        <!-- Survey Section-->
        <?php include "./sections/surveySection.php"; ?>

        <!-- Contact Section-->
        <?php include "./sections/contactSection.php"; ?>

        <!-- Gallery Section-->
        <?php include "./sections/gallerySection.php"; ?>

    <?php endif; ?>

    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2024</div>
    </footer>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/animate.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
        $(document).ready(function() {
            $(".mr-auto .nav-item").bind("click", function(event) {
                event.preventDefault();
                var clickedItem = $(this);
                $(".mr-auto .nav-item").each(function() {
                    $(this).removeClass("active");
                });
                clickedItem.addClass("active");
            });
        });
    </script>
</body>
</html>
