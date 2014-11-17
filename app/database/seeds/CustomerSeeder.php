<?php

/**
 * Seeder class for Customer
 */
class CustomerSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(array(
            'firstname' => 'Nicoleta',
            'lastname' => 'Albu',
            'address' => 'Fagului',
            'phone' => '12345678',
            'email' => 'albunicoleta@gmail.com',
            'city' => 'Galati'
        ));
    }

}
