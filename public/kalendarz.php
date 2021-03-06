<?php
  session_start();
  $pageTitle = "Kalendarz";
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
      <?php
      if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'teacher')
      {
        echo '<div class="col-md-4">
                <button type="button" class="modal-open btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-type="DODAJ_WYDARZENIE_KALENDARZ" data-refresh="1" data-values="" data-bs-target="#modal">Dodaj wydarzenie</button>
              </div>';
      }
      ?>
      <div class="col-md-12 bg-white border-radius-xl shadow-blur" id="calendar"></div>

      
        

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
  <script type="module" src="./assets/js/notify.min.js"></script>
  <script type="module" src="./assets/js/main.js"></script>
  <script type="module">
    //Initialize calendar
    import {Calendar} from './assets/js/calendar.js';
    import Modal from './assets/js/modal.js';
    $(function(){
      $.ajax({
        type: 'POST',
        url: './../teachio_service.php',
        data: 'type=INIT_CALENDAR',
        success: function(data){
          let obj = JSON.parse(data);

          const cal = Calendar('calendar');
          cal.bindData(obj);
          cal.render();
          
        },
        error: function(data){
          console.log(data);
        },
        complete: function(data){
          $('.event').tooltip();
          $('.modal-open').on('click', function(){
            let modal = new Modal($('.modal-content'), $(this));
            modal.openModal();
          })
        }
      })
    })
  </script>
  
</body>

</html>