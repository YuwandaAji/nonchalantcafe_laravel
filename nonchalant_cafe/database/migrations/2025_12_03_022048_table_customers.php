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
        Schema::create("customer", function (Blueprint $table) {
            $table->id("customer_id");
            $table->string("customer_name");
            $table->string("customer_email");
            $table->string("customer_password");
            $table->string("customer_address");
            $table->string("customer_number");
            $table->date("customer_dateborn");
            $table->string("customer_img");
            $table->timestamps();
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
