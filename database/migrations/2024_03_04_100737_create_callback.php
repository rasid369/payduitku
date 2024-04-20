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
        Schema::create('callbacks', function (Blueprint $table) {
            $table->id();
            $table->string('merchantCode');
            $table->integer('amount');
            $table->string('merchantOrderId');
            $table->string('productDetail')->nullable();
            $table->string('additionalParam')->nullable();
            $table->string('paymentCode');
            $table->string('resultCode');
            $table->string('merchantUserId')->nullable();
            $table->string('reference');
            $table->string('signature');
            $table->string('publisherOrderId')->nullable();
            $table->string('spUserHash')->nullable();
            $table->date('settlementDate')->nullable();
            $table->string('issuerCode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callback');
    }
};
