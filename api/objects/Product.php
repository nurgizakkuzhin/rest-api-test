<?php

class Product
{
    //Подключение к базе данных и таблице "products"
    private $conn;
    private $table_name = 'products';

    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;

    //конструктор для соединения с базой данных
    public function __construct($db)
    {
        $this->conn = $db;
    }
}