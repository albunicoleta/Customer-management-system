<?php

class Customergroups extends Eloquent {

    const TABLE_NAME = 'customergroups';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;
    
    public function customers()
    {
        return $this->hasMany('Customer', 'group_id');
    }
    
    public function scopeLike($query, $tag)
    {
        return $query->where('name', 'LIKE', '%' . $tag . '%');
    }
    
}
