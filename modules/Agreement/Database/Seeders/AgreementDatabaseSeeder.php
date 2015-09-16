<?php namespace Modules\Agreement\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AgreementDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->agreementStatusSeeders();
	}

    private function agreementStatusSeeders() {

        \DB::table('status')->insert(array(
            'name' => 'Vigente',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('status')->insert(array(
            'name' => 'Cumplido',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        \DB::table('status')->insert(array(
            'name' => 'Incumplido',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

}