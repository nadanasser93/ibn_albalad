<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMolliePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mollie_payments', function (Blueprint $table) {
            $table->id();
            $table->string('mollie_payment_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('method')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('webhookUrl')->nullable();

            $table->unsignedBigInteger('paymentable_id');
            $table->string('paymentable_type');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mollie_payments');
    }
}
