<?php

namespace Api;

use BaseController;
use Customer;
use Input;

/**
 * Api controller for Customers
 */
class CustomerController extends BaseController {

    protected $collection;
    
    /**
     * Return a json collection of customers
     * 
     * @return string
     */
    public function getCustomers()
    {
        $postData = Input::all();
        // check if order by was applied
        if (isset($postData['sort']) && $postData['sort']){
            foreach ($postData['sort'] as $attribute => $order) {
                $this->orderBy($attribute, $order);
            }
        }
        // check if user is searching
        if (isset($postData['searchPhrase']) && $postData['searchPhrase']) {
            $this->search($postData['searchPhrase']);
        } 
        
        // if no search or order by was applied
        // get all
        if (!$this->collection) {
            $this->collection = Customer::all();
        } else {
            $this->collection = $this->collection->get();
        }
        
        return array(
            'current' => 1,
            'rowCount' => count($this->collection),
            'rows' => $this->collection,
            'total' => count($this->collection)
        );
    }
    
    /**
     * search customer by searchPhrase
     * 
     * @param string $searchPhrase
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function search($searchPhrase)
    {
        if (!$this->collection) {
            $this->collection = Customer::like($searchPhrase);
        } else {
            $this->collection->like($searchPhrase);
        }
        
        return $this;
    }
    
    /**
     * 
     * Apply order by
     * 
     * @param string $attribute
     * @param string $order
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function orderBy($attribute, $order)
    {
        if (!$this->collection) {
            $this->collection = Customer::orderBy($attribute, $order);
        } else {
            $this->collection->orderBy($attribute, $order);
        }
        
        return $this;
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
