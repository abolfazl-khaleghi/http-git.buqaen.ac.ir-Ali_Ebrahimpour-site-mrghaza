<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
//            $table->text('body');
            $table->text('description')->nullable();
            $table->string('menu')->nullable();
            $table->string('picture')->nullable();
            $table->text('designerComment')->nullable();
            $table->string('location')->nullable();  //only location
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('report')->default('0')->nullable();
            $table->integer('viewCount')->default(0);
            $table->integer('commentCount')->default(0);
            $table->string('slug')->nullable();
            $table->string('day')->nullable();
            $table->string('hour')->nullable();
            $table->boolean('enabled')->nullable();

            $table->string('shopService')->nullable();
            $table->string('shopServant')->nullable();
            $table->string('hesabdari')->nullable();
            $table->string('meter')->nullable();
            $table->string('typeOwner')->nullable();


            $table->unsignedBigInteger('slider_id')->unsigned()->nullable();
            $table->foreign('slider_id')->references('id')->on('sliders')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('guild_id')->unsigned();
            $table->foreign('guild_id')->references('id')->on('guilds')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('city')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('province_id')->unsigned()->default(1);
            $table->foreign('province_id')->references('id')->on('province')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('servant_id')->unsigned();
            $table->foreign('servant_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('restaurants');
    }
}
