<?php
  session_start();
  $pageTitle = "Oceny";
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
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <?php include_once './sidebar.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include_once './navbar.php'; ?>

    <div class="container-fluid py-4">
        
        <div class="d-flex flex-column"><!--kontener_oceny--> 
            <div class="row">
                <div class="col-md-3">
                    <p>Przedmiot</p>
                </div>
                <div class="col-md-3 d-flex flex-column">
                    <div class="w-100">
                        <p>Okres 1</p>
                    </div>
                    <div class="w-100 d-flex">
                        <div class="col-md-6"><p>Oceny bieżące</p></div>
                        <div class="col-md-2"><p>Śr. I</p></div>
                        <div class="col-md-2"><p>(I)</p></div>
                        <div class="col-md-2"><p>I</p></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="w-100">
                        <p>Okres 2</p>
                    </div>
                    <div class="w-100 d-flex">
                        <div class="col-md-6"><p>Oceny bieżące</p></div>
                        <div class="col-md-2"><p>Śr. II</p></div>
                        <div class="col-md-2"><p>(II)</p></div>
                        <div class="col-md-2"><p>II</p></div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="w-100">
                        <p>Koniec roku</p>
                    </div>
                    <div class="w-100 d-flex">
                        <div class="col-md"><p>Śr. R</p></div>
                        <div class="col-md"><p>(R)</p></div>
                        <div class="col-md"><p>R</p></div>
                    </div>
                </div>
            </div>



        <div class="row">
            <div>
                <p>Biologia</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Chemia</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Fizyka</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Geografia</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Historia</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Informatyka</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Język angielski</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Język polski</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Matematyka</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Wychowanie fizyczne</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>
        <div class="row">
            <div>
                <p>Zachowanie</p>
            </div>
            <div>
                <div><p>5</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>

            <div>
                <div><p>3+</p></div>
                <div><p>4+</p></div>
                <div><p>6</p></div>
            </div>
            <div><p>5.17</p></div>
            <div>
                <div><p>4+</p></div>
            </div>
            <div>
                <div><p>5</p></div>
            </div>
            
            <div>
                <div><p>5.17</p></div>
                <div>
                    <div><p>5</p></div>
                </div>
                <div>
                    <div><p>5</p></div>
             </div>
            </div>
        </div>

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