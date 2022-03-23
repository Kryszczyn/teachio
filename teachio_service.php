<?php
    $type = $_POST['type'];
    
    if($type == "TEST")
    {
        $testArr = array(
            "item1" => "Title 1",
            "item2" => "Title 2",
            "item3" => "Title 3",
            "item4" => "Title 4",
            "item5" => "Title 5",
            "item6" => "Title 6",
        );
        echo '<div class="w-100 h-100 row p-3">';
            foreach($testArr as $k => $v)
            {
                echo '
                <div class="col-md-4 border rounded menu-item" data-title="' . $k . '">
                    <div class="d-flex align-items-center justify-content-center p-4" style="cursor:pointer;">
                        <p class="m-0">' . $v . '</p>
                    </div>
                </div>';
            }
        echo '</div>';
    }
    if($type == "TEST2")
    {

    }
?>