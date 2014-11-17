<?php

namespace Api;

use BaseController;
use Customer;

/**
 * Api controller for Customers
 */
class CustomerController extends BaseController {

    /**
     * Return a json collection of customers
     * 
     * @return string
     */
    public function getCustomers()
    {
        return Customer::all();
    }

}
