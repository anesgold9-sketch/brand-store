<?php
namespace App\Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/Order.php';
require_once __DIR__ . '/../Models/Product.php';

use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller {

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderModel   = new Order();
            $productModel = new Product();

            $productId = $_POST['product_id'] ?? null;
            $quantity  = (int)($_POST['quantity'] ?? 1);

            // جلب المنتج للتحقق من المتاح في المخزون
            $product = $productModel->find($productId);

            if (!$product || $product->total_stock < $quantity) {
                // إذا كانت الكمية غير كافية
                header('Location: /brand-store/product?id=' . $productId . '&error=out_of_stock');
                exit();
            }

            $data = [
                'product_id'     => $productId,
                'customer_name'  => $_POST['customer_name'] ?? '',
                'customer_phone' => $_POST['customer_phone'] ?? '',
                'wilaya'         => $_POST['wilaya'] ?? '',
                'address'        => $_POST['address'] ?? '',
                'quantity'       => $quantity,
            ];

            // 1. تسجيل الطلب
            $orderId = $orderModel->create($data);

            if ($orderId) {
                // 2. الخصم التلقائي من المخزون
                $productModel->reduceStock($productId, $quantity);

                header('Location: /brand-store/product?id=' . $productId . '&success=1');
                exit();
            }
        }
    }

}