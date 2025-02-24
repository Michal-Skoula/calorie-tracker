<?php

use App\FoodTypeEnum;
use App\Models\Day;
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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
			$table->foreignId('day_id')->constrained()->cascadeOnDelete();

			$table->string('image');
			$table->text('prompt')->nullable();

			$table->string('name')->nullable();
			$table->text('description')->nullable();

			$table->integer('calories')->nullable();
			$table->integer('protein')->nullable();
			$table->integer('carbs')->nullable();
			$table->integer('fats')->nullable();
			$table->enum('type', FoodTypeEnum::valuesToArray())->default('unknown');


			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
