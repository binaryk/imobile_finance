<?php

class Sidebar
{

	protected static $instance = NULL;

	protected $sidebar = [
        'principal' => [
            'header' => [
                'caption' => 'Principala',
                'icon'    => 'icon-home'
            ],
            'options' => [],
            'active'  => []
        ],
		'dezvoltatori' => [
			'header' => [
				'caption' => 'Dezvoltatori',
				'icon'  => 'icon-user'
			],
			'options' => [],
			'active'  => ['dezvoltatori*']
		],
		'imobile' => [
			'header' => [
				'caption' => 'Imobile',
				'icon'  => 'icon-home'
			],
			'options' => [],
			'active'  => ['proprietari']
		],
        'date-baza' => [
            'header' => [
                'caption' => 'Date de baza',
                'icon'  => 'icon-folder '
            ],
            'options' => [],
            'active'  => ['nomenclatoare/tip_intermediar','nomenclatoare/tip_categorie_imobil','nomenclatoare/tip_stadii_ansamblu','nomenclatoare/tip_imobile','nomenclatoare/judet']
        ],

	];

	protected function addOption($group, $url, $caption, $icon)
	{
		$this->sidebar[$group]['options'][] = [
			'url'     => $url,
			'caption' => $caption,
			'icon'    => $icon
		];

		return $this;
	}

	public function __construct()
	{
		$this
		/**
		NOMENCLATOARE
		**/
		->addOption('date-baza', \URL::route('datatable-index', ['id' => 'tip_intermediar']), 'Tipuri de intermediari', 'fa-circle-o')
		->addOption('date-baza', \URL::route('datatable-index', ['id' => 'tip_categorie_imobil']), 'Tipuri categorii imobile', 'fa-circle-o')
		->addOption('date-baza', \URL::route('datatable-index', ['id' => 'tip_stadii_ansamblu']), 'Tipuri stadii ansamblu', 'fa-circle-o')
		->addOption('date-baza', \URL::route('datatable-index', ['id' => 'tip_imobile']), 'Tipuri imobile', 'fa-circle-o')
		->addOption('date-baza', \URL::route('datatable-index', ['id' => 'judet']), 'Judet', 'fa-circle-o')
		/**
		 Dezvoltatori
		**/
		->addOption('dezvoltatori', \URL::route('dezvoltatori-index'), 'Dezvoltatori', 'fa-circle-o')
		->addOption('imobile', \URL::route('proprietar-index'), 'Apartamente', 'fa-circle-o')
		;
	}

	public static function make()
	{
		return self::$instance = new Sidebar();

	}

	public function OutGroupHeader( $header )
	{
        return '<a href="javascript:;">
		<i class="'. $header ['icon'] .'"></i>
		<span class="title">'. $header ['caption'] .'</span>
		<span class="selected"></span>
		<span class="arrow open"></span>
		</a>';

//		return '<a href="#"><i class="fa ' . $header['icon'] . '"></i><span>' . $header ['caption'] . '</span><i class="fa fa-angle-left pull-right"></i></a>';
	}

	public function OutOption( $option )
	{
		return '<li><a href="' . $option['url'] . '"><i class="fa ' . $option['icon'] . '"></i><span>' . $option['caption'] . '</span></a></li>';
	}

	protected function _active($actives)
	{
		$result = '';
		foreach($actives as $i => $item)
		{
			if(\Request::is($item))
			{
				return ' active open';
			}
		}
		return $result;
	}

	public function OutGroup($group)
	{
		$result = $this->OutGroupHeader( $group['header'] );
		$result .= '<ul class="sub-menu">';
		foreach($group['options'] as $key => $option)
		{
			$result .= $this->OutOption($option);
		}
		$result .= '</ul>';
		return $result;
	}

	public function Out()
	{

		$result = '';
		foreach($this->sidebar as $key => $group)
		{
			$result .= '<li class="start' . $this->_active($group['active'])  . '">' . $this->OutGroup($group) . '</li>';
		}
		return $result;
	}
}