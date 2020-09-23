<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnToCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
           // $table->string('name');
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('post_code')->nullable();

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
           // $table->dropColumn('name');
            $table->dropColumn('street');
            $table->dropColumn('house_number');
            $table->dropColumn('post_code');
        });
    }
}
