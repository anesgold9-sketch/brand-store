<?php
use App\Core\Router;

require_once __DIR__ . '/../app/Core/Router.php';

$router = new Router();

// مسارات متجر العملاء
$router->add('GET', '/brand-store/', 'ProductController', 'index');
$router->add('GET', '/brand-store/product', 'ProductController', 'show');
$router->add('POST', '/brand-store/order/store', 'OrderController', 'store');
$router->add('GET', '/brand-store/vcard', 'VcardController', 'index');

// مسارات لوحة تحكم المسؤول (إدارة المنتجات والطلبات)
$router->add('GET', '/brand-store/admin/products', 'AdminController', 'indexProducts');
$router->add('GET', '/brand-store/admin/products/create', 'AdminController', 'createProduct');
$router->add('POST', '/brand-store/admin/products/store', 'AdminController', 'storeProduct');
$router->add('GET', '/brand-store/admin/products/delete', 'AdminController', 'deleteProduct');

$router->add('GET', '/brand-store/admin/orders', 'AdminController', 'indexOrders');
$router->add('GET', '/brand-store/admin/orders/show', 'AdminController', 'showOrder');
$router->add('POST', '/brand-store/admin/orders/update-status', 'AdminController', 'updateOrderStatus');

return $router;