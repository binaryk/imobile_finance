<?php

class Sidebar
{

	protected static $instance = NULL;

	protected $sidebar = [
		'group-nomenclatoare' => [
			'header' => [
				'caption' => 'Nomenclatoare',
				'icon'  => 'fa-cog'
			],
			'options' => [],
			'active'  => ['roles', 'users', 'feedback', 'nomenclatoare/program_operational', 'nomenclatoare/gali']
		] 

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
		->addOption('group-nomenclatoare', \URL::to('cautare-date'), 'Grupuri', 'fa-users')
		;
	}
/*<li>
				<a href="{{ URL::route('verificare-presa') }}">
				<i class="icon-graph"></i>
				Verificare presa</a>
			</li>*/
	public static function make()
	{
		return self::$instance = new Sidebar();

	}

	public function OutGroupHeader( $header )
	{
		return '<a href="#"><i class="fa ' . $header['icon'] . '"></i><span>' . $header ['caption'] . '</span><i class="fa fa-angle-left pull-right"></i></a>';
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
				return ' active selected';
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
			$result .= '<li class="treeview' . $this->_active($group['active'])  . '">' . $this->OutGroup($group) . '</li>';
		}
		return $result;
	}
}