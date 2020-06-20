<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shaba')->nullable();  //todo check 0 in first if not string
            $table->string('cardNumber')->nullable();
            $table->string('codeMelli')->nullable();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('city')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('province')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('servants');
    }
}
