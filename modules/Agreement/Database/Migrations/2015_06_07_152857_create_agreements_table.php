<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('code');
            $table->integer('client_id');
            $table->integer('car_id');
            $table->integer('status_id');
            $table->timestamp('registration_date');
            $table->timestamp('delivery_date');
            $table->decimal('cash');
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
        Schema::drop('agreements');
    }

}
