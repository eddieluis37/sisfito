<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('brand_id');
            $table->integer('prototype_id');
            $table->integer('color_id');
            $table->integer('condition_id');
            $table->string('sheet_number');
            $table->smallInteger('quantity_km');
            $table->decimal('price_by_hour', 5, 2);
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
        Schema::drop('cars');
    }

}
