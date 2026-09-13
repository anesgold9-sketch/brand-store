<?php
namespace App\Controllers;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../Models/Product.php';

use App\Models\Product;

class HomeController extends Controller {

    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        $this->view('home.index', ['products' => $products]);
    }

    public function about() {
        $this->view('about.index');
    }

}