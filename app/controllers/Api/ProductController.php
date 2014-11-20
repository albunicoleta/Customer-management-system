<?php

namespace Api;

use BaseController;
use Customer;

class ProductController extends BaseController {

    /**
     * get all products
     */
    public function getCustomerProducts($id)
    {
        return Customer::find($id)->products()->get();
    }

}
