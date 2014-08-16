<?php

class Auction extends Eloquent {

	public $timestamps = false;

	protected $fillable = array('name', 'products', 'start', 'description');

}