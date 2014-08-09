<?php

class Auction extends Eloquent {

	public $timestamps = false;

	protected $fillable = array('products', 'start', 'end', 'description');

}