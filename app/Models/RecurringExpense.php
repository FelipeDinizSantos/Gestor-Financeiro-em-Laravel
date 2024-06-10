<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class RecurringExpense extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'category_id',
        'amount',
        'start_date',
        'end_date',
        'description',
        'recurrence',
    ];

    public $incrementing = false;

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime'
        ];
    }
}