<?php

class Meta extends Eloquent {

	public $timestamps = false;

	protected $fillable = array('parent_id', 'parent', 'meta_name', 'meta_value');

}