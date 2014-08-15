<?php

class Product extends Eloquent {

	protected $fillable = array('name', 'description', 'type', 'price', 'sale_price', 'opening_bid');

	public function bids() {
		return $this->hasMany('Bid');
	}

	public function image() {
		return $this->belongsTo('Image');
	}

	public static function get_currency_symbol() {
		return '$';
	}

}