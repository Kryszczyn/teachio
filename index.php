<?php
    
    include_once './private/functions.php'; 

    include './private/class/DatabaseConnect.php';     
    include './private/class/Attendace.php';
    include './private/class/Classroom.php';
    include './private/class/ClassroomStudent.php';
    include './private/class/Exam.php';
    include './private/class/ExamResult.php';
    include './private/class/ExamType.php';
    include './private/class/Grade.php';
    include './private/class/Parent.php';
    include './private/class/Student.php';
    include './private/class/Subject.php';
    include './private/class/Teacher.php';


    $db = new DatabaseConnect(); 

    $attendace = new Attendance();
    $classroom = new Classroom();
    $classroom_student = new ClassroomStudent();
    $exam = new Exam();
    $exam_result = new ExamResult();
    $exam_type = new ExamType();
    $grade = new Grade();
    $parent = new Parent2(); 
    $student = new Student();
    $subject = new Subject();
    $teacher = new Teacher();

    $query = $student->load_all_student(); 

    r2($query);
    
    //header('Location: login.php'); 
    header('Location: ./public/index.html'); 
?>