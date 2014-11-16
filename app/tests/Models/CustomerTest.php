<?php

class CustomerTest extends TestCase {

    /**
     * Test if instance is ok
     *
     * @return void
     */
    public function testInstance()
    {
        $newCustomer = new Customer();
        $newCustomer->firstname = 'Nicoleta';
        
        $this->assertEquals('Nicoleta', $newCustomer->firstname);
        $this->assertInstanceOf(get_class($newCustomer), $newCustomer);
    }
    
    public function testAssocWithProducts()
    {
        $newCustomer = new Customer();
        $newCustomer->firstname = 'Nicoleta';
        $newCustomer->lastname = 'Albu';
        $newCustomer->address = 'fagului';
        $newCustomer->email = 'test@test,com';
       
        $newCustomer->save();
        
        $newProduct = new Product();
        $newProduct->name = 'book';
        
        $newCustomer->products()->save($newProduct);
        
        $this->assertTrue($newCustomer->products->contains($newProduct->id));
    }
    
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

}
