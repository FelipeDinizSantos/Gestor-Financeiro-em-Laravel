<?php
use App\Models\Category;
require_once 'models/Category.php';

class CategoryController {
    public function index() {
        $categories = Category::getAll();
        include 'views/category.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            Category::create($name);
            header('Location: /category');
        } else {
            include 'views/category/createCategory.php';
        }
    }
}
