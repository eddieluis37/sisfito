<?php namespace Modules\Client\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->SeccionalesSeeder();
	}

    private function SeccionalesSeeder() {
        \DB::table('seccionales')->insert(array(
            'name' => 'Antioquia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('seccionales')->insert(array(
            'name' => 'Cali',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('seccionales')->insert(array(
            'name' => 'Cundinamarca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

}