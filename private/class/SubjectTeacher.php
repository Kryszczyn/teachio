<?php
    class SubjectTeacher
    {
        public function load_all_subjectTeacher(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM subject_teacher");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_subjectTeacher($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM subject_teacher WHERE id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_custom_subjectTeacher($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM subject_teacher WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function insert_subjectTeacher($subject_id, $teacher_id)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO subject_teacher (subject_id, teacher_id) VALUES (:subject_id, :teacher_id)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    ':subject_id' => $subject_id,
                    ':teacher_id' => $teacher_id
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