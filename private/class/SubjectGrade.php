<?php
    class SubjectGrade
    {
        public function load_all_subjectGrade(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM subject_grade");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_subjectGrade($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM subject_grade WHERE id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_custom_subjectGrade($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM subject_grade WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function insert_subjectGrade($subject_id, $grade_id)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO subject_grade (subject_id, grade_id) VALUES (:subject_id, :grade_id)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    ':subject_id' => $subject_id,
                    ':grade_id' => $grade_id
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