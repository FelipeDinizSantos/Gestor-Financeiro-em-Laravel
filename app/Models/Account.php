<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
