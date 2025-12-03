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
        Schema::create("employee", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("employee_name");
            $table->string("employee_address");
            $table->string("employee_number");
            $table->string("employee_email");
            $table->date("employee_date_born");
            $table->enum("employee_role", ["Waiter", "Barista", "Manager", "Courier", "Chasier"]);
            $table->integer("employee_salary");
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
