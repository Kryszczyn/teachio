<?php
    class Subject
    {
        public function load_all_subject(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM subject");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_subject($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM subject WHERE id_subject=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_custom_subject($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM subcject WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_name($id_subject, $name)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE subject SET name='$name' WHERE id_subject='$id_subject' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_grade_id($id_subject, $grade_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE subject SET grade_id='$grade_id' WHERE id_subject='$id_subject' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_subject($name, $grade_id)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO grade (name, grade_id) VALUES (::name, ::grade_id)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::name' => $name,
                    '::grade_id' => $grade_id
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