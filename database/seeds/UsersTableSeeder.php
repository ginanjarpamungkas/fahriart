<?php

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
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        \DB::table('profile')->insert([
            'user_id' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'phone' => '81227535208',
            'address' => 'Cibinong, Bogor'
        ]);
    }
}
