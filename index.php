<?php

require_once 'api/db.php';

header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; img-src 'self' data: https://raw.githubusercontent.com https://github.com; font-src 'self' https://cdn.jsdelivr.net;");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("Referrer-Policy: no-referrer");

session_start();

$session_id = session_id();

$user =  $_SESSION['user'] ?? '';
$username =  $user['username'] ?? '';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic authentication in PHP</title>

    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous" defer></script>

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="./assets/style.css">

    <script src="assets/validate.js" type="module" defer></script>
    <script src="assets/main.js" defer></script>

</head>

<body>
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo on the left -->
            <a class="navbar-brand" href="#">
                <img src="https://github.com/mahmud-r-farhan/Front-End-Projects/blob/master/food%20services%20templete%20by%20bootstrap/assets/img/logo.png?raw=true" alt="company Logo" width="30" height="30" class="d-inline-block align-text-top">
                Company Co.
            </a>

            <!-- пустой бесполезный коммент -->
            <!-- пустой бесполезный коммент -->

            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Profile icon on the right -->
            <div class="navbar-nav">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if (empty($_SESSION['user'])): ?>
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                            <?php else: ?>
                                <a class="nav-link active" aria-current="page" href="api/logout.php">Logout</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="user">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        <span> <?= htmlspecialchars($username)  ?> </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    </br></br></br></br></br>
    <!-- Body Section -->
    <div class="container text-center">

        <div class="output">
            <?php
            if (!empty($_SESSION['users'])) {
                print_r($_SESSION['users']);
            }

            echo "<p>Session id: <b>$session_id</b></p>";
            ?>
        </div>
    </div>

    <h1 class="text-center">Playwright</h1>

    <!-- Loader -->
    </br></br></br></br></br>
    <div class="loader"></div>
    </br></br></br></br></br>

    <!-- Animation by  alexruix-->

    <!--footer section-->
    <footer>
        <div class="container footer">
            <div class="row mb-4 align-items-center">
                <!-- Left side - Logo -->
                <div class="col-md-3 mb-3 mb-md-0">
                    <a href="#" class="d-flex align-items-center text-decoration-none">
                        <img src="https://github.com/mahmud-r-farhan/Front-End-Projects/blob/master/food%20services%20templete%20by%20bootstrap/assets/img/logo.png?raw=true" alt="Catering Logo" width="40" height="40" class="me-2">
                        <span class="fs-4 text-dark">Company Co.</span>
                    </a>
                </div>

                <!-- Center - Navigation -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a href="#mainNavbar" class="nav-link px-2 text-muted">Home</a></li>
                        <li class="nav-item"><a href="..." class="nav-link px-2 text-muted">Contact</a></li>

                        <li class="nav-item"><a href="..." class="nav-link px-2 text-muted">About US</a></li>
                        <li class="nav-item"><a href="..." class="nav-link px-2 text-muted">FAQ</a></li>
                    </ul>
                </div>

                <!-- Right side - About text -->
                <div class="col-md-3 py-4">
                    <h5 class="text-dark">About Us</h5>
                    <p class="text-muted footer-about">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                </div>

                <!-- Social Media Icons -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <a href="#" class="text-muted me-3"><i class="bi bi-facebook"></i><span class="visually-hidden">Facebook</span></a>
                        <a href="#" class="text-muted me-3"><i class="bi bi-instagram"></i><span class="visually-hidden">Instagram</span></a>
                        <a href="#" class="text-muted"><i class="bi bi-twitter"></i><span class="visually-hidden">Twitter</span></a>
                    </div>
                </div>

                <!-- Horizontal line -->
                <hr class="my-4">

                <!-- Copyright text -->
                <div class="row">
                    <div class="col-12 text-center">

                        <p class="text-muted">&copy; <script>
                                document.write(new Date().getFullYear())
                            </script> Company Co. All rights reserved.</p>
                    </div>
                </div>
            </div>
    </footer>

</body>

</html>