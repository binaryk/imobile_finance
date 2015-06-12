<?php

namespace Imobiliare\Nomenclatoare\Form;

class ApartamentPhotos extends \Processing\Form\Form
{

	public static function make()
	{
		return self::$instance = new ApartamentPhotos();
	}

	protected function setView()
	{
		$this->view('proprietari.apartamente.photos.form');
	}

	protected function setModel()
	{
		$this->model('Imobiliare|Nomenclatoare|ApartamentPhotos');
	}

	protected function addControls()
	{
	}
}