<?php
    ini_set('error_reporting', 0);
    session_start();
    $type = $_POST['type'];
    
    if($type == "WELCOME")
    {
        if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
        {
            echo '<script>window.location.href = "./../login.php";</script>';
        }
        else
        {
            if($_SESSION['type'] == 'admin')
            {
                include_once './private/functions.php'; 
                include './private/class/DatabaseConnect.php';     
                $db = new DatabaseConnect(); 
                include './private/class/Admin.php';
                $entry = new Admin();
                $user = $entry->load_admin('*', $_SESSION['user_id']);
            }
            if($_SESSION['type'] == 'teacher')
            {
                include_once './private/functions.php'; 
                include './private/class/DatabaseConnect.php';     
                $db = new DatabaseConnect(); 
                include './private/class/Teacher.php';
                $entry = new Teacher();
                $user = $entry->load_teacher('*', $_SESSION['user_id']);
            }
            if($_SESSION['type'] == 'student')
            {
                include_once './private/functions.php'; 
                include './private/class/DatabaseConnect.php';     
                $db = new DatabaseConnect(); 
                include './private/class/Student.php';
                $entry = new Student();
                $user = $entry->load_student('*', $_SESSION['user_id']);
            }
            if($_SESSION['type'] == 'parent')
            {
                include_once './private/functions.php'; 
                include './private/class/DatabaseConnect.php';     
                $db = new DatabaseConnect(); 
                include './private/class/Parent.php';
                $entry = new Parent2(); 
                $user = $entry->load_parent('*', $_SESSION['user_id']);
            }
            $user_type = $_SESSION['type'];
        }
        
        echo 'Witaj, nazywasz się '. $user[0]['fname'] . ' ' . $user[0]['lname'] . ' i jesteś ' . $user_type;

        echo '<br><button class="logout">Wyloguj</button>';
        
    }
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
        echo '<script>window.location.href = "./login.php";</script>';

    }
?>