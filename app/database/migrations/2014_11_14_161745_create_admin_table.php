<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

        
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //create admin table
        Schema::create(Admin::TABLE_NAME, function($table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //drop admin table
        Schema::drop(Admin::TABLE_NAME);
    }

}
