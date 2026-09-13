<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private static ?PDO $instance = null;

    public static function getConnection(): PDO {
        if (self::$instance === null) {
            $host = 'localhost';
            $dbname = 'brand_store'; // تأكد من مطابقة اسم قاعدة البيانات لديك
            $username = 'root';
            $password = '';

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            } catch (PDOException $e) {
                die("خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}