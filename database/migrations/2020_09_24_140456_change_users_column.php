<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->string('customer_name')->nullable();
           $table->string('company_name')->nullable();
           $table->string('phone')->nullable();
           $table->string('kvk')->nullable();
           $table->integer('customer_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('company_name');
            $table->dropColumn('phone');
            $table->dropColumn('kvk');
            $table->dropColumn('customer_type');
        });
    }
}
