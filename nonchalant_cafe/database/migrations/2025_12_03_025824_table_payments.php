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
        Schema::create("payment", function (Blueprint $table) {
            $table->bigIncrements("payment_id");
            $table->string("payment_name");
            $table->enum("payment_category", ["E-Wallet", "E-Bank", "COC", "COD"]);
            $table->enum("payment_status", ["Active", "Inactive"]);
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
