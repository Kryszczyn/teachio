<?php
    class Event
    {
        public function load_all_event(){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM event");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }
        
        public function load_event($col, $id){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT $col FROM event WHERE id=?");
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function load_custom_event($query = "1=1"){
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $stmt = $db->prepare("SELECT * FROM event WHERE $query");
            $stmt->execute();
    
            $result=$stmt->fetchAll();
            return $result;
        }

        public function update_event_name($id_event, $event_name)
        {
            require_once 'DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE event SET name='$event_name' WHERE id='$id_event' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_event_description($id_event, $event_description)
        {
            require_once 'DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE event SET description='$event_description' WHERE id='$id_event' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        public function update_event_date($id_event, $event_date)
        {
            require_once 'DatabaseConnect.php';
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "UPDATE event SET date='$event_date' WHERE id='$id_event' LIMIT 1";
                $db->exec($sql);
                $database->close_connection();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        

        public function insert_event($event_name, $event_description, $event_date, $event_date_added)
        {
            try
            {
                $database = new DatabaseConnect();
                $db = $database->open_connection();
                $sql = "INSERT INTO event (name, description, date, date_added) VALUES (:event_name, :event_description, :event_date, :event_date_added)";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(
                    ':event_name' => $event_name,
                    ':event_description' => $event_description,
                    ':event_date' => $event_date,
                    ':event_date_added' => $event_date_added
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