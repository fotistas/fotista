<?php

class Product extends Eloquent {

	protected $fillable = array('name', 'description', 'type', 'price', 'salep_price', 'opening_bid', 'picture');

	public function bids() {
		return $this->hasMany('Bid');
	}

}