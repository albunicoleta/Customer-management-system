<?php

/**
 * Seeder class for Admin Users
 */
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(array('username' => 'admin', 'password' => Hash::make('admin123')));
    }
}

