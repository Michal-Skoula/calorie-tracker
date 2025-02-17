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
        Schema::create('days', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained()->cascadeOnDelete();
			$table->integer('calorie_goal'); // Stores the day's calories goal, if it changes in the future
			$table->integer('calories')->default(0); // Sum of daily calories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('days');
    }
};
