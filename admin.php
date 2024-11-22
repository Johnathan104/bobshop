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
                        <h1 class="mx-auto my-0 text-uppercase">Admin section</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">What do you want to do?.</h2>
                        <a class="btn btn-primary" href="#addSection"id="add_button">Add</a>
                        <a class="btn btn-warning" href="#updateSection" id="update_button">Update</a>
                    </div>
                </div>
            </div>
</div>
    <div id="tables" class="container my-5">
        <h1 class="mt-3"> Table Gejala</h1>
        <?php include "./backend/tableGejala.php"?>
        <h1 class="mt-3">Table Rules</h1>
        <?php include "./backend/tableRules.php"?>
        <h1 class="mt-3">Table Masalah</h1>
        <?php include "./backend/tableMasalah.php"?>
    </div>
    
    <div id="addSection">
        <div class ="hidden-fade">
            <?php include "./sections/addSection.php"?>
        </div>
    </div>
    
    <div id="updateSection">
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
