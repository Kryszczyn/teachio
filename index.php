<?php
    session_start();
    if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
    {
        header("Location: ./login.php");
    }

    include_once './private/functions.php'; 
    include './private/class/DatabaseConnect.php';     

    $db = new DatabaseConnect(); 
    if($_SESSION['type'] == 'admin')
    {
        include './private/class/Admin.php';
        $entry = new Admin();
        $user = $entry->load_admin('*', $_SESSION['user_id']);
    }
    if($_SESSION['type'] == 'teacher')
    {
        include './private/class/Teacher.php';
        $entry = new Teacher();
        $user = $entry->load_teacher('*', $_SESSION['user_id']);
    }
    if($_SESSION['type'] == 'student')
    {
        include './private/class/Student.php';
        $entry = new Student();
        $user = $entry->load_student('*', $_SESSION['user_id']);
    }
    if($_SESSION['type'] == 'parent')
    {
        include './private/class/Parent.php';
        $entry = new Parent2(); 
        $user = $entry->load_parent('*', $_SESSION['user_id']);
    }

    echo 'Witaj '. $user[0]['fname'];
    //header('Location: ./public/index.html'); 
?>