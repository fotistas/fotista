<?php

class User extends Eloquent implements UserInterface {

	protected $fillable = array('first_name', 'last_name', 'email');

	protected $guarded = array('id', 'password');

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function bids() {
		return $this->hasMany('Bid');
	}

	public function owns(Bid $bid) {
		return $this->id == $bid->user_id;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken(){
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value){
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName(){
		return 'remember_token';
	}

}