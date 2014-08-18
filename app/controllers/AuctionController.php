<?php

class AuctionController extends BaseController {

	public function getIndex()
	{

		return View::make('auction');
	}

}