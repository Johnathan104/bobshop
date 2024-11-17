<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
?>


<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php#page-top">Bob's Hardware Diagnosis</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#survey">Survey</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#gallery">Gallery</a></li>
                        <?php
                            if (isset($_SESSION['email'])){
                                if ($_SESSION['email']== "jamesjayawara@gmail.com"){
                                    echo '<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>