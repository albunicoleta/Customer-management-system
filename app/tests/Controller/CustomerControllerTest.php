<?php

/**
 * Test class for CustomerController
 */
class CustomerControllerTest extends TestCase {

    /**
     * Test for getting all customers
     * 
     * @return void
     */
    public function testGetCustomers()
    {
        $crawler = $this->client->request('POST', '/admin/api/customers');

        $this->assertTrue($this->client->getResponse()->isOk());
    }
    
    /**
     * Test for creating new customer
     * 
     * @return void
     */
    public function testEditCustomerIsOk()
    {
        $crawler = $this->client->request('POST', '/admin/api/customer/edit/1');

        $this->assertTrue($this->client->getResponse()->isOk());
    }
    
    /**
     * Test for creating new customer
     * 
     * @return void
     */
    public function testEditCustomerChangesData()
    {
        $crawler = $this->client->request('POST', '/admin/api/customer/edit/1', array('firstname' => 'Nume nou'));
        
        $customer = Customer::find(1);
        $this->assertEquals('Nume nou', $customer->firstname);
    }
    
    /**
     * test method for deleting a customer
     */ 
    public function testDeleteCustomer()
    {
        $crawler = $this->client->request('POST', '/admin/api/customer/delete/1');
        
        $customer = Customer::find(1);
        $this->assertNull($customer);
    }
    
    /**
     * test method for saving a new customer
     */
    public function testSaveCustomer()
    {
        $postData = array(
            'firstname' => 'Ion',
            'lastname' => 'Popescu',
            'address' => 'Nucului',
            'email' => 'test@test.com'
        );
        $crawler = $this->client->request('POST', '/admin/api/customer/save', $postData);
        
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
