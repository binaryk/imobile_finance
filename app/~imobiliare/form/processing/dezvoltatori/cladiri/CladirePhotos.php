<?php

namespace Imobiliare\Nomenclatoare\Form;

class CladirePhotos extends \Processing\Form\Form
{

    public static function make()
    {
        return self::$instance = new CladirePhotos();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.cladire.photos.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Nomenclatoare|CladirePhotos');
    }

    protected function addControls()
    {
    }
}