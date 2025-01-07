<?php

use App\Models\User;
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
        Schema::create('nutrition_data', function (Blueprint $table) {
            $table->id();
			$table->foreignIdFor(User::class);
			$table->string('food_name');
			$table->integer('calories');
			$table->integer('carbs');
			$table->integer('sugar');
			$table->integer('protein');
			$table->integer('fiber');
			$table->integer('fats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_data');
    }
};
