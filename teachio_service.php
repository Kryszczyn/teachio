<?php
    ini_set('error_reporting', 0);
    session_start();
    $type = $_POST['type'];
    
    if($type == "LOGIN")
    {
        include './private/functions.php';
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type_user = $_POST['type_user'];
        $user_id = null;

        switch($type_user)
        {
            case 'admin':
                $all_data = login_user('admin', 1);
                $_SESSION['type'] = 'admin';
                break;
            case 'teacher':
                $all_data = login_user('teacher', 2);
                $_SESSION['type'] = 'teacher';
                break;
            case 'parent':
                $all_data = login_user('parent', 3);
                $_SESSION['type'] = 'parent';
                break;
            case 'student':
                $all_data = login_user('student', 4);
                $_SESSION['type'] = 'student';
                break;
            default:
                die();
                break;
        }
        
        
        foreach($all_data as $k => $v)
        {
            
            if($all_data[$k]['email'] == $email && $all_data[$k]['password'] == $password)
            {
                $user_id = $all_data[$k]['id'];
                $_SESSION['user_id'] = $user_id;
                $response = true;
                break;
            }
            else
            {
                $response = false;
            }
        }
        echo json_encode($response);
    }
    if($type == 'LOGOUT')
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['type']);
        session_destroy();
        header('Location: login.php');
        exit;
    }
    if($type == 'INIT_CALENDAR')
    {
        include './private/functions.php';
        include './private/class/DatabaseConnect.php';
        include './private/class/Event.php';
        
        $event = new Event();
        $all_events = $event->load_all_event();
        $resultArr = [];
        foreach($all_events as $k => $v)
        {
            $resultArr[$k]->id = $all_events[$k]['id'];
            $resultArr[$k]->name = $all_events[$k]['name'];
            $resultArr[$k]->time = $all_events[$k]['date'];
            $resultArr[$k]->cls = 'bg-green-alt';
            $resultArr[$k]->desc = $all_events[$k]['description'];
            $resultArr[$k]->user_type = $_SESSION['type'];
        }
        echo json_encode($resultArr);
    }
?>