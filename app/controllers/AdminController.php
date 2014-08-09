<?php

class AdminController extends BaseController {

	public function getIndex()
	{
		$this -> data['title'] = 'Home';
		$this -> data['title_icon'] = 'fa-dashboard';

		return View::make('admin.home', $this -> data );
	}

}
