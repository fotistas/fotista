<?php

class Image extends Eloquent {

	public function products(){
		return $this->hasMany('Product');
	}

}