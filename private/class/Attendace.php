<?php
    class Attendance
    {
        public function load_all_attendance(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM attendance");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_attendance_by_date($col, $date){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM attendance WHERE date=?");
            $stmt->bindValue(1, $date, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_attendance_by_student($col, $student_id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM attendance WHERE student_id=?");
            $stmt->bindValue(1, $student_id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_custom_attendance($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM attendance WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

       
        public function update_student_id($id, $student_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE attendance SET student_id='$student_id' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        public function update_teacher_id($id, $teacher_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE attendance SET teacher_id='$teacher_id' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        public function update_lesson_number($id, $lesson_number)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE attendance SET lesson_number='$lesson_number' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        public function update_date_attendance($id, $date_attendance)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE attendance SET date_attendance='$date_attendance' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        public function update_type($id, $type)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE attendance SET type='$type' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        
        public function update_semester($id, $semester)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE attendance SET semester='$semester' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_attendance($student_id, $teacher_id, $lesson_number, $date_added, $date_attendance, $type, $semester)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO attendance (student_id, teacher_id, lesson_number, date_added, date_attendance, type, semester) VALUES (:student_id, :teacher_id, :lesson_number, :date_added, :date_attendance, :type, :semester)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    ':student_id' => $student_id,
                    ':teacher_id' => $teacher_id,
                    ':lesson_number' => $lesson_number,
                    ':date_added' => $date_added,
                    ':date_attendance' => $date_attendance,
                    ':type' => $type,
                    ':semester' => $semester
                ));
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
?>