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
        $user = \App\User::create([
        	'name' => 'مشرف النظام',
        	'username' => '801120791',
        	'email' => 'emankullab@gmail.com',
        	'password' => bcrypt('admin/87')
        ]);

        //to give this super admin user the role super_admin
        $user->attachRole('super_admin');
    }
}
