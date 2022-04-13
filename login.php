<?php
    session_start();
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
    {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Teachio</title>
    <script src="https://kit.fontawesome.com/11ba98b91b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/assets/css/main.css">
</head>
<body>
    <main class="vh-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
            <div class="col-md-6 px-0 d-none d-md-block h-100">
                    <video class="w-100 h-100" style="object-fit: cover; object-position: left;" autoplay muted loop>
                        <source src="./public/assets/video/login_page_video.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-md-6 text-black">
                    <div class="p-5 ms-xl-4">
                        <img class="h1 fw-bold mb-0" src="./public/assets/img/full_logo.svg" alt="logo">
                    </div>
                    <div class="d-flex flex-column justify-content-center h-custom-2 px-5 ms-xl-4 pt-5 pt-xl-0 ">
                        <hr>
                        <p class="fs-3 text-center">Zaloguj się jako:</p>
                        <div class="d-lg-flex align-items-center justify-content-center">
                            <!--
                            <div class="login_type rounded-pill border border-primary py-1 px-2 m-1 text-primary text-center" style="cursor:pointer;">
                                <span>Superadministrator</span>
                            </div>
                            -->
                            <div class="login_type rounded-pill border border-primary py-1 px-2 m-1 text-primary text-center" style="cursor:pointer;" data-usertype="admin">
                                <span>Administrator</span>
                            </div>
                            <div class="login_type rounded-pill border border-primary py-1 px-2 m-1 text-primary text-center" style="cursor:pointer;" data-usertype="teacher">
                                <span>Nauczyciel</span>
                            </div>
                            <div class="login_type rounded-pill border border-primary py-1 px-2 m-1 text-primary text-center" style="cursor:pointer;" data-usertype="student">
                                <span>Uczeń</span>
                            </div>
                            <div class="login_type rounded-pill border border-primary py-1 px-2 m-1 text-primary text-center" style="cursor:pointer;" data-usertype="parent">
                                <span>Rodzic</span>
                            </div>
                        </div>
                        <hr>
                        <form>
                            <h3 class="fw-normal " style="letter-spacing: 1px;">Zaloguj się</h3>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control login_input" id="floatingInput" placeholder="login@teachio.pl" disabled>
                                <label for="floatingInput">Adres email</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control pwd_input" id="floatingPassword" placeholder="Hasło" disabled>
                                <label for="floatingPassword">Hasło</label>
                            </div>
                            <div class="pt-1 my-4">
                                <button class="btn btn-lg btn-outline-primary login_btn" type="button" disabled>Zaloguj</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./public/assets/js/notify.min.js"></script>
    <script src="./public/assets/js/login.js"></script>
</body>
</html>