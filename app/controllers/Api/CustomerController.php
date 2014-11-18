<?php

namespace Api;

use BaseController;
use Customer;
use Input;

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
        $collection = Customer::all();

        return array(
            'current' => 1,
            'rowCount' => count($collection),
            'rows' => $collection,
            'total' => count($collection)
        );
    }

    public function editCustomer($id)
    {
        
        $customer = Customer::find($id);
        $postData = Input::all();
        foreach ($postData as $key => $attr) {
            $customer->setAttribute($key, $attr);
        }
        $customer->save();
    }
    
    public function deleteCustomer($id)
    {
        
        $customer = Customer::find($id);
        $customer->delete();
    }
    
    public function saveCustomer()
    {
        $customer = new Customer();
        $postData = Input::all();
        foreach ($postData as $key => $attr) {
            $customer->setAttribute($key, $attr);
        }
        $customer->save();
    }

}
