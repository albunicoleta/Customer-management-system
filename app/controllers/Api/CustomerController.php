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
        $postData = Input::all();
        // check if user is searching
        if (isset($postData['searchPhrase']) && $postData['searchPhrase']) {
            $collection = $this->search($postData['searchPhrase']);
        } 
        //if no search display all customers
        else {
            $collection = Customer::all();
        }

        return array(
            'current' => 1,
            'rowCount' => count($collection),
            'rows' => $collection,
            'total' => count($collection)
        );
    }
    
    /**
     * search customer by searchPhrase
     * 
     * @param string $searchPhrase
     * @return array
     */
    protected function search($searchPhrase)
    {
        return Customer::like($searchPhrase)->get();
    }

    /**
     * edit customer
     * 
     * @param int $id
     */
    public function editCustomer($id)
    {

        $customer = Customer::find($id);
        $postData = Input::all();
        foreach ($postData as $key => $attr) {
            $customer->setAttribute($key, $attr);
        }
        $customer->save();
    }

    /**
     * delete customer
     * 
     * @param int $id
     */
    public function deleteCustomer($id)
    {

        $customer = Customer::find($id);
        $customer->delete();
    }

    /**
     * create new customer
     * 
     */
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
