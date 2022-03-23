<?php

    class DatabaseConnect
    {
        private $server = 'mysql:host=localhost;dbname=teachio';
        private $user = 'root';
        private $password = '';
        private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        protected $conn;

        public function open_connection()
        {
            try
            {
                $this->conn = new PDO($this->server, $this->user, $this->password, $this->options);
                return $this->conn;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                die();
            }
        }
        
        public function close_connection()
        {
            $this->conn = null;
        }
    }
?>