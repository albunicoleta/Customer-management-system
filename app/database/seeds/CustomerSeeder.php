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
        Customer::create(array(
            'firstname' => 'Ion',
            'lastname' => 'Georgescu',
            'address' => 'Nucului',
            'phone' => '147258369',
            'email' => 'iongeorgescu@gmail.com',
            'city' => 'Cluj-Napoca'
        ));
        Customer::create(array(
            'firstname' => 'Vasile',
            'lastname' => 'Popescu',
            'address' => 'Plopului',
            'phone' => '132495687',
            'email' => 'vasilepopescu@gmail.com',
            'city' => 'Cluj-Napoca'
        ));
    }

}
