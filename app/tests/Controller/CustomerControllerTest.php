<?php

class CustomerControllerTest extends TestCase {

    /**
     *
     * @return void
     */
    public function testGetCustomers()
    {
        $crawler = $this->client->request('GET', '/admin/api/customers');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

}
