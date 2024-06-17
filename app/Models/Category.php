<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'recurretypence',
        'description',
        'type',
    ];

    public static function getAll() {
        global $db;
        $stmt = $db->query("SELECT * FROM category");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function create($name) {
        global $db;
        $stmt = $db->prepare("INSERT INTO category (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function recurringExpense(): HasOne
    {
        return $this->hasOne(RecurringExpense::class);
    }
}
