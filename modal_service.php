<?php
    session_start();
    include './private/functions.php';
    $modal = $_POST['type'];
    
    if($modal == "DODAJ_WYDARZENIE_KALENDARZ")
    {
        ob_start();
        
        echo '<div class="modal-header">';
            echo '<h5 class="modal-title">Dodaj wydarzenie</h5>';
              echo '<button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">';
                echo '<span aria-hidden="true">×</span>';
              echo '</button>';
            echo '</div>';
            echo '<div class="modal-body">';
              echo '<form>';
                echo '<div class="form-group">';
                  echo '<label for="event-name" class="col-form-label">Nazwa wydarzenia:</label>';
                  echo '<input type="text" class="form-control" data-text="wydarzenie_nazwa" value="" id="event-name">';
                echo '</div>';
                echo '<div class="form-group">';
                  echo '<label for="event-date" class="col-form-label">Data:</label>';
                  echo '<input type="datetime-local" class="form-control" id="event-date" data-text="wydarzenie_data">';
                echo '</div>';
              echo '</form>';
            echo '</div>';
            echo '<div class="modal-footer">';
              echo '<button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Anuluj</button>';
              echo '<button type="button" class="btn bg-gradient-primary">Wyślij</button>';
            echo '</div>';

            $html = ob_get_contents();
        ob_end_clean();

        $array = array(
            'html' => $html
        );
        //decode json data
        echo json_encode($html);
    }
?>