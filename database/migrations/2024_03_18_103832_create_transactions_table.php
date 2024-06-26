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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('users_id');
            $table->integer('shipping_price');
            $table->integer('total_price');
            $table->string('transaction_status');
            $table->string('bank');
            $table->string('va_number')->nullable();
            $table->string('bill_key')->nullable();
            $table->string('biller_code')->nullable();
            $table->dateTime('expire_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
