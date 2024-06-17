<?php
require_once 'db.php';

class Transaction {
    public static function getAll() {
        global $db;
        $stmt = $db->query("SELECT transactions.*, categories.name as category_name FROM transactions LEFT JOIN categories ON transactions.category_id = categories.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($amount, $description, $category_id) {
        global $db;
        $stmt = $db->prepare("INSERT INTO transactions (amount, description, category_id) VALUES (:amount, :description, :category_id)");
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }
}
