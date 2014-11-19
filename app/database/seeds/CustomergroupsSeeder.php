<?php

/**
 * Seeder class for Customer
 */
class CustomergroupsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customergroups::create(array(
            'name' => 'General'
        ));
        Customergroups::create(array(
            'name' => 'Not logged in'
        ));
        Customergroups::create(array(
            'name' => 'Logged in'
        ));
    }

}
