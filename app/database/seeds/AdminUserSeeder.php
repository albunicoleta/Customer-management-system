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
        DB::table(Admin::TABLE_NAME)->truncate();
        Admin::create(array('username' => 'admin', 'password' => Hash::make('admin123')));
    }
}

