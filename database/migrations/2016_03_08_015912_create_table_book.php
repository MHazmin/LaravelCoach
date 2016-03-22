<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBook extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('books', function(Blueprint $table) {
            $table->increments('id');//int auto increment
            $table->string('name');//var(255)
            $table->string('email')->unique();
            $table->string('password', 60);//var(60)
            $table->timestamps();//created_at & update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('books');
    }

}
