<?php

namespace Imobiliare\Nomenclatoare\Form;

class AnsambluPhotos extends \Processing\Form\Form
{

    public static function make()
    {
        return self::$instance = new AnsambluPhotos();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.photos.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Nomenclatoare|AnsambluPhotos');
    }

    protected function addControls()
    {
    }
}