<?php
  session_start();
  $pageTitle = "Frekwencja";
  if(empty($_SESSION))
    {
      header('Location: ../login.php'); 
    }
  error_reporting(0);
  include './../private/functions.php';
  include './../private/class/DatabaseConnect.php';
  $typeUser = $_SESSION['type'];

  switch($typeUser){
    case "admin":
      include './../private/class/Admin.php';
      $user = new Admin();
      $userData = $user->load_admin('*', $_SESSION['user_id']);
      break;
    case "student":
      include './../private/class/Student.php';
      $user = new Student();
      $userData = $user->load_student('*', $_SESSION['user_id']);
      break;
    case "parent":
      include './../private/class/Parent.php';
      $user = new Parent2();
      $userData = $user->load_parent('*', $_SESSION['user_id']);
      break;
    case "teacher":
      include './../private/class/Teacher.php';
      $user = new Teacher();
      $userData = $user->load_teacher('*', $_SESSION['user_id']);
      break;
    default:
      return 0;
  }

  //r2($userData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>Teachio</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/calendar.css">
  <link rel="stylesheet" href="./assets/css/theme.css">
  <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <?php include_once './sidebar.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include_once './navbar.php'; ?>

    <div class="container-fluid py-4">

      <div class="bg-white p-2 border-radius-xl shadow-blur mx-0" > <!--conteinajner-->
        <div class="row mx-0" > <!--dni tygodnia kolumna-->
        <div class="col-2 py-4 border rounded d-flex align-items-center justify-content-center plan_background ">
            <p class="fw-bold m-0 text-white">Data</p>
          </div>
          <div class="col-6 py-4 border rounded d-flex flex-column align-items-center justify-content-center plan_background">

            <div class="py-2 d-flex  align-items-center justify-content-center">  
          <p class="fw-bold m-0  text-white">Nr leckji</p>
            </div>
         <div class="d-flex w-90 justify-content-between">   
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border border-dark plan_col(n)" style="min-width: 50px">
            <p class="fw-bold m-0" >1</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">2</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">3</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">4</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">5</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">6</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">7</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">8</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">9</p>
          </div> 
        </div>
          </div>
          <div class="col-1 py-4 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Razem NB</p>
          </div>
          <div class="col-1 py-4 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Razem U</p>
          </div>
          <div class="col-1 py-4 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Razem SP</p>
          </div>
          <div class="col-1 py-4 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Razem ZW</p>
          </div>
          
        </div>
        <div class="row mx-0"> <!--715-800 kolumna-->
          <div class="col-12 py-4 border rounded d-flex flex-column align-items-center justify-content-center plan_background_2">
            <p class="fw-bold m-0 text-white">Semestr 1</p>
          </div> 
        </div>
        <div class="row mx-0"> <!--kolumna nieobecnosci-->
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">02.05.2022</p>
          </div> 
          <div class="col-6 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
          <div class="d-flex w-90 justify-content-between"> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
          <div class=" py-2 border rounded d-flex align-items-center justify-content-center border-dark plan_col(n)"style="min-width: 50px">
            <p class="fw-bold m-0">-</p>
          </div> 
        </div>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div>
        </div>
        <div class="row mx-0"> <!--kolumna sumujaca semestr-->
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background_2">
            
          </div> 
          <div class="col-6 py-2 border rounded d-flex align-items-center justify-content-end plan_col">
          <p class="fw-bold m-0">Suma za semestr: </p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div>
        </div>
        <div class="row mx-0"> <!--kolumna sumujaca NB i U semestr-->
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background_2">
            
          </div> 
          <div class="col-6 py-2 border rounded d-flex align-items-center justify-content-end plan_col">
          <p class="fw-bold m-0">Razem nieobecności w semestrze: </p>
          </div> 
          <div class="col-2 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0">0</p>
          </div> 
          
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            
          </div>
        </div>

        
        </div>
        <div class="col-12 py-4 d-flex flex-column align-items-center justify-content-center ">
          <div class="">
        <h2 class="fw-bold m-0">Legenda </h2>
         
      </div>
       </div>
        <div class=" d-flex align-items-center  w-70 justify-content-between ">
        <h4 class="m-0">NB - nieobecność </h4>
        <h4 class="m-0">U - usprawiedliwione </h4>
        <h4 class="m-0">SP - spóźnienie </h4>
        <h4 class="m-0">ZW - zwolnienie </h4>
        </div> 
      

      
        

    </div>
  </main>

  <script src="./../node_modules/jquery/dist/jquery.min.js"></script>
  
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="./assets/js/soft-ui-dashboard.js"></script>
  <script src="./assets/js/moment.min.js"></script>
  <script type="module" src="./assets/js/main.js"></script>
</body>

</html>