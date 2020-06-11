<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'identification' => '0111111111',
        	'name' => 'Anna Maria',
        	'lastname' => 'Rodriguez Vera',
        	'cellphone' => '0999999992',
        	'address' => 'Barrio del Centenario',
        	'date_of_birth' => Carbon::createFromDate(1998,10,6),
        	'email' => 'admin@gmail.com',
        	'password' => 1234,
        	'role_id' => 1
        ]);

        User::create([
            'identification' => '0934544333',
            'name' => 'Andrés Juan',
            'lastname' => 'Stewart Alvarado',
            'cellphone' => '0999999923',
            'address' => 'Los Ceibos',
            'date_of_birth' => Carbon::createFromDate(1992,12,8),
            'email' => 'supervisor@gmail.com',
            'password' => 1234,
            'role_id' => 2
        ]);

        User::create([
            'identification' => '0983882116',
            'name' => 'Anna Mariela',
            'lastname' => 'Andrade',
            'cellphone' => '0999998880',
            'address' => 'Samborondón',
            'date_of_birth' => Carbon::createFromDate(1994,7,28),
            'email' => 'vendedora@gmail.com',
            'password' => 1234,
            'role_id' => 3
        ]);
    }
}
