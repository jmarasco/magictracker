<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('parent_id')->default(0);
            $table->integer('location_id')->default(0);
            $table->integer('category_id');
            $table->integer('status_id');
            $table->boolean('seasonal')->default(0);
            $table->string('item_name')->unique();
            $table->string('item_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
