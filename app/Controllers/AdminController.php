<?php
namespace App\Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/Order.php';

use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller {

    public function indexProducts() {
        $productModel = new Product();
        $products = $productModel->getAll();
        $this->view('admin.products.index', ['products' => $products]);
    }

    public function createProduct() {
        $this->view('admin.products.create');
    }

    public function storeProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imageName = 'logo.jpg';

            // معالجة رفع صورة المنتج إن وجدت
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $imageName = time() . '_' . uniqid() . '.' . $ext;
                $target = __DIR__ . '/../../public/assets/images/' . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
            }

            $productModel = new Product();
            $productModel->create([
                'name'        => $_POST['name'] ?? '',
                'price'       => $_POST['price'] ?? 0,
                'total_stock' => $_POST['total_stock'] ?? 0,
                'description' => $_POST['description'] ?? '',
                'image_path'  => $imageName
            ]);

            header('Location: /brand-store/admin/products?success=1');
            exit;
        }
    }

    public function deleteProduct() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $productModel->delete($id);
        }
        header('Location: /brand-store/admin/products?deleted=1');
        exit;
    }

    public function indexOrders() {
        $orderModel = new Order();
        $orders = $orderModel->getAll();
        $this->view('admin.orders.index', ['orders' => $orders]);
    }

    public function showOrder() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /brand-store/admin/orders');
            exit;
        }

        $orderModel = new Order();
        $order = $orderModel->find($id);

        if (!$order) {
            header('Location: /brand-store/admin/orders');
            exit;
        }

        $this->view('admin.orders.show', ['order' => $order]);
    }

    public function updateOrderStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['order_id'] ?? null;
            $status = $_POST['status'] ?? 'pending';

            if ($orderId) {
                $orderModel = new Order();
                $orderModel->updateStatus($orderId, $status);
            }

            header('Location: /brand-store/admin/orders/show?id=' . $orderId);
            exit;
        }
    }
}