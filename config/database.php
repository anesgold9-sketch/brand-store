<?php

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $host = 'localhost';
        $db_name = 'brand_store';
        $username = 'root';
        $password = ''; // اتركه فارغاً لبيئة XAMPP الافتراضية

        try {
            $dsn = "mysql:host={$host};dbname={$db_name};charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch(PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            die("عذراً، تعذر الاتصال بقاعدة البيانات.");
        }
    }

    private function __clone() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}