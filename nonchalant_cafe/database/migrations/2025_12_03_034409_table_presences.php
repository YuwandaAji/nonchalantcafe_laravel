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
        Schema::create("presence", function (Blueprint $table) {
            $table->bigIncrements("presence_id");
            $table->BigInteger("employee_id");
            $table->BigInteger("schedule_id");
            $table->date("presence_date");
            $table->enum("status_presence", ["Present", "Absent", "Sick", "Permission"]);
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
