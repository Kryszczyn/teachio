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
  include './../private/class/Comments.php';
  include './../private/class/Student.php';
  include './../private/class/Teacher.php';
  $typeUser = $_SESSION['type'];

  switch($typeUser){
    case "admin":
      include_once './../private/class/Admin.php';
      $user = new Admin();
      $userData = $user->load_admin('*', $_SESSION['user_id']);
      break;
    case "student":
      include_once './../private/class/Student.php';
      $user = new Student();
      $userData = $user->load_student('*', $_SESSION['user_id']);
      break;
    case "parent":
      include_once './../private/class/Parent.php';
      $user = new Parent2();
      $userData = $user->load_parent('*', $_SESSION['user_id']);
      break;
    case "teacher":
      include_once './../private/class/Teacher.php';
      $user = new Teacher();
      $userData = $user->load_teacher('*', $_SESSION['user_id']);
      break;
    default:
      return 0;
  }

  $students = new Student();
  $all_students = $students->load_all_student();

  $teachers = new Teacher();
  $all_teachers = $teachers->load_all_teacher();

  $comments = new Comments();
  $allComments = $comments->load_all_comments();
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

    <div class="container-fluid py-4 shadow-blur">

      <?php
        if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'teacher')
        {
          echo '<div class="col-4">
            <button type="button" class="modal-open btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-type="DODAJ_UWAGE" data-refresh="0" data-values=""  data-bs-target="#modal">Dodaj Uwagę</button>
          </div>';
        }
      ?>
      
      <div class=" p-2 border-radius-xl  mx-0" >
        <div class="row mx-0" >
          <div class="col-2 py-4  border rounded d-flex align-items-center justify-content-center plan_background ">
            <p class="fw-bold m-0 text-white">Data</p>
          </div>
          <div class="col-9 py-4 border rounded d-flex  align-items-center justify-content-center plan_background">
            <div class="py-2 d-flex  align-items-center justify-content-center">  
              <p class="fw-bold m-0  text-white">Nazwa Uwagi</p>
            </div>
          </div>
          <div class="col-1 py-4 border rounded d-flex align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white">Punkty</p>
          </div>        
        </div>
        
        <?php foreach($allComments as $k => $v): ?>
          
            <div class="row mx-0 ">
              <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
                <p class="fw-bold m-0 text-white"><?php echo $v['date'] ?></p>
              </div> 
              <div class="col-9 py-2 border rounded d-flex align-items-center plan_col">
                <p class="fw-bold m-0 me-1 align-items-start "><?php echo $v['name'] ?></p>
                <a class="d-flex align-items-center" href="uwagi_opis.php?idc=<?php echo $v['id'] ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Zobacz uwagę">
                  <i class="fa-solid fa-angles-right icon_color"></i>
                </a>
                
              </div>
              <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
                <p class="fw-bold m-0"><?php echo $v['value'] ?></p>
              </div>
            </div>
        <?php endforeach; ?>
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
  <script src="./assets/js/notify.min.js"></script>
  <script type="module" src="./assets/js/main.js"></script>
  <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>

</html>