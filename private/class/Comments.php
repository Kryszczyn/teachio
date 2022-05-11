<?php
class Comments
{
    public function load_all_comments(){
        $database = new DatabaseConnect();
        $db = $database->open_connection();
        $stmt = $db->prepare("SELECT * FROM comments");
        $stmt->execute();

        $result=$stmt->fetchAll();
        return $result;
    }
    public function load_comments($col, $id){
        $database = new DatabaseConnect();
        $db = $database->open_connection();
        $stmt = $db->prepare("SELECT $col FROM comments WHERE id=?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $result=$stmt->fetchAll();
        return $result;
    }
    public function load_custom_comments($query = "1=1"){
        $database = new DatabaseConnect();
        $db = $database->open_connection();
        $stmt = $db->prepare("SELECT * FROM comments WHERE $query");
        $stmt->execute();

        $result=$stmt->fetchAll();
        return $result;
    }

    public function update_name($id, $name)
    {
        require_once './DatabaseConnect.php';
        try
        {
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $sql = "UPDATE comments SET name='$name' WHERE id='$id' LIMIT 1";
            $db->exec($sql);
            $database->close_connection();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function update_value($id, $value)
    {
        require_once './DatabaseConnect.php';
        try
        {
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $sql = "UPDATE comments SET value='$value' WHERE id='$id' LIMIT 1";
            $db->exec($sql);
            $database->close_connection();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function update_description($id, $fname)
    {
        require_once './DatabaseConnect.php';
        try
        {
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $sql = "UPDATE comments SET description='$description' WHERE id='$id' LIMIT 1";
            $db->exec($sql);
            $database->close_connection();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function update_student_id($id, $student_id)
    {
        require_once './DatabaseConnect.php';
        try
        {
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $sql = "UPDATE comments SET student_id='$student_id' WHERE id='$id' LIMIT 1";
            $db->exec($sql);
            $database->close_connection();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    

    public function insert_comments($name, $date, $value, $description, $teacher_id, $student_id, $status)
    {
        try
        {
            $database = new DatabaseConnect();
            $db = $database->open_connection();
            $sql = "INSERT INTO comments (name, date, value, description, teacher_id, student_id, status) VALUES (:name, :date, :value, :description, :teacher_id, :student_id, :status)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(
                ':name' => $name,
                ':date' => $date,
                ':value' => $value,
                ':description' => $description,
                ':teacher_id' => $teacher_id,
                ':student_id' => $student_id,
                ':status' => $status
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