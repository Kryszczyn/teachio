<?php
  session_start();
  $pageTitle = "Uwagi";
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
  <script src="./../node_modules/@fortawesome/fontawesome-free/js/brands.js"></script>
  <script src="./../node_modules/@fortawesome/fontawesome-free/js/solid.js"></script>
  <script src="./../node_modules/@fortawesome/fontawesome-free/js/fontawesome.js"></script>
  <link rel="stylesheet" href="./assets/css/calendar.css">
  <link rel="stylesheet" href="./assets/css/theme.css">
  <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <?php include_once './sidebar.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include_once './navbar.php'; ?>

    <div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-2">
         <button type="button" class="btn btn-info">Napisz</button>
        </div>
        <div class="col-md-2">
         <button type="button" class="btn btn font-weight-bold" style="background-color: #F2F2F2;">Usuń zaznaczone</button>
        </div>
        <div class="col-md-2">
            <select class="form-select p-2 form-select-sm" aria-label=".form-select-sm example">
                <option selected>Więcej poleceń...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-center mb-3" style="text-align: right">
            <p class="m-0">Pokaż tylko wiadomości od nadawcy</p>
        </div>
        <div class="col-md-3" style="text-align: right">
            <select class="form-select p-2 form-select-sm" aria-label=".form-select-sm example">
                <option selected>Wszyscy użytkownicy...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 d-flex flex-column justify-content-center">
            <div class="d-flex align-items-center ">
                <i class="fa-solid fa-envelope" style="color:black;"></i>
                <p class="m-0" style="padding-left:5px;">Odebrane(2)</p>
            </div>
            <div class="d-flex align-items-center ">
                <i class="fa-solid fa-envelope-circle-check" style="color:black;"></i>
                <p class="m-0" style="padding-left:5px;">Wysłane</p>
            </div>
            <div class="d-flex align-items-center ">
                <i class="fa-solid fa-trash" style="color:black;"></i>
                <p class="m-0" style="padding-left:5px;">Kosz</p>
            </div>
            <div class="d-flex align-items-center ">
                <i class="fa-solid fa-folder" style="color:black;"></i>
                <p class="m-0" style="padding-left:5px;">Archiwum</p>
            </div>
        </div>
        <div class="col-md-10">
        <div class="d-flex flex-column">
            <div class="row" style="background-color: #F2F2F2;">
                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1" style="border-radius: 5px 0px 0px 0px;">
                    <input type="checkbox" name="" id="">
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Nadawca</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Temat</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Wysłano</p>
                </div>

                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1" style="border-radius: 0px 5px 0px 0px;">
                </div>
            </div>
            <div class="row bg-white">
                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <input type="checkbox" name="" id="">
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><b>Hubert Fiołek</b></p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><b>Program wycieczki</b></p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><b>2022-02-09 11:24:31</b></p>
                </div>

                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <i class="fa-solid fa-trash" style="color:black;"></i>
                </div>
            </div> 
            <div class="row bg-white">
                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <input type="checkbox" name="" id="">
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><b>Grzegorz Hober</b></p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><b>Mikołajki</b></p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold"><b>2022-11-16 12:55:34</b></p>
                </div>

                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <i class="fa-solid fa-trash" style="color:black;"></i>
                </div>
            </div> 
            <div class="row bg-white">
                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <input type="checkbox" name="" id="">
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Renata Jasińska</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Skup książek do biblioteki</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">2022-11-20 09:46:06</p>
                </div>

                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <i class="fa-solid fa-trash" style="color:black;"></i>
                </div>
            </div> 
            <div class="row bg-white">
                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <input type="checkbox" name="" id="">
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Monika Nowak</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Szczegółowy harmonogram</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">2021-09-07 13:16:23</p>
                </div>

                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <i class="fa-solid fa-trash" style="color:black;"></i>
                </div>
            </div> 
            <div class="row bg-white">
                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <input type="checkbox" name="" id="">
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Monika Nowak</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">Lista podręczników 2021/2022</p>
                </div>

                <div class="col-md-3 border d-flex justify-content-center align-items-center m-0 py-1">
                    <p class="m-0 font-weight-bold">2022-08-14 14:23:12</p>
                </div>

                <div class="col-md border d-flex justify-content-center align-items-center m-0 py-1">
                    <i class="fa-solid fa-trash" style="color:black;"></i>
                </div>
            </div> 
            <div class="row" style="background-color: #F2F2F2;">
            <div class="col-md-15 border d-flex justify-content-center align-items-center m-0 py-3" style="border-radius: 0px 0px 5px 5px;"></div>
            </div>
        </div>
    </div>
        

    <?php
        $tempColorArr = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger'];
        foreach($allSub as $k)
        {
            $avgSubject = 0;
            $sum = 0;
            echo '<div class="row">
            <div class="col-md-3 border m-0 p-0 d-flex align-items-center justify-content-center">';
                echo '<p class="m-0 font-weight-bold" data-toggle="tooltip" data-placement="top" title="'.$k['description'].'">' . $k['name'] . '</p>';
            echo '</div>
            <div class="col-md-3 d-flex m-0 p-0">
                <div class="col-md-6 d-flex border align-align-items-center flex-wrap">';
                    foreach($allGrade as $k2)
                    {
                        if($k['id'] == $k2['subject_id'])
                        {
                            echo '<div class="m-2 border note_item d-flex align-items-center justify-content-center rounded '. $tempColorArr[rand(0, 3)] .'"><p class="m-0 text-white">'.$k2['name'].'</p></div>';
                            $avgSubject += (int)$k2['name'];
                            $sum++;
                        }
                    }
                echo '</div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div><p class="m-0">' . (float)($avgSubject/$sum) . '</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">4+</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">5</p></div>
                </div>
            </div>
            <div class="col-md-3 d-flex m-0 p-0">
                <div class="col-md-6 d-flex border flex-wrap">
                    <div class="m-2 border note_item d-flex align-items-center justify-content-center rounded '. $tempColorArr[rand(0, 3)] .'"><p class="m-0 text-white">5</p></div>
                    <div class="m-2 border note_item d-flex align-items-center justify-content-center rounded '. $tempColorArr[rand(0, 3)] .'"><p class="m-0 text-white">4+</p></div>
                    <div class="m-2 border note_item d-flex align-items-center justify-content-center rounded '. $tempColorArr[rand(0, 3)] .'"><p class="m-0 text-white">6</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div><p class="m-0">5.17</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">4+</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">5</p></div>
                </div>
            </div>
            <div class="col-md d-flex m-0 p-0">
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div><p class="m-0">5.17</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">4+</p></div>
                </div>
                <div class="col-md border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">5</p></div>
                </div>
            </div>
            </div>';
            
        }
    ?>
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
  <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>

</html>