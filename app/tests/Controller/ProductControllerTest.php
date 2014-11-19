<?php

/**
 * Test class for CustomerController
 */
class ProductControllerTest extends TestCase {

    /**
     * Test for getting all customers
     * 
     * @return void
     */
    public function testGetCustomerProducts()
    {
        $crawler = $this->client->request('POST', '/admin/api/customer/1/products');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    /**
     * load db data
     */
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

}
