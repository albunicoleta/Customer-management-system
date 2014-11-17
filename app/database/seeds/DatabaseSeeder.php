<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('AdminUserSeeder');
        $this->command->info('Admin table seeded!');
        $this->call('CustomerSeeder');
        $this->command->info('Customer table seeded!');
    }

}
