<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create customer table
        Schema::create(Customer::TABLE_NAME, function($table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('city')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on(Customergroups::TABLE_NAME);
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
        //drop customer table
        Schema::drop(Customer::TABLE_NAME);
    }

}
