<?php

class AdminController extends \HomeController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getHome()
	{
		return $this->showWelcome();
		// return View::make('protected.admin.admin_dashboard');
	}



}