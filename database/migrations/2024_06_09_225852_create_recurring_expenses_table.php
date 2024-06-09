<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recurring_expenses', function (Blueprint $table) {
            $table->uuid();
            $table->foreignUuid('user_id');
            $table->foreignUuid('category_id')->on('categories')->nullable();
            $table->decimal('amount', total: 8, places: 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description');
            $table->enum('recurrence', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_expenses');
    }
};
