<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('passport', 12);
            $table->boolean('importador');
            $table->boolean('exportador');
            $table->boolean('productor');
            $table->integer('seccionales_id')->unsigned();
            $table->timestamps();
            $table->foreign('seccionales_id')
                  ->references('id')
                  ->on('seccionales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }

}
