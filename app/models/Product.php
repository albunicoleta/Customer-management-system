<?php

class Product extends Eloquent {

    const TABLE_NAME = 'products';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;
    
    /**
     * get associated customers
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers()
    {
        return $this->belongsToMany('Customer')->withTimestamps();
    }

}
