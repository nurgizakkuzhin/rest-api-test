<?php

class Database
{
    //укажите свои учетные данные базы данных
    private $host = 'localhost';
    private $db_name = 'api_db';
    private $username = 'nurgiz';
    private $password = '@nD445446995';

    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Ошибка подключения: " . $exception->getMessage();
        }

        return $this->conn;
    }
}