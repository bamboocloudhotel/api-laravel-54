<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$role = new \App\Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();

        $role = new \App\Role();
        $role->name = 'reception';
        $role->description = 'Recepción';
        $role->save();

        $role = new \App\Role();
        $role->name = 'user';
        $role->description = 'Usuario';
        $role->save();*/

        /*$role = new \App\Role();
        $role->name = 'reservations';
        $role->description = 'Reservas';
        $role->save();*/

        $role = new \App\Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();
    }
}
