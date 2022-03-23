<?php
    class ExamResult
    {
        public function load_all_exam_result(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM exam_result");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_exam_result_by_exam($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM exam_result WHERE exam_id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_exam_result_by_student($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM exam_result WHERE student_id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_exam_result_by_subject($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM exam_result WHERE subject_id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function insert_exam_result($exam_id, $student_id, $subject_id)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO exam_result (exam_id, student_id, subject_id) VALUES (::exam_id, ::student_id, ::subject_id)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::exam_id' => $exam_id,
                    '::student_id' => $student_id,
                    '::subject_id' => $subject_id
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