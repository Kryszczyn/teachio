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
if(!function_exists('calc_avg')){
    function calc_weighted_average($grades)
    {
        $total = 0;
        $total_weight = 0;
        foreach($grades as $k => $v)
        {
            $total += $v['grade'] * $v['weight'];
            $total_weight += $v['weight'];
        }
        $avg = $total / $total_weight;
        return $avg;
    }
}
if(!function_exists('check_grade_type_color'))
{
    function check_grade_type_color($type)
    {
        $typeColorArr = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info'];
        switch($type)
        {
            case '1':
                $typeColor = $typeColorArr[0];
                break;
            case '2':
                $typeColor = $typeColorArr[1];
                break;
            case '3':
                $typeColor = $typeColorArr[2];
                break;
            case '4':
                $typeColor = $typeColorArr[3];
                break;
            case '5':
                $typeColor = $typeColorArr[4];
                break;
            default:
                $typeColor = $typeColorArr[0];
                break;
        }
        return $typeColor;
    }
}
if(!function_exists('check_grade_type_name'))
{
    function check_grade_type_name($type)
    {
        $typeNameArr = ['Klasówka', 'Kartkówka', 'Praca Domowa', 'Aktywność', 'Odpowiedź Ustna'];
        switch($type)
        {
            case '1':
                $typeName = $typeNameArr[0];
                break;
            case '2':
                $typeName = $typeNameArr[1];
                break;
            case '3':
                $typeName = $typeNameArr[2];
                break;
            case '4':
                $typeName = $typeNameArr[3];
                break;
            case '5':
                $typeName = $typeNameArr[4];
                break;
            default:
                $typeName = $typeNameArr[0];
                break;
        }
        return $typeName;
    }
}

?>