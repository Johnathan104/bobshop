<?php
    session_start();
    include('config/conn_db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include "./static/head.php"?>
<body>
    <?php include "./static/nav.php"?>
    <div class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center ">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Welcome</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Please login to access more features.</h2>
                        <a class="btn btn-primary" href="#login">Get Started</a>
                    </div>
                </div>
            </div>
</div>
    <div>
        <?php include "./sections/addSection.php"?>
    </div>
    <div>
        <?php include "./sections/updateSection.php"?>
    </div>
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