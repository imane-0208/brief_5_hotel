<?php
class connection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "reserv-db";

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->database}";
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Cannot connect to Database . {$e->getMessage()}";
        }
    }
}
?>