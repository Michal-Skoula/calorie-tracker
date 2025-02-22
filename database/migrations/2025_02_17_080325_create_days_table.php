<?php

use App\BulkingOrCuttingEnum;
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
			$table->date('day');
			$table->float('weight')->nullable();
			$table->integer('calorie_goal')->default(0); // Stores the day's calories goal based on settings
			$table->enum('bulking_or_cutting', array_column(BulkingOrCuttingEnum::cases(), 'value'))->default('cutting');
            $table->timestamps();

			$table->unique(['user_id', 'day']);
			$table->index('user_id');
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
