<?php

namespace Api;

use BaseController;
use Customer;

class ProductController extends BaseController {
    
    /**
     * 
     */
    public function getCustomerProducts($id)
    {
        return Customer::find($id)->products()->get();
    }
}

