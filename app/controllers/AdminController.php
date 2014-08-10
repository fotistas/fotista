<?php

class AdminController extends BaseController {

	public function getIndex()
	{
		$this -> data['title'] = 'Home';
		$this -> data['title_icon'] = 'fa-dashboard';
		$this -> data['active'] = 'home';

		return View::make('admin.home', $this -> data );
	}

	public function getNewproduct()
	{
		$this -> data['title'] = 'Products';
		$this -> data['title_icon'] = 'fa-shopping-cart';
		$this -> data['active'] = 'products';
		$this -> data['subtitle'] = 'Add new product';
		$this -> data['type'] = 'simple';

		return View::make('admin.product', $this -> data );
	}

	public function getProducts()
	{
		$this -> data['title'] = 'Products';
		$this -> data['title_icon'] = 'fa-shopping-cart';
		$this -> data['active'] = 'products';

		return View::make('admin.products', $this -> data );
	}

}
