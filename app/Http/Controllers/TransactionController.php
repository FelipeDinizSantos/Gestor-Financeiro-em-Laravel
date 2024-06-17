<?php
use App\Models\Category;
require_once 'models/Transaction.php';
require_once 'models/Category.php';

class TransactionController {
    public function index() {
        $transactions = Category::getAll();
        include 'views/transactions.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = $_POST['amount'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            Transaction::create($amount, $description, $category_id);
            header('Location: /transactions');
        } else {
            $categories = Transaction::getAll();
            include 'views/createTransactions.php';
        }
    }
}
