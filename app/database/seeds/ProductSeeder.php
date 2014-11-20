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
        
        $newProduct2 = new Product();
        $newProduct2->fill(array('name' => 'toy'));
        $newProduct2->save();
        
        $newProduct3 = new Product();
        $newProduct3->fill(array('name' => 'Computer'));
        $newProduct3->save();
        
        $customers = Customer::all();
        $customer = $customers->first();
        $newProduct->customers()->sync(array($customer->id));
        $newProduct2->customers()->sync(array($customer->id));
        
        $customer = $customers->random();
        $newProduct2->customers()->sync(array($customer->id));
        
        $customer = $customers->last();
        $newProduct->customers()->sync(array($customer->id));
        $newProduct3->customers()->sync(array($customer->id));
    }

}
