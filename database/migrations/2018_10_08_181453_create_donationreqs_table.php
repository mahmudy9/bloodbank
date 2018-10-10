<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationreqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donationreqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('age');
            $table->integer('blood_id');
            $table->integer('bags');
            $table->string('hospital');
            $table->string('hospital_address');
            $table->decimal('lat' , 10 , 8);
            $table->decimal('lng' , 11 , 8);
            $table->string('phone');
            $table->integer('governerate_id');
            $table->integer('city_id');
            $table->text('details');
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
        Schema::dropIfExists('donationreqs');
    }
}
