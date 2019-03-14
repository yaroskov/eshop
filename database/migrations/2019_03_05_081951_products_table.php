<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTable extends Migration
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
            $table->integer('manufacturers_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('colors_id');
            $table->string('name');
            $table->text('description');
            $table->timestamp('added_at');
            $table->integer('user_id')->nullable();
            $table->integer('currency_id')->nullable();
            $table->float('cost')->nullable();
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
    }
}
