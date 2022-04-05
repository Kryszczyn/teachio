<?php
    class ClassroomStudent
    {
        public function load_all_classroom_student(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM classroom_student");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_classroom_student_by_classroom($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM classroom_student WHERE classroom_id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_classroom_student_by_student($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM classroom_student WHERE student_id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_custom_classroom_student($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM classroom_student WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function insert_classroom_student($classroom_id, $student_id)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO classroom_student (classroom_id, student_id) VALUES (::classroom_id, ::student_id)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::classroom_id' => $classroom_id,
                    '::student_id' => $student_id
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