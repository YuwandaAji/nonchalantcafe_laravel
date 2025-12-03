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
        Schema::create("schedule", function (Blueprint $table) {
            $table->bigIncrements("schedule_id");
            $table->Integer("employee_id");
            $table->enum("shift", ["Siang", "Malam"]);
            $table->enum("schedule_day", ["Monday","Tuesday", "Wednesday", "Thurstday", "Friday", "Saturday", "Sunday"]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
