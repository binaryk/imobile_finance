<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $title = 'Bine ati venit pe aplicatia Imobiliare';
	protected $small = 'aici veti putea gestiona afacerea dvs';

	public function showWelcome()
	{ 
		$links = [
			'my-profile' => [
					'bg' => 'blue-madison',
					'header'=> 'Profil',
					'title'	=> 'Profilul meu',
					'icon'  => 'fa-user',
					'url'	=> URL::route('profil')
				],
			'my-imobils' => [
					'bg' => 'red-intense',
					'header'=> 'Imobile',
					'title'	=> 'Imobilele mele',
					'icon'  => 'fa-home',
					'url'	=> URL::route('imobile-index')
				]
		];

		return View::make('hello')->with([
			'title'       => $this->title,
			'small_title' => $this->small,
			'links'       => $links 
			]);
	}

}
