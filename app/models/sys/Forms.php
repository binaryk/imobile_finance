<?php

namespace Imobiliare;

class Forms
{

	protected static $instance = NULL;
	protected $forms =[];

	protected $maps = [
		'tip_intermediar'        => '\Imobiliare\Nomenclatoare\Form\TipIntermediariRecord',
		'tip_categorie_imobil'   => '\Imobiliare\Nomenclatoare\Form\TipCategorieImobilRecord',
		'tip_stadii_ansamblu'    => '\Imobiliare\Nomenclatoare\Form\TipStadiiAnsambluRecord',
		'tip_imobile'    		 => '\Imobiliare\Nomenclatoare\Form\TipImobilRecord',
		'judet'    		 		 => '\Imobiliare\Nomenclatoare\Form\JudetRecord',
		'localitati'    		 => '\Imobiliare\Nomenclatoare\Form\LocalitateRecord',
		'dezvoltatori'    		 => '\Imobiliare\Nomenclatoare\Form\DezvoltatoriRecord',
	];

	public function __construct($id)
	{
		$this->addForm( call_user_func([$this->maps[$id], 'create']));
	}

	protected function addForm( FormsRecord $form)
	{
		$this->forms[$form->id] = $form;
		return $this;
	}

	public static function make($id)
	{
		return self::$instance = new Forms($id);
	}

	public function toFormConfig($id)
	{
		$record = $this->forms[$id];
		$result = new \StdClass();
		$result->captions = $record->captions(); 
		$result->buttons = $record->buttons(); 
		return $result;
	}

	public function toActionConfig($id)
	{
		$record = $this->forms[$id];
		$result = new \StdClass();
		$result->feedback = $record->feedback(); 
		$result->rules    = $record->rules();
		$result->messages = $record->messages();
		return $result;
	}

}