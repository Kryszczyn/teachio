<?php
    
    include_once './private/functions.php'; //Podpinam funkcje zrobione przeze mnie w pehapie, na razie jest jedna ale na bank będzie więcej.

    include './private/class/DatabaseConnect.php'; // Podłączenie pliku do połączenia z bazą danych.
    
    /* Tutaj podpinam klasy stworzone w oddzielnych plikach, które będą pozwalać na wyświetlanie i edytowanie danymi */
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

    $db = new DatabaseConnect(); // instancja klasy do połączenia z bazą danych

    /* Instancje klas dla każdej tabeli, na razie tylko poglądowo */
    $attendace = new Attendance();
    $classroom = new Classroom();
    $classroom_student = new ClassroomStudent();
    $exam = new Exam();
    $exam_result = new ExamResult();
    $exam_type = new ExamType();
    $grade = new Grade();
    $parent = new Parent2(); // nazwa klasy Parent2 bo słowo kluczowe "Parent" jest zajęte przez rdzeń języka PHP
    $student = new Student();
    $subject = new Subject();
    $teacher = new Teacher();

    /* 
        Do zmiennej $query odwołuje się do metody instancji klasy 
        (w tym przypadku student, można zmienić i zobaczyć sobie inną pod warunkiem że są wartości w bazie bo na razie pusto tam jest).
    */
    $query = $student->load_all_student(); 

    r2($query);// funkcja stworzona przeze mnie do 'ładniejszego' wyświetlania danych "wyplutych" z bazy. Alternatywa funkcji pehapowej "print_r($query);"
    
    /*
        Na razie zakomentowane. Tutaj będzie sprawdzane czy użytkownik jest zalogowany czy nie.
        Jak nie jest zalogowany to wyrzuca na strone logowania, a w przeciwnym wypadku na stronę główną i wtedy uruchiamiają się skrypty PHP i JavaScript.
    */
    //header('Location: login.php'); 
?>