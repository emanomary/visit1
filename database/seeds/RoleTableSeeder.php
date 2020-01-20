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
        //create super_admin role
        $super_admin = \App\Role::create([
            'name' => 'super_admin',
            'display_name' => 'مشرف النظام',
            'description' => 'مبرمج النظام ومديره'
        ]);

        //create user role
        $admin = \App\Role::create([
            'name' => 'admin',
            'display_name' => 'مدير النظام',
            'description' => 'مدير لأدوات النمظام ومستخدم لجميع الإمكانيات فيه'
        ]);

        $user = \App\Role::create([
            'name' => 'user',
            'display_name' => 'محرر',
            'description' => 'تحرير الأخبار والبرامج'
        ]);    
    }
}
