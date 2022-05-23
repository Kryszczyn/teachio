<?php
  session_start();
  $pageTitle = "Frekwencja";
  if(empty($_SESSION))
    {
      header('Location: ../login.php'); 
    }
  error_reporting(1);
  include './../private/functions.php';
  include './../private/class/DatabaseConnect.php';
  include './../private/class/Attendace.php';

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

  $attendance = new Attendance();
  $allAttendance = $attendance->load_custom_attendance("1=1 ORDER BY date_attendance");

  $generatedAttendance = generate_attendance_obj($allAttendance);
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

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <?php include_once './navbar.php'; ?>
    <div class="container-fluid py-4">
      <?php
        if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'teacher')
        {
          echo '<div class="col-4">
            <button type="button" class="modal-open btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-type="DODAJ_FREKWENCJE" data-refresh="0" data-values="" data-bs-target="#modal">Dodaj frekwencje</button>
          </div>';
        }
      ?>
      <div class="bg-white p-2 border-radius-xl shadow-blur mx-0" > 
        <div class="row mx-0" > 
          <div class="col-2 py-4 border rounded d-flex align-items-center justify-content-center plan_background ">
            <p class="fw-bold m-0 text-white">Data</p>
          </div>
          <div class="col-6 py-4 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <div class="py-2 d-flex align-items-center justify-content-center">  
              <p class="fw-bold m-0 text-white">Nr leckji</p>
            </div>
            <div class="d-flex w-90 justify-content-between">
              <?php 
                for($i = 1; $i<=9; $i++)
                {
                  echo '<div class="py-2 px-3 rounded d-flex align-items-center justify-content-center border border-dark" style="min-width: 50px">
                          <p class="fw-bold m-0">'.$i.'</p>
                        </div> ';
                }
              ?>
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
        <div class="row mx-0"> 
          <div class="col-12 py-4 border rounded d-flex flex-column align-items-center justify-content-center plan_background_2">
            <p class="fw-bold m-0 text-white">Semestr 1</p>
          </div> 
        </div>

        <?php
          $counterArr = array(
            'singleNBArr' => 0,
            'singleUArr' => 0,
            'singleSPArr' => 0,
            'singleZWArr' => 0,
            'sumNB' => 0,
            'sumU' => 0,
            'sumSP' => 0,
            'sumZW' => 0
          );
          foreach($generatedAttendance as $k => $v):
            $counterArr['singleNBArr'] = 0;
            $counterArr['singleUArr'] = 0;
            $counterArr['singleSPArr'] = 0;
            $counterArr['singleZWArr'] = 0;
        ?>

        <div class="row mx-0"> 
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background">
            <p class="fw-bold m-0 text-white"><?php echo $k; ?></p>
          </div> 
          <div class="col-6 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <div class="d-flex w-90 justify-content-between"> 
              <?php foreach($v->values as $k2 => $v2): ?>
              <?php
                switch ($v2) {
                  case '1':
                    $v2 = 'NB';
                    $counterArr['singleNBArr']++;
                    $bgColor = 'bg-danger';
                    break;
                  
                  case '2':
                    $v2 = 'U';
                    $counterArr['singleUArr']++;
                    $bgColor = 'bg-warning';
                    break;
                  
                  case '3':
                    $v2 = 'SP';
                    $counterArr['singleSPArr']++;
                    $bgColor = 'bg-success';
                    break;
                  
                  case '4':
                    $v2 = 'ZW';
                    $counterArr['singleZWArr']++;
                    $bgColor = 'bg-info';
                    break;
                  
                  default:
                    $v2 = '-';
                    $bgColor = '';
                    break;
                }
                
              ?>
              <div class="py-2 px-3 d-flex align-items-center justify-content-center border rounded border-dark <?php echo $bgColor; ?>" style="min-width: 50px">
                <?php
                  if($v2 != '-')
                  {
                    echo '<p class="fw-bold m-0 text-white">' . $v2 . '</p>';
                  }
                  else
                  {
                    echo '<p class="fw-bold m-0 text-white">-</p>';
                  }
                ?>
              </div> 
              <?php endforeach; ?>
            </div>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['singleNBArr']; ?></p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['singleUArr']; ?></p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['singleSPArr']; ?></p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['singleZWArr']; ?></p>
          </div>
        </div>
        
        <?php 
          $counterArr['sumNB'] += $counterArr['singleNBArr'];
          $counterArr['sumU'] += $counterArr['singleUArr'];
          $counterArr['sumSP'] += $counterArr['singleSPArr'];
          $counterArr['sumZW'] += $counterArr['singleZWArr'];
          endforeach; 
        ?>

        <div class="row mx-0">
          <div class="col-2 py-2 border rounded d-flex flex-column align-items-center justify-content-center plan_background_2"></div> 
          <div class="col-6 py-2 border rounded d-flex align-items-center justify-content-end plan_col">
            <p class="fw-bold m-0">Suma za semestr: </p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['sumNB']; ?></p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['sumU']; ?></p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['sumSP']; ?></p>
          </div> 
          <div class="col-1 py-2 border rounded d-flex align-items-center justify-content-center plan_col">
            <p class="fw-bold m-0"><?php echo $counterArr['sumZW']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-12 py-4 d-flex flex-column align-items-center justify-content-center">
        <div>
          <h2 class="fw-bold m-0">Legenda</h2>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-center">
        <p class="h4 m-0 mx-2">NB - nieobecność</p>
        <p class="h4 m-0 mx-2">U - usprawiedliwione</p>
        <p class="h4 m-0 mx-2">SP - spóźnienie</p>
        <p class="h4 m-0 mx-2">ZW - zwolnienie</p>
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