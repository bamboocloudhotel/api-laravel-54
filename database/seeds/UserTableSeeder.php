<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \App\User::create([
            'name' => 'j.reservas@germanmoraleshoteles.com',
            'email' => 'j.reservas@germanmoraleshoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reservations')->first());

        $user = \App\User::create([
            'name' => 'reservas.01@germanmoraleshoteles.com',
            'email' => 'reservas.01@germanmoraleshoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reservations')->first());

        $user = \App\User::create([
            'name' => 'reservas.02@germanmoraleshoteles.com',
            'email' => 'reservas.02@germanmoraleshoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reservations')->first());

        $user = \App\User::create([
            'name' => 'reservas.03@germanmoraleshotreles.com',
            'email' => 'reservas.03@germanmoraleshotreles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reservations')->first());

        $user = \App\User::create([
            'name' => 'jefe.revenue@germanmoraleshoteles.com',
            'email' => 'jefe.revenue@germanmoraleshoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reservations')->first());

        $user = \App\User::create([
            'name' => 'recepcion.bicentenario@bhhoteles.com',
            'email' => 'recepcion.bicentenario@bhhoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion.quinta@bhhoteles.com',
            'email' => 'recepcion.quinta@bhhoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion.retiro@bhhoteles.com',
            'email' => 'recepcion.retiro@bhhoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion.parque93@bhhoteles.com',
            'email' => 'recepcion.parque93@bhhoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion@bhusaquen.com',
            'email' => 'recepcion@bhusaquen.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion.poblado@bhhoteles.com',
            'email' => 'recepcion.poblado@bhhoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion@ekhoteles.com',
            'email' => 'recepcion@ekhoteles.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'jefederecepcion@hotelbelasierra.com',
            'email' => 'jefederecepcion@hotelbelasierra.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion@bhbarranquilla.com',
            'email' => 'recepcion@bhbarranquilla.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());

        $user = \App\User::create([
            'name' => 'recepcion@hotelbsrosales.com',
            'email' => 'recepcion@hotelbsrosales.com',
            'password' => Hash::make('colombia1'),
        ]);
        $user->roles()->attach(\App\Role::where('name', 'user')->first());
        $user->roles()->attach(\App\Role::where('name', 'reception')->first());
    }
}
