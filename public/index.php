<?php

require_once __DIR__ . '/../app/Core/Router.php';

use App\Core\Router;

$router = new Router();

// --- مسارات واجهة المتجر والمنتجات للزبائن ---
$router->get('/brand-store/', 'HomeController@index');
$router->get('/brand-store/products', 'HomeController@index'); // <-- إضافة هذا المسار ليعرض المنتجات
$router->get('/brand-store/product', 'ProductController@show');
$router->post('/brand-store/order/store', 'OrderController@store');
$router->get('/brand-store/about', 'HomeController@about');

// --- مسارات لوحة التحكم (إدارة الطلبات) ---
$router->get('/brand-store/admin/orders', 'AdminController@indexOrders');
$router->get('/brand-store/admin/orders/show', 'AdminController@showOrder');
$router->post('/brand-store/admin/orders/update-status', 'AdminController@updateOrderStatus');

// --- مسارات لوحة التحكم (إدارة المنتجات والمخزون) ---
$router->get('/brand-store/admin/products', 'AdminController@indexProducts');
$router->get('/brand-store/admin/products/create', 'AdminController@createProduct');
$router->post('/brand-store/admin/products/store', 'AdminController@storeProduct');
$router->get('/brand-store/admin/products/delete', 'AdminController@deleteProduct');

// تشغيل الموجّه
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router->dispatch($requestUri, $requestMethod);