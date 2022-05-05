<?php
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
            $total += $v['name'] * $v['weight'];
            $total_weight += $v['weight'];
        }
        $avg = $total / $total_weight;
        return $avg;
    }
}
?>