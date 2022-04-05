<?php
if(!function_exists('r2')) 
{
    function r2($text) 
    {
        echo '<pre>' . print_r($text, true) . '</pre>';
    }
}
if(!function_exists('login_user'))
{
    function login_user($type_user, $value)
    {
        session_start();

        include 'class/DatabaseConnect.php';
        
        if($value == 1)
        {
            include 'class/Admin.php';

            $admin = new Admin();
            $all_admins = $admin->load_all_admin();
            return $all_admins;
        }
        if($value == 2)
        {
            include 'class/Teacher.php';

            $teacher = new Teacher();
            $all_teachers = $teacher->load_all_teacher();
            return  $all_teachers;
        }
        if($value == 3)
        {
            include 'class/Parent.php';

            $parent = new Parent2();
            $all_parents = $parent->load_all_parent();
            return  $all_parents;
        }
        if($value == 4)
        {
            include 'class/Student.php';

            $student = new Student();
            $all_students = $student->load_all_student();
            return $all_students;
        }
    }
}
?>