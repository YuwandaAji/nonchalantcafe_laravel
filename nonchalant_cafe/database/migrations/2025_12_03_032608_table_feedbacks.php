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
        Schema::create("feedback", function (Blueprint $table) {
            $table->bigIncrements("feedback_id");
            $table->integer("customer_id");
            $table->date("feedback_date");
            $table->integer("rating");
            $table->string("comment");
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
