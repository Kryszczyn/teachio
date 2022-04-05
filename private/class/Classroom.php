<?php
    class Classroom
    {
        public function load_all_classroom(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM classroom");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_classroom($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM classroom WHERE id_classroom=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_custom_classroom($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM classroom WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_name($id_classroom, $name)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE classroom SET name='$name' WHERE id_classroom='$id_classroom' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_grade_id($id_classroom, $grade_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE classroom SET grade_id='$grade_id' WHERE id_classroom='$id_classroom' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_status($id_classroom, $status)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE classroom SET status='$status' WHERE id_classroom='$id_classroom' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_teacher_id($id_classroom, $teacher_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE classroom SET teacher_id='$teacher_id' WHERE id_classroom='$id_classroom' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_classroom($name, $grade_id, $status, $teacher_id)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO classroom (name, grade_id, status, teacher_id) VALUES (::name, ::grade_id, ::status, ::teacher_id)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::name' => $name,
                    '::grade_id' => $grade_id,
                    '::status' => $status,
                    '::teacher_id' => $teacher_id
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