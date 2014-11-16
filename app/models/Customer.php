<?php

class Customer extends Eloquent {
    
    const TABLE_NAME = 'customers';
    
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = self::TABLE_NAME;
}
