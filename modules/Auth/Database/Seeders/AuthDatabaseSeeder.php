<?php namespace Modules\Auth\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AuthDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 * Corre el llenado de la BD
	 * @return void
	 */
	public function run()
	{
		$this->permissionsUserSeeder();
        $this->permissionsRoleSeeder();
        $this->permissionsSeeder();
        $this->permissionsAllSeeder();
        $this->rolesSeeder();
        $this->addPermissionRoleSeeder();
		$this->usersSeeder();
		$this->roleUserSeeder();
	}

	private function permissionsUserSeeder()
    {
		DB::table('permissions')->insert(array(
            'name' => 'create-users',
            'display_name' => 'Crear Usuarios',
            'description' => 'Crear Usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

		DB::table('permissions')->insert(array(
            'name' => 'read-users',
            'display_name' => 'Ver Usuarios',
            'description' => 'Ver Usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'update-users',
            'display_name' => 'Actualizar Usuarios',
            'description' => 'Actualizar Usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'delete-users',
            'display_name' => 'Borrar Usuarios',
            'description' => 'Borrar Usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

    private function permissionsRoleSeeder()
    {
        DB::table('permissions')->insert(array(
            'name' => 'create-roles',
            'display_name' => 'Crear Roles',
            'description' => 'Crear Roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'read-roles',
            'display_name' => 'Ver Roles',
            'description' => 'Ver Roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'update-roles',
            'display_name' => 'Actualizar Roles',
            'description' => 'Actualizar Roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'delete-roles',
            'display_name' => 'Borrar Roles',
            'description' => 'Borrar Roles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function permissionsSeeder()
    {
        DB::table('permissions')->insert(array(
            'name' => 'create-permissions',
            'display_name' => 'Crear Permissions',
            'description' => 'Crear Permissions',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'read-permissions',
            'display_name' => 'Ver Permisos',
            'description' => 'Ver Permisos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'update-permissions',
            'display_name' => 'Actualizar Permisos',
            'description' => 'Actualizar Permisos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('permissions')->insert(array(
            'name' => 'delete-permissions',
            'display_name' => 'Borrar Permisos',
            'description' => 'Borrar Permisos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
    }

    private function permissionsAllSeeder()
    {
        $name = 'Tables_in_'.env('DB_DATABASE', 'forge');
        $data = DB::select('SHOW TABLES WHERE '.$name.' NOT REGEXP "[[.low-line.]]"');

        foreach($data as $value)
        {
            if(($value->$name != 'users') && ($value->$name != 'migrations') &&
                ($value->$name != 'roles') && ($value->$name != 'permissions')) {
                DB::table('permissions')->insert(array(
                    'name' => 'create-'.$value->$name,
                    'display_name' => 'Crear '.ucwords($value->$name),
                    'description' => 'Crear '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'name' => 'read-'.$value->$name,
                    'display_name' => 'Ver '.ucwords($value->$name),
                    'description' => 'Lista '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'name' => 'update-'.$value->$name,
                    'display_name' => 'Actualizar '.ucwords($value->$name),
                    'description' => 'Actualiza '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));

                DB::table('permissions')->insert(array(
                    'name' => 'delete-'.$value->$name,
                    'display_name' => 'Eliminar '.ucwords($value->$name),
                    'description' => 'Elimina '.ucwords($value->$name),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ));
            }
        }
    }

	private function rolesSeeder()
    {
		DB::table('roles')->insert(array(
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administra los módulos de usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('roles')->insert(array(
            'name' => 'nacional',
            'display_name' => 'Nacional',
            'description' => 'Administra los modulos habilitados',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('roles')->insert(array(
            'name' => 'seccional',
            'display_name' => 'Seccional',
            'description' => 'Gestiona los registros módulos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));


    }


    private function addPermissionRoleSeeder()
    {

        for($i=1; $i < 13; $i++){
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id' => 1
            ));
        }

        for($i=13; $i < 49; $i++){
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id' => 2
            ));
        }

        for($i=30; $i < 49; $i++){
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id' => 3
            ));
        }


    }



	private function usersSeeder()
    {
		DB::table('users')->insert(array(
            'firstname' => 'Eddie',
            'lastname' => 'Rada Gonzalez',
            'username' => 'admin',
            'email' => 'eddie.rada@ica.gov.co',
            'password' => \Hash::make('Edd1elu1s37'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('users')->insert(array(
            'firstname' => 'Johanna',
            'lastname' => 'Cortes Correa',
            'username' => 'nacional',
            'email' => 'johanna.cortes@ica.gov.co',
            'password' => \Hash::make('Nacional2015.'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('users')->insert(array(
            'firstname' => 'Jadys',
            'lastname' => 'Velasquez',
            'username' => 'seccional',
            'email' => 'jadys.velasquez@ica.gov.co',
            'password' => \Hash::make('Seccional2015.'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));
	}

    private function roleUserSeeder()
    {
        DB::table('role_user')->insert(array(
            'user_id' => 1,
            'role_id' => 1
        ));

        DB::table('role_user')->insert(array(
            'user_id' => 2,
            'role_id' => 2
        ));

        DB::table('role_user')->insert(array(
            'user_id' => 3,
            'role_id' => 3
        ));
    }

}


