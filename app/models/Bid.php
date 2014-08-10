<?php

class Bid extends Eloquent {

	protected $fillable = array( 'product_id', 'user_id', 'bid' );

	public function user(){
		return $this->belongsTo('User');
	}

	public function product(){
		return $this->belongsTo('Product');
	}

}