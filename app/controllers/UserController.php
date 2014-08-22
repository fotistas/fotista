<?php

class UserController extends BaseController {

	public function __construct()
	{
		// protection POST actions from CSRF attacks by setting the CSRF before filter 
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	/*---------------------------------------------------------*/

	/*
	 *	Get sign in page
	 */
	public function getSignin()
	{
		return View::make('user/signin');
	}

	/*---------------------------------------------------------*/

	/*
	 *	Signing in
	 */
	public function postSignin()
	{
		if(Auth::attempt(Input::only('username', 'password'))) {
			return Redirect::to('user/account');
		} else {
			return Redirect::to('user/signin')
					-> with('message', 'Your username/password combination was incorrect')
					-> withInput();
		}
	}

	/*---------------------------------------------------------*/

	/*
	 *	Get registration page
	 */
	public function getRegistration()
	{
		return View::make('user/registration');
	}

	/*---------------------------------------------------------*/

	/*
	 *	New user registration
	 */
	public function postRegistration()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if ( $validator -> passes() ) {
			$user = new User;
			$user -> first_name = Input::get('first_name');
			$user -> last_name = Input::get('last_name');
			$user -> email = Input::get('email');
			$user -> username = Input::get('username');
			$user -> password = Hash::make(Input::get('password'));
			$user -> save();

			return Redirect::to('user/account')
					-> with('message', 'thank you for registration!');
		} else {
			return Redirect::to('user/registration')
					-> withErrors($validator)
					-> withInput();
		}
	}

	/*---------------------------------------------------------*/

	/*
	 *	Signing out from the app
	 */
	public function getSignout()
	{
		Auth::logout();
		return Redirect::to('user/signin')
				-> with('message', 'Your are now logged out!');
	}

	/*---------------------------------------------------------*/

	/*
	 *	Show users account page
	 */
	public function getAccount()
	{
		if ( Auth::check() ) {
			return View::make('user/account')
				-> with( 'user', Auth::user() );
		} else {
			return Redirect::to('user/signin')
				-> with('message', 'You need to be logged in to access this page!');
		}
		
	}

}
