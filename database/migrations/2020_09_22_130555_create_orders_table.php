<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('subscription_id');
            $table->integer('transaction_id');  // Mollie transaction id
            $table->string('payment_method');
            $table->enum('payment_status', ['paid', 'not paid']);   // paid, not paid
            $table->date('start_date');
            $table->date('end_date');
            $table->float('amount_excl');
            $table->float('amount_incl');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

