<?php
    class Exam
    {
        public function load_all_exam(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM exam");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_exam($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM exam WHERE id_exam=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function load_custom_exam($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM exam WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_exam_type_id($id_exam, $exam_type_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE exam SET exam_type_id='$exam_type_id' WHERE id_exam='$id_exam' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_name($id_exam, $name)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE exam SET name='$name' WHERE id_exam='$id_exam' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_start_date($id_exam, $start_date)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE exam SET start_date='$start_date' WHERE id_exam='$id_exam' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_exam($exam_type_id, $name, $start_date)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO exam (exam_type_id, name, start_date) VALUES (::exam_type_id, ::name, ::start_date)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::exam_type_id' => $exam_type_id,
                    '::name' => $name,
                    '::start_date' => $start_date
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