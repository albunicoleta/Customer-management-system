<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create products table
        Schema::create(Product::TABLE_NAME, function($table) {
            $table->increments('id');
            $table->string('name');        
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
        //drop products table
        Schema::drop(Product::TABLE_NAME);
    }

}
