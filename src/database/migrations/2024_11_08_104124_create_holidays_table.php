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
        Schema::create(config('simple_holiday.table_name'), function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->date('date')->nullable();
            $table->boolean('enable')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('simple_holiday.table_name'));
    }
};
