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
        $this->call('CustomergroupsSeeder');
        $this->command->info('Customergroups table seeded!');
        $this->call('CustomerSeeder');
        $this->command->info('Customer table seeded!');
        $this->call('ProductSeeder');
        $this->command->info('Product table seeded!');
        
    }

}
