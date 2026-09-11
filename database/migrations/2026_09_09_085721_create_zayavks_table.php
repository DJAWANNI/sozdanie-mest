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
        Schema::create('zayavks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('place_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('data');
                
            $table->enum('status',['new','soglasovana','otklonena'])->default('new');
            $table->enum('pay',['nal','beznal'])->default('beznal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zayavks');
    }
};
