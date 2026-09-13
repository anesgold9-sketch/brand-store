<?php
namespace App\Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/Product.php';

use App\Models\Product;

class ProductController extends Controller {
    public function show() {
        $id = $_GET['id'] ?? null;
        $productModel = new Product();
        $product = $id ? $productModel->find($id) : null;

        $this->view('product.show', ['product' => $product]);
    }
}