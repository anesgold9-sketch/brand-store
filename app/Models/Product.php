<?php
namespace App\Models;

require_once __DIR__ . '/../Core/Database.php';

use App\Core\Database;
use PDO;

class Product {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['name'])));
        $slug = empty($slug) ? 'product-' . time() : $slug . '-' . time();
        $sku = 'SKU-' . strtoupper(substr(md5(uniqid()), 0, 8));

        $stmt = $this->db->prepare("
            INSERT INTO products (name, slug, sku, price, image_path, description, total_stock, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, 'active')
        ");

        return $stmt->execute([
            $data['name'],
            $slug,
            $sku,
            $data['price'],
            $data['image_path'],
            $data['description'],
            $data['total_stock']
        ]);
    }

    // دالة خصم الكمية المطلوبة من المخزون
    public function reduceStock($id, $quantity) {
        $stmt = $this->db->prepare("
            UPDATE products 
            SET total_stock = GREATEST(0, total_stock - ?) 
            WHERE id = ?
        ");
        return $stmt->execute([(int)$quantity, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}