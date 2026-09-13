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
        $products = $stmt->fetchAll();

        if (!empty($products)) {
            return $products;
        }

        return $this->getSampleProducts();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch();

        if ($product) {
            return $product;
        }

        foreach ($this->getSampleProducts() as $sampleProduct) {
            if ((int)$sampleProduct->id === (int)$id) {
                return $sampleProduct;
            }
        }

        return null;
    }

    private function getSampleProducts(): array {
        return [
            (object)[
                'id' => 1,
                'name' => 'عطر الفخامة',
                'slug' => 'عطر-الفخامة',
                'sku' => 'SKU-001',
                'price' => 4500,
                'image_path' => '1789317519_6aa6d18f9ee5a.jpg',
                'description' => 'عطر فاخر بنفحات عطرية متوازنة، مثالي للملابس اليومية والفعاليات الرسمية.',
                'total_stock' => 12,
                'status' => 'active'
            ],
            (object)[
                'id' => 2,
                'name' => 'حقيبة فاخرة',
                'slug' => 'حقيبة-فاخره',
                'sku' => 'SKU-002',
                'price' => 6200,
                'image_path' => '1789318403_6aa6d503073a0.jpg',
                'description' => 'حقيبة أنيقة مصممة بتفاصيل فاخرة ومناسبة للارتداء اليومي أو المناسبات المميزة.',
                'total_stock' => 8,
                'status' => 'active'
            ],
            (object)[
                'id' => 3,
                'name' => 'ملابس رجالية',
                'slug' => 'ملابس-رجالية',
                'sku' => 'SKU-003',
                'price' => 3900,
                'image_path' => '1789318557_6aa6d59ddbece.jpg',
                'description' => 'مجموعة ملابس رجالية بتصميم عصري وأقمشة مريحة، مناسبة لأسلوبك اليومي.',
                'total_stock' => 15,
                'status' => 'active'
            ],
            (object)[
                'id' => 4,
                'name' => 'إكسسوارات أنيقة',
                'slug' => 'اكسسوارات-انيقة',
                'sku' => 'SKU-004',
                'price' => 2800,
                'image_path' => '1789318797_6aa6d68d2b9a6.jpg',
                'description' => 'إكسسوارات أنيقة تضيف لمسة فخامة إلى كل إطلالة، وتناسب كل المناسبات.',
                'total_stock' => 20,
                'status' => 'active'
            ],
            (object)[
                'id' => 5,
                'name' => 'مجموعة عطور',
                'slug' => 'مجموعة-عطور',
                'sku' => 'SKU-005',
                'price' => 5100,
                'image_path' => '1789318855_6aa6d6c741490.jpg',
                'description' => 'مجموعة عطور باقة من الروائح المميزة لتناسب ذوقك وتضيف لمسة من الفخامة.',
                'total_stock' => 10,
                'status' => 'active'
            ]
        ];
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