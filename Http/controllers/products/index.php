<?php

use Core\App;
use Core\Database;
use Core\Repository\Products;
use Core\Session;

$admin = Session::get('admin');
$db = App::resolve(Database::class);

//Fetch Categories
$categories = $db->query("select * from categories where visibility = :visible", ['visible' => '1'])->get();

//Get Products
$products = $db->query("
    SELECT p.product_id, p.name, p.description, p.visibility, p.price, p.stock_quantity, p.category_id, p.created_by, p.created_at, 
           pi.image_id, pi.image_url, pi.is_primary 
    FROM products p 
    LEFT JOIN product_images pi 
    ON p.product_id = pi.product_id AND pi.is_primary = 1
")->get();

//Total no. of products
$total_quantity = array_reduce($products, function ($carry, $product) {
    return $carry + $product['stock_quantity'];
}, 0);
$total_price = array_reduce($products, function ($carry, $item) {
    return $carry + ($item['stock_quantity'] * floatval($item['price']));
}, 0);

//Alerts
$success_message = Session::get('success') ?? '';
$error_message = Session::get('errors') ?? [];

require base_path('Http/views/products/index.php');