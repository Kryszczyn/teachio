<?php
    class Student
    {
        public function load_all_student(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM student");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        public function load_student($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM student WHERE id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function load_custom_student($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM student WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_email($id, $email)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE student SET email='$email' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET password='$password' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET fname='$fname' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET lname='$lname' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET date_birth='$date_birth' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET phone='$phone' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_parent_id($id, $parent_id)
        {
            require_once './DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE student SET parent_id='$parent_id' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET status='$status' WHERE id='$id' LIMIT 1";
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
                $sql = "UPDATE student SET last_login_date='$last_login_date' WHERE id='$id' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function insert_student($email, $password, $fname, $lname, $date_birth, $phone, $parent_id, $date_of_join, $status, $last_login_date)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO student (email, password, fname, lname, date_birth, phone, parent_id, date_of_join, status, last_login_date) VALUES (::email, ::password, ::fname, ::lname, ::date_birth, ::phone, ::parent_id, ::date_of_join, ::status, ::last_login_date)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    '::email' => $email,
                    '::password' => $password,
                    '::fname' => $fname,
                    '::lname' => $lname,
                    '::date_birth' => $date_birth,
                    '::phone' => $phone,
                    '::parent_id' => $parent_id,
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