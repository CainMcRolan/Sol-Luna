<?php

use Core\Repository\Products;
use Http\Forms\ProductForm;

$form = ProductForm::validate($attributes = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity'],
    'category' => $_POST['category'],
    'visibility' => $_POST['visibility'] ?? 'false',
    'description' => $_POST['description'],
    'images' => strlen($_FILES['images']['name'][0]) <= 0 ? null : $_FILES['images'],
    'product_id' => $_POST['id'],
]);

(new Products())->update($attributes);

redirect('/products');