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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained()->cascadeOnDelete();
			$table->integer('caloric_goal');
			$table->integer('protein_goal');
			$table->integer('carbs_goal')->nullable();
			$table->integer('fats_goal')->nullable();
			$table->string('openai_api_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
