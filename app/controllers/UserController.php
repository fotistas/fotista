<?php

class UserController extends BaseController {

	public function getSignin()
	{
		return View::make('signin');
	}

	public function getRegistration()
	{
		return View::make('registration');
	}

}
