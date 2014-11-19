<?php

namespace Api;

use Customergroups;
use Input;

/**
 * Admin customer groups controller
 */
class CustomergroupsController extends \Illuminate\Routing\Controller {
    
    protected $collection;
    
    public function getCustomergroups()
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
            $this->collection = Customergroups::all();
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
            $this->collection = Customergroups::like($searchPhrase);
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
            $this->collection = Customergroups::orderBy($attribute, $order);
        } else {
            $this->collection->orderBy($attribute, $order);
        }
        
        return $this;
    }

    /**
     * create new customer group
     * 
     */
    public function saveCustomergroups()
    {
        $customergroup = new Customergroups();
        $postData = Input::all();
        foreach ($postData as $key => $attr) {
            $customergroup->setAttribute($key, $attr);
        }
        $customergroup->save();
    }
    
    /**
     * edit customer group
     * 
     * @param int $id
     */
    public function editCustomergroup($id)
    {

        $customergroups = Customergroups::find($id);
        $postData = Input::all();
        foreach ($postData as $key => $attr) {
            $customergroups->setAttribute($key, $attr);
        }
        $customergroups->save();
    }

    /**
     * delete customer group
     * 
     * @param int $id
     */
    public function deleteCustomergroup($id)
    {

        $customergroup = Customergroups::find($id);
        $customergroup->delete();
    }
    
    public function viewCustomergroup($id)
    {

        $customergroups = Customergroups::find($id);
        
        return $customergroups->customers()->get();
    }

}