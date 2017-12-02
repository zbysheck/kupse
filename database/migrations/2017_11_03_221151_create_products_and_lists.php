<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAndLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('site_name')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });

        Schema::create('wish_lists', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('background');
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('wish_list_id');
            $table->string('overridden_title');
            $table->string('overridden_description');
            $table->float('price');
            $table->integer('edited_by');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('wish_lists');
        Schema::dropIfExists('items');
    }
}
