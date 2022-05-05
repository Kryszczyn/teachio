<?php
    ini_set('error_reporting', 0);
    session_start();
    include './private/functions.php';
    $modal = $_POST['type'];
    
    if($modal == "DODAJ_WYDARZENIE_KALENDARZ")
    {
        ob_start();
        
        echo '<div class="modal-header">
            <h5 class="modal-title">Dodaj wydarzenie</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="event-name" class="col-form-label">Nazwa wydarzenia:</label>
                  <input type="text" class="form-control" data-text="wydarzenie_nazwa" value="" id="event-name">
                </div>
                <div class="form-group">
                  <label for="event-description" class="col-form-label">Opis wydarzenia:</label>
                  <input type="text" class="form-control" data-text="wydarzenie_opis" value="" id="event-description">
                </div>
                <div class="form-group">
                  <label for="event-date" class="col-form-label">Data:</label>
                  <input type="date" class="form-control" id="event-date" data-text="wydarzenie_data">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary modal-decline" data-bs-dismiss="modal">Anuluj</button>
              <button type="button" class="btn bg-gradient-primary modal-accept">Wyślij</button>
            </div>';

            $html = ob_get_contents();
        ob_end_clean();

        $array = array(
            'html' => $html,
            'update' => 'DODAJ_WYDARZENIE_UP_KALENDARZ'
        );
        //decode json data
        echo json_encode($array);
    }
    if($modal == "DODAJ_WYDARZENIE_UP_KALENDARZ")
    {
        include './private/class/DatabaseConnect.php';
        include './private/class/Event.php';

        $wydarzenie_nazwa = $_POST['wydarzenie_nazwa'];
        $wydarzenie_opis = $_POST['wydarzenie_opis'];
        $wydarzenie_data = $_POST['wydarzenie_data'];
        $wydarzenie_data_dodania = date("Y-m-d");

        if(!empty($wydarzenie_nazwa) && !empty($wydarzenie_opis) && !empty($wydarzenie_data))
        {
          $event = new Event();
          $event->insert_event($wydarzenie_nazwa, $wydarzenie_opis, $wydarzenie_data, $wydarzenie_data_dodania);
          $res = true;
          $html = '';
          $array = array(
            'html' => $html,
            'res' => $res
          );
          echo json_encode($res);
        }
        else{
          $res = false;
          if(empty($wydarzenie_nazwa))
          {
            $html = "Wprowadź nazwę wydarzenia";
          }
          if(empty($wydarzenie_opis))
          {
            $html = "Wprowadź opis wydarzenia";
          }
          if(empty($wydarzenie_data))
          {
            $html = "Wprowadź datę wydarzenia";
          }
          $array = array(
            'html' => $html,
            'res' => $res
          );
          echo json_encode($array);
          die();
        }
    }
    if($modal == "EDYTUJ_WYDARZENIE_KALENDARZ")
    {
      
      $user_id = $_SESSION['user_id'];
      $user_type = $_SESSION['type'];

      $id = $_POST['id'];
      include './private/class/DatabaseConnect.php';
      include './private/class/Event.php';

      $event = new Event();
      $res = $event->load_event("*", $id);
      
      ob_start();
      r2($id);
        echo '<div class="modal-header">
            <h5 class="modal-title">Edytuj wydarzenie</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="event-name" class="col-form-label">Nazwa wydarzenia:</label>
                  <input type="text" class="form-control" data-text="wydarzenie_nazwa" value="'.$res[0]['name'].'" id="event-name">
                </div>
                <div class="form-group">
                  <label for="event-description" class="col-form-label">Opis wydarzenia:</label>
                  <input type="text" class="form-control" data-text="wydarzenie_opis" value="'.$res[0]['description'].'" id="event-description">
                </div>
                <div class="form-group">
                  <label for="event-date" class="col-form-label">Data:</label>
                  <input type="date" class="form-control" id="event-date" data-text="wydarzenie_data" value="'.$res[0]['date'].'">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary modal-decline" data-bs-dismiss="modal">Anuluj</button>
              <button type="button" class="btn bg-gradient-primary modal-accept">Wyślij</button>
            </div>';

            $html = ob_get_contents();
        ob_end_clean();

        $array = array(
            'html' => $html,
            'update' => 'EDYTUJ_WYDARZENIE_UP_KALENDARZ',
            'id' => $id
        );
        //decode json data
        echo json_encode($array);
    }
    if($modal == "EDYTUJ_WYDARZENIE_UP_KALENDARZ")
    {
        include './private/class/DatabaseConnect.php';
        include './private/class/Event.php';

        $id = $_POST['id'];
        $wydarzenie_nazwa = $_POST['wydarzenie_nazwa'];
        $wydarzenie_opis = $_POST['wydarzenie_opis'];
        $wydarzenie_data = $_POST['wydarzenie_data'];
        $wydarzenie_data_dodania = date("Y-m-d");

        $event = new Event();
        $res = $event->load_event("*", $id);

      
        if(!empty($wydarzenie_nazwa) && !empty($wydarzenie_opis) && !empty($wydarzenie_data))
        {
          $event = new Event();
          $event->update_event_name($id, $wydarzenie_nazwa);
          $event->update_event_description($id, $wydarzenie_opis);
          $event->update_event_date($id, $wydarzenie_data);
          $res = true;
          $html = '';
          $array = array(
            'html' => $html,
            'res' => $res
          );
          echo json_encode($res);
        }
        else{
          $res = false;
          if(empty($wydarzenie_nazwa))
          {
            $html = "Wprowadź nazwę wydarzenia";
          }
          if(empty($wydarzenie_opis))
          {
            $html = "Wprowadź opis wydarzenia";
          }
          if(empty($wydarzenie_data))
          {
            $html = "Wprowadź datę wydarzenia";
          }
          $array = array(
            'html' => $html,
            'res' => $res
          );
          echo json_encode($array);
          die();
        }
        
    }
    if($modal == "DODAJ_OCENE")
    {
      
      $user_id = $_SESSION['user_id'];
      $user_type = $_SESSION['type'];

      $id = $_POST['id'];
      include './private/class/DatabaseConnect.php';
      include './private/class/Subject.php';
      include './private/class/SubjectTeacher.php';
      include './private/class/SubjectGrade.php';

      $subject = new Subject();
      $allSubjects = $subject->load_all_subject();

      $notesArr = ['1', '2-', '2', '2+', '3-', '3', '3+', '4-', '4', '4+', '5-', '5', '5+', '6'];

      ob_start();
        echo '<div class="modal-header">
            <h5 class="modal-title">Dodaj Ocene</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="subject-note" class="col-form-label">Ocena:</label>';
                  echo '<select class="form-control" data-text="ocena_ocena" id="subject-note">';
                    echo '<option selected disabled>Wybierz ocenę</option>';
                    for($i=0; $i<count($notesArr); $i++)
                    {
                      echo '<option value="'.$notesArr[$i].'">'.$notesArr[$i].'</option>';
                    }
                    echo '</select>';
                    echo '</div>
                    <div class="form-group">
                    <label for="subject-name" class="col-form-label">Przedmiot:</label>';
                    echo '<select class="form-control" data-text="przedmiot_ocena" id="subject-name">';
                    echo '<option selected disabled>Wybierz przedmiot</option>';
                    foreach($allSubjects as $k)
                    {
                      echo '<option value="'.$k['id'].'">'.$k['name'].'</option>';
                    }
                  echo '</select>';

                echo '</div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn bg-gradient-secondary modal-decline" data-bs-dismiss="modal">Anuluj</button>
              <button type="button" class="btn bg-gradient-primary modal-accept">Wyślij</button>
            </div>';

            $html = ob_get_contents();
        ob_end_clean();

        $array = array(
            'html' => $html,
            'update' => 'DODAJ_OCENE_UP'
        );
        //decode json data
        echo json_encode($array);
    }
    if($modal == "DODAJ_OCENE_UP")
    {
        include './private/class/DatabaseConnect.php';
        include './private/class/Subject.php';
        include './private/class/SubjectTeacher.php';
        include './private/class/SubjectGrade.php';
        include './private/class/Grade.php';


        $ocena = $_POST['ocena_ocena'];
        $przedmiot = $_POST['przedmiot_ocena'];


        if(!empty($ocena) && !empty($przedmiot) && !is_null($ocena) && !is_null($przedmiot))
        {
          $subjectTeacher = new SubjectTeacher();
          $subjectGrade = new SubjectGrade();
          $grade = new Grade();
          
          $grade->insert_grade($ocena, $przedmiot);
          $grade_id = !empty($grade->last_id) ? $grade->last_id : null;
          
          $subjectGrade->insert_subjectGrade($przedmiot, $grade_id);
          
          $subjectTeacher->insert_subjectTeacher($przedmiot, $_SESSION['user_id']);
          $res = true;
          $html = '';
          $array = array(
            'html' => $html,
            'res' => $res
          );
          echo json_encode($res);
        }
        else{
          $res = false;
          if(empty($ocena) || is_null($ocena))
          {
            $html = "Wprowadź ocenę";
          }
          if(empty($przedmiot) || is_null($przedmiot))
          {
            $html = "Podaj przedmiot";
          }
         
          $array = array(
            'html' => $html,
            'res' => $res
          );
          echo json_encode($array);
          die();
        }
        
    }
?>