<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/Order.php';

class CheckoutController extends Controller {

    // معالجة الطلب السريع من صفحة المنتج
    public function processExpress() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /brand-store/products');
            exit;
        }

        $db = (new Model())->getDb();

        $productId = (int)$_POST['product_id'];
        $size = $_POST['size'] ?? 'M';
        $quantity = max(1, (int)($_POST['quantity'] ?? 1));
        $name = trim($_POST['guest_name']);
        $phone = trim($_POST['guest_phone']);
        $wilayaId = (int)$_POST['wilaya_id'];
        $address = trim($_POST['address']);

        // جلب سعر المنتج
        $stmtP = $db->prepare("SELECT price FROM products WHERE id = ?");
        $stmtP->execute([$productId]);
        $product = $stmtP->fetch();

        if (!$product) {
            header('Location: /brand-store/products');
            exit;
        }

        // حساب التكلفة (سعر منتج + الشحن الافتراضي 600 دج)
        $subtotal = $product->price * $quantity;
        $shippingFee = 600.00; 
        $total = $subtotal + $shippingFee;

        // توليد رقم طلب فريد
        $orderNumber = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 6));

        // 1. حفظ الطلب الرئيسي
        $stmtOrder = $db->prepare("
            INSERT INTO orders (order_number, guest_name, guest_phone, wilaya_id, address, subtotal, shipping_fee, total, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')
        ");
        $stmtOrder->execute([$orderNumber, $name, $phone, $wilayaId, $address, $subtotal, $shippingFee, $total]);
        $orderId = $db->lastInsertId();

        // 2. حفظ عناصر الطلب
        $stmtItem = $db->prepare("
            INSERT INTO order_items (order_id, product_id, size, quantity, price, total)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmtItem->execute([$orderId, $productId, $size, $quantity, $product->price, $subtotal]);

        // 3. التوجيه لصفحة نجاح الطلب
        header("Location: /brand-store/checkout/success?order=" . $orderNumber);
        exit;
    }

    // صفحة تأكيد نجاح الطلب
    public function success() {
        $orderNumber = $_GET['order'] ?? '';
        $this->view('checkout.success', ['orderNumber' => $orderNumber]);
    }
}