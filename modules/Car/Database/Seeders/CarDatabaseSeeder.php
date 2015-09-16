<?php namespace Modules\Car\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
        $this->colorsSeeder();
        $this->conditionsSeeder();
        $this->prototypesSeeder();
        $this->brandsSeeder();
    }

    private function colorsSeeder(){
        \DB::table('colors')->insert(array(
            'name' => 'Rojo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('colors')->insert(array(
            'name' => 'Azul',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('colors')->insert(array(
            'name' => 'Blanco',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('colors')->insert(array(
            'name' => 'Negro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function conditionsSeeder(){
        \DB::table('conditions')->insert(array(
            'name' => 'Disponible',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('conditions')->insert(array(
            'name' => 'Alquilado',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('conditions')->insert(array(
            'name' => 'Reparación',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function prototypesSeeder(){
        \DB::table('prototypes')->insert(array(
            'name' => 'C4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('prototypes')->insert(array(
            'name' => 'C2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('prototypes')->insert(array(
            'name' => 'Mazda 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function brandsSeeder(){
        \DB::table('brands')->insert(array(
            'name' => 'Citroen',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('brands')->insert(array(
            'name' => 'Mazda',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }
}