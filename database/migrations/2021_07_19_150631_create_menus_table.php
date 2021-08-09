<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->unsignedBigInteger('caffe_id');
            $table->foreign('caffe_id')->references('id')->on('caffes');
            $table->string('product_discretion')->nullable();
            $table->string('product_pic')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('menus');
    }
}
