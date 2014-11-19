<?php

/**
 * Seeder class for Product
 */
class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newProduct = new Product();
        $newProduct->fill(array('name' => 'book'));
        $newProduct->save();
        $customer = Customer::all()->first();
        $newProduct->customers()->sync(array($customer->id));
    }

}
