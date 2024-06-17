<?php
require_once 'controllers/CategoryController.php';
require_once 'controllers/TransactionController.php';

$categoryController = new CategoryController();
$transactionController = new TransactionController();

if ($_SERVER['REQUEST_URI'] == '/category' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $categoryController->index();
} elseif ($_SERVER['REQUEST_URI'] == '/category/create' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $categoryController->create();
} elseif ($_SERVER['REQUEST_URI'] == '/category/create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryController->create();
} elseif ($_SERVER['REQUEST_URI'] == '/transactions' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $transactionController->index();
} elseif ($_SERVER['REQUEST_URI'] == '/transactions/create' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $transactionController->create();
} elseif ($_SERVER['REQUEST_URI'] == '/transactions/create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $transactionController->create();
} else {
    echo "404 Not Found";
}
