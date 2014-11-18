<?php

class Customer extends Eloquent {

    const TABLE_NAME = 'customers';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * get associated products
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('Product')->withTimestamps();
    }

    public function scopeLike($query, $tag)
    {
        return $query->where('firstname', 'LIKE', '%' . $tag . '%')
            ->orWhere('lastname', 'LIKE', '%' . $tag . '%')
            ->orWhere('address', 'LIKE', '%' . $tag . '%')
            ->orWhere('email', 'LIKE', '%' . $tag . '%');
    }

}
