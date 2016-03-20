<?php

class HomeController extends BaseController {
	protected $caption = 'Bine ați venit pe aplicația <u>Finance Flow Imobiliare</u>';
	protected $small = '';

	public function showWelcome2() {
		$links = [
			'my-profile' => [
				'bg' => 'blue-madison',
				'header' => 'Apartamente',
				'title' => 'Apartamente',
				'icon' => 'fa-home',
				'url' => URL::route('apartamente_proprietar'),
			],
			'my-imobils' => [
				'bg' => 'red-intense',
				'header' => 'Cautare&Ofertare',
				'title' => 'Cautare&Ofertare',
				'icon' => 'fa-search',
				'url' => URL::route('cautare-apartamente-index'),
			],
			'my-dezvoltators' => [
				'bg' => 'green-haze',
				'header' => 'Dezvoltatori',
				'title' => 'Dezvoltatori',
				'icon' => 'fa-users',
				'url' => URL::route('dezvoltatori-index'),
			],
			'search-dezvoltators' => [
				'bg' => 'purple-plum',
				'header' => 'Cautare dezvoltatori',
				'title' => 'Cautare dezvoltatori',
				'icon' => 'fa-search-plus',
				'url' => URL::route('cautare_dezvoltatori_index'),
			],
		];

		return View::make('hello')->with([
			'caption' => $this->caption,
			'small_title' => $this->small,
			'links' => $links,
		]);
	}
	public function showWelcome() {
		$links = [
			'my-credite' => [
				'bg' => 'purple-plum',
				'header' => 'Finance flow credite',
				'title' => 'Finance flow credite',
				'icon' => 'fa-home',
				'url' => "http://credite.finance-flow.leed.ro/public/",
			],
			'my-profile' => [
				'bg' => 'blue-madison',
				'header' => 'Apartamente',
				'title' => 'Apartamente',
				'icon' => 'fa-home',
				'url' => URL::route('apartamente_proprietar'),
			],
			'my-imobils' => [
				'bg' => 'red-intense',
				'header' => 'Cautare&Ofertare',
				'title' => 'Cautare&Ofertare',
				'icon' => 'fa-search',
				'url' => URL::route('cautare-apartamente-index'),
			],
			'my-dezvoltators' => [
				'bg' => 'green-haze',
				'header' => 'Dezvoltatori',
				'title' => 'Dezvoltatori',
				'icon' => 'fa-users',
				'url' => URL::route('dezvoltatori-index'),
			],
		/*	'search-dezvoltators' => [
				'bg' => 'purple-plum',
				'header' => 'Cautare dezvoltatori',
				'title' => 'Cautare dezvoltatori',
				'icon' => 'fa-search-plus',
				'url' => URL::route('cautare_dezvoltatori_index'),
			],*/
		];

		return View::make('old_hello')->with([
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
