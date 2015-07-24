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
	protected $caption = 'Bine ati venit pe aplicatia Imobiliare';
	protected $small = 'aici veti putea gestiona afacerea dvs';

	public function showWelcome() {
		$links = [
			'my-profile' => [
				'bg' => 'blue-madison',
				'header' => 'Apartamente',
				'title' => 'Apartamente',
				'icon' => 'fa-user',
				'url' => URL::route('apartamente_proprietar'),
			],
			'my-imobils' => [
				'bg' => 'red-intense',
				'header' => 'Cautare&Ofertare',
				'title' => 'Cautare&Ofertare',
				'icon' => 'fa-home',
				'url' => URL::route('cautare-apartamente-index'),
			],
			'my-dezvoltators' => [
				'bg' => 'green-haze',
				'header' => 'Dezvoltatori',
				'title' => 'Dezvoltatori',
				'icon' => 'fa-home',
				'url' => URL::route('dezvoltatori-index'),
			],
		];

		return View::make('hello')->with([
			'caption' => $this->caption,
			'small_title' => $this->small,
			'links' => $links,
		]);
	}

	public function lockScreen() {
		$user = $this->current_user;
		return View::make('account.lock')->with(compact('user'));
	}

}
