<?php
namespace App\Models;

require_once __DIR__ . '/../Core/Database.php';

use App\Core\Database;
use PDO;

class Order {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // جلب جميع الطلبات مع اسم المنتج وسعره للوحة التحكم
    public function getAll(): array {
        $sql = "SELECT orders.*, products.name AS product_name, products.price AS product_price 
                FROM orders 
                LEFT JOIN products ON orders.product_id = products.id 
                ORDER BY orders.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    // جلب طلب محدد بواسطة الرقم التعريفي ID
    public function find($id) {
        $sql = "SELECT orders.*, products.name AS product_name, products.price AS product_price, products.image_path 
                FROM orders 
                LEFT JOIN products ON orders.product_id = products.id 
                WHERE orders.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // إنشاء طلب جديد من قبل الزبون
    public function create(array $data) {
        $name      = $data['customer_name'] ?? '';
        $phone     = $data['customer_phone'] ?? '';
        $wilaya    = $data['wilaya'] ?? '';
        $address   = $data['address'] ?? '';
        $productId = $data['product_id'] ?? null;
        $quantity  = $data['quantity'] ?? 1;

        $stmt = $this->db->prepare("
            INSERT INTO orders (product_id, customer_name, customer_phone, wilaya, address, quantity, status)
            VALUES (?, ?, ?, ?, ?, ?, 'pending')
        ");

        $stmt->execute([
            $productId,
            $name,
            $phone,
            $wilaya,
            $address,
            $quantity
        ]);

        return $this->db->lastInsertId();
    }

    // تحديث حالة الطلب من لوحة التحكم (مكتمل، معالج، ملغى... إلخ)
    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}