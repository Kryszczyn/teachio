<?php
    class ExamType
    {
        public function load_all_exam_type(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM exam_type");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_exam_type($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM exam_type WHERE id_exam_type=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function load_custom_exam_type($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM exam_type WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_name($id_exam_type, $name)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE exam_type SET name='$name' WHERE id_exam_type='$id_exam_type' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_description($id_exam_type, $description)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE exam_type SET description='$description' WHERE id_exam_type='$id_exam_type' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_exam_type($name, $description)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO exam_type (name, description) VALUES (::name, ::description)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::name' => $name,
                    '::description' => $description
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