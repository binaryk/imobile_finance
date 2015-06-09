<?php

namespace Imobiliare;

/**
 * Class Grids
 * @package Imobiliare
 */
class Grids
{

	protected static $instance = NULL;
	protected $grids =[];

	protected $maps = [
		'imobile' 				 => '\Imobiliare\Imobile\Grid\ImobileRecord',
		'tip_intermediar'   	 => '\Imobiliare\Imobile\Grid\TipIntermediariRecord',
		'tip_categorie_imobil'   => '\Imobiliare\Imobile\Grid\TipCategorieImobilRecord',
		'tip_stadii_ansamblu'    => '\Imobiliare\Imobile\Grid\TipStadiiAnsambluRecord',
		'tip_imobile'  			 => '\Imobiliare\Imobile\Grid\TipImobileRecord',
		'judet'  			 	 => '\Imobiliare\Imobile\Grid\JudetRecord',
		'localitati'  			 => '\Imobiliare\Imobile\Grid\LocalitateRecord',
		'dezvoltatori'  		 => '\Imobiliare\Imobile\Grid\DezvoltatoriRecord',
		'dezvoltator-ansambluri' => '\Imobiliare\Imobile\Grid\DezvoltatoriAnsambluriRecord',
		'ansamblu_imobile' 		 => '\Imobiliare\Imobile\Grid\AnsambluriImobileRecord',
		'apartament_imobil' 	 => '\Imobiliare\Imobile\Grid\ApartamentImobilRecord',
		'cladire_imobil' 	 	 => '\Imobiliare\Imobile\Grid\CladireImobilRecord',
		'teren_imobil' 	 	 	 => '\Imobiliare\Imobile\Grid\TerenImobilRecord',

		'cauta-apartamente'      => 'Apartamente\Grid\ApartamenteRecord',

	];

	public function __construct($id)
	{
//        responsabilitatea lui este de apune in array-ul grids instanta obiectului creat
		$this->addGrid( call_user_func([$this->maps[$id], 'create']));
	}

	protected function addGrid( GridsRecord $grid )
	{
//        aici (in array-ul grids, la key-ul trimis de noi) pune instanta obiectului dorit de noi, fie imobile, fie dezvoltatori etc.
		$this->grids[$grid->id] = $grid;
//        returneaza in constructor
		return $this;
	}
    /**
     * @param $id
     * @return Grids returneaza instanta obiectului particular
     */
    public static function make($id)
	{
		return self::$instance = new Grids($id);
	}

    /**
     * @param $id
     * @return array cu cateva particularitati ale obiectului instantiat
     */
    public function toIndexConfig($id)
	{
//        aici in $this->grids[$id] avem stabilita deja instanta obiectului particular pentru creare
		$record = $this->grids[$id];
        $result = [
			'id' 		     => $record->id,
			'view'		     => $record->view,
			'name'		     => $record->name,
			'display-start'  => $record->display_start,
			'display-length' => $record->display_length,
			'default-order'  => $record->default_order,
			'row-source'	 => \URL::route($record->row_source, ['id' => $record->id]),
			'dom'            => $record->dom,
			'columns'        => $record->columns(),
			'caption'        => $record->caption,
			'icon'           => $record->icon,
			'toolbar'        => $record->toolbar,
			'form'           => $record->form,
			'custom_styles'  => $record->css,
			'custom_scripts' => $record->js,
			'breadcrumbs'    => $record->breadcrumbs
		];
		return $result;
	}

	public function toRowDatasetConfig($id)
	{
		$record = $this->grids[$id];
		$result = [
			'id' 		     => $record->id,
			'source'         => $record->source(),
		];
		return $result;
	}

}