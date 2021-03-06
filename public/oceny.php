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
  include './../private/class/Subject.php';
  include './../private/class/SubjectGrade.php';
  include './../private/class/SubjectTeacher.php';
  include './../private/class/Grade.php';

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

  $subject = new Subject();
  $allSub = $subject->load_all_subject();

  $grade = new Grade();
  $allGrade = $grade->load_all_grade();

  $subjectGrade = new SubjectGrade();
  $allSubGrade = $subjectGrade->load_all_subjectGrade();

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

    <div class="container-fluid py-4 ">
    <?php
      if($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'teacher')
      {
        echo '<div class="col-4">
                <button type="button" class="modal-open btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-type="DODAJ_OCENE" data-refresh="0" data-values="" data-bs-target="#modal">Dodaj ocen??</button>
              </div>';
      }

      ?>
        
        <div class="d-flex flex-column blur shadow-blur"><!--kontener_oceny--> 
            <div class="row">
                <div class="col-3 border d-flex justify-content-center align-items-center m-0 p-0 bg-white" style="border-radius: 5px 0 0 0;">
                    <p class="m-0 font-weight-bold">Przedmiot</p>
                </div>
                <div class="col-3 d-flex flex-column m-0 p-0 bg-white">
                    <div class="col w-100 border d-flex align-items-center justify-content-center">
                        <p class="m-0 font-weight-bold">Okres 1</p>
                    </div>
                    <div class="w-100 d-flex col">
                        <div class="col-6 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">Oceny bie????ce</p></div>
                        <div class="col-2 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">??r. I</p></div>
                        <div class="col-2 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">(I)</p></div>
                        <div class="col-2 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">I</p></div>
                    </div>
                </div>

                <div class="col-3 m-0 p-0 d-flex flex-column bg-white">
                    <div class="col w-100 border d-flex align-items-center justify-content-center">
                        <p class="m-0 font-weight-bold">Okres 2</p>
                    </div>
                    <div class="col w-100 d-flex">
                        <div class="col-6 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">Oceny bie????ce</p></div>
                        <div class="col-2 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">??r. II</p></div>
                        <div class="col-2 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">(II)</p></div>
                        <div class="col-2 border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">II</p></div>
                    </div>
                </div>

                <div class="col m-0 p-0 d-flex flex-column bg-white" style="border-radius: 0 5px 0 0;">
                    <div class="col w-100 border d-flex align-items-center justify-content-center">
                        <p class="m-0 font-weight-bold">Koniec roku</p>
                    </div>
                    <div class="col w-100 d-flex">
                        <div class="col border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">??r. R</p></div>
                        <div class="col border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">(R)</p></div>
                        <div class="col border d-flex align-items-center justify-content-center"><p class="m-0 font-weight-bold">R</p></div>
                    </div>
                </div>
            </div>

    <?php
        foreach($allSub as $k => $v)
        {
            $avgSubject = 0;
            $sum = 0;
            $bRadiusLeft = '';
            $bRadiusRight = '';
            if(array_key_last($allSub) == $k)
            {
                $bRadiusLeft = 'style="border-radius: 0 0 0 5px;"';
                $bRadiusRight = 'style="border-radius: 0 0 5px 0;"';
            }

            echo '<div class="row">
            <div class="col-3 border m-0 p-0 py-2 d-flex align-items-center justify-content-center bg-white" '.$bRadiusLeft.'>';
                echo '<p class="m-0 font-weight-bold" data-toggle="tooltip" data-placement="top" title="'.$v['description'].'">' . $v['name'] . '</p>';
            echo '</div>
            <div class="col-3 d-flex m-0 p-0 bg-white">
                <div class="col-6 d-flex border align-align-items-center flex-wrap">';
                    foreach($allGrade as $k2 => $v2)
                    {
                        if($v['id'] == $v2['subject_id'] && $v2['semester'] == '1')
                        {
                            $sum = 0;
                            echo '<div class="m-2 border note_item d-flex align-items-center justify-content-center rounded '. check_grade_type_color($v2['type']) .'"><p class="m-0 text-white" data-toggle="tooltip" data-placement="top" title="'.check_grade_type_name($v2['type']).'">'.$v2['name'].'</p></div>';
                            $avgSubject += (int)$v2['name'];
                            $sum++;
                            $gradeObj->gradeValue[] = $v2['name'];
                            $gradeObj->gradeType[] = $v2['type'];
                        }
                    }
                echo '</div>
                <div class="col border d-flex align-items-center justify-content-center">';
                    if($sum > 0)
                    {
                        echo '<div><p class="m-0">' . calc_weighted_average($gradeObj). '</p></div>';
                    }
                    else
                    {
                        echo '<div><p class="m-0">-</p></div>';
                    }
                echo '</div>
                <div class="col border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">?</p></div>
                </div>
                <div class="col border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">?</p></div>
                </div>
            </div>
            <div class="col-3 d-flex m-0 p-0 bg-white">
                <div class="col-6 d-flex border flex-wrap">';
                unset($gradeObj);
                    foreach($allGrade as $k2 => $v2)
                    {
                        if($v['id'] == $v2['subject_id'] && $v2['semester'] == '2')
                        {
                            $sum = 0;
                            echo '<div class="m-2 border note_item d-flex align-items-center justify-content-center rounded '. check_grade_type_color($v2['type']) .'"><p class="m-0 text-white" data-toggle="tooltip" data-placement="top" title="'.check_grade_type_name($v2['type']).'">'.$v2['name'].'</p></div>';
                            $avgSubject += (int)$v2['name'];
                            $sum++;
                            $gradeObj->gradeValue[] = $v2['name'];
                            $gradeObj->gradeType[] = $v2['type'];
                        }
                    }
                echo '</div>
                <div class="col border d-flex align-items-center justify-content-center">';

                if($sum > 0)
                    {
                        echo '<div><p class="m-0">' . calc_weighted_average($gradeObj). '</p></div>';
                    }
                    else
                    {
                        echo '<div><p class="m-0">-</p></div>';
                    }
                echo '</div>
                <div class="col border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">?</p></div>
                </div>
                <div class="col border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">?</p></div>
                </div>
            </div>
            <div class="col d-flex m-0 p-0 bg-white">
                <div class="col border d-flex align-items-center justify-content-center">';
                unset($gradeObj);
                foreach($allGrade as $k2 => $v2)
                    {
                        if($v['id'] == $v2['subject_id'])
                        {
                            $gradeObj->gradeValue[] = $v2['name'];
                            $gradeObj->gradeType[] = $v2['type'];
                        }
                    }
                    echo '<div><p class="m-0"> ' . calc_weighted_average($gradeObj) . ' </p></div>
                </div>
                <div class="col border d-flex align-items-center justify-content-center">
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">?</p></div>
                </div>
                <div class="col border d-flex align-items-center justify-content-center" '.$bRadiusRight.'>
                    <div class="border note_item d-flex align-items-center justify-content-center rounded bg-info"><p class="m-0 text-white">?</p></div>
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
  <script src="./assets/js/notify.min.js"></script>
  <script type="module" src="./assets/js/main.js"></script>
  <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
</body>

</html>