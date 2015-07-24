<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/22/2015
 * Time: 11:40 AM
 */

namespace Imobiliare\Nomenclatoare\Form;


class ApartamentCladirePhotos extends \Processing\Form\Form
{

    public static function make()
    {
        return self::$instance = new ApartamentCladirePhotos();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.cladire.apartament.photos.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Nomenclatoare|ApartamentPhotos');
    }

    protected function addControls()
    {
    }
}