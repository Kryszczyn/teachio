<?php
    class Teacher
    {
        public function load_all_teacher(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM teacher");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_teacher($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM teacher WHERE id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function load_custom_teacher($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM teacher WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_email($id_teacher, $email)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET email='$email' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_password($id, $password)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET password='$password' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_fname($id, $fname)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET fname='$fname' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_lname($id, $lname)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET lname='$lname' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_date_birth($id, $date_birth)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET date_birth='$date_birth' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_phone($id, $phone)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET phone='$phone' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
       
        public function update_status($id, $status)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET status='$status' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_last_login_date($id, $last_login_date)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE teacher SET last_login_date='$last_login_date' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_teacher($email, $password, $fname, $lname, $date_birth, $phone, $date_of_join, $status, $last_login_date)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO teacher (email, password, fname, lname, date_birth, phone, date_of_join, status, last_login_date) VALUES (::email, ::password, ::fname, ::lname, ::date_birth, ::phone, ::date_of_join, ::status, ::last_login_date)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::email' => $email,
                    '::password' => $password,
                    '::fname' => $fname,
                    '::lname' => $lname,
                    '::date_birth' => $date_birth,
                    '::phone' => $phone,
                    '::date_of_join' => $date_of_join,
                    '::status' => $status,
                    '::last_login_date' => $last_login_date
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