<?php

namespace Imobiliare\Imobile\Form;

class CladireImobil extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new CladireImobil();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.cladire.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Cladire');
    }

    protected function addControls()
    {
        // denumire_tip
        /*id_localitate
        id_tip_destinatie
        id_tip_regim_inaltime
        id_tip_stadiu
        nr_spatii_indivize
        nume
        ascensor
        adresa
        telefon
        email
        carte_funciara
        id_tip_categorie
        dotari
        cota_indiviza
        perioada_constructie
        suprafata_utila
        id_cartier
        climatizare
        mansarda
        observatii*/
        $this
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nume')
                ->caption('Nume cladire')
                ->placeholder('Nume cladire')
                ->class('form-control data-source')
                ->controlsource('nume')
                ->controltype('textbox')
                ->maxlength(255)
        )

        ->addControl( // 11 Judet
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_localitate')->caption('Localitate')
                ->class('form-control  data-source init-on-update-delete')
                ->controlsource('id_localitate')->controltype('combobox')->options(\Imobiliare\Nomenclator\Localitate::toCombobox())
        )
        ->addControl( // 11 Judet
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_cartier')->caption('Cartierul')
                ->class('form-control  data-source init-on-update-delete')
                ->controlsource('id_cartier')->controltype('combobox')->options(\Imobiliare\Cartier::toCombobox())
        ) 
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_regim_inaltime')
                ->caption('Regim inaltime')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_tip_regim_inaltime')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipRegimInaltime::toCombobox())
            ) 
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_stadiu')
                ->caption('Stadiu cladire')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_tip_stadiu')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipStadiuAnsamblu::toCombobox())
            ) 
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nr_spatii_indivize')
                ->caption('Numar spatii indivize')
                ->placeholder('Numar spatii indivize')
                ->class('form-control data-source')
                ->controlsource('nr_spatii_indivize')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Ascensor')->name('txt-ascensor')->placeholder('Textbox')
        ->value('Ascensor')->class('form-control')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('ascensor', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'ascensor', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'ascensor', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('adresa')
                ->caption('Adresa')
                ->placeholder('Adresa')
                ->class('form-control data-source')
                ->controlsource('adresa')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon')
                ->caption('Telefon cladire')
                ->placeholder('Telefon cladire')
                ->class('form-control data-source')
                ->controlsource('telefon')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('email')
                ->caption('Email cladire')
                ->placeholder('Email cladire')
                ->class('form-control data-source')
                ->controlsource('email')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('carte_funciara')
                ->caption('Carte funciara')
                ->placeholder('Carte funciara')
                ->class('form-control data-source')
                ->controlsource('carte_funciara')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_categorie')
                ->caption('Categorie cladire')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_tip_categorie')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipCategorieCladire::toCombobox())
            )
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_destinatie')
                ->caption('Destinatie')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_tip_destinatie')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipDestinatieCladire::toCombobox())
            )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('dotari')
                ->caption('Dotari')
                ->placeholder('Introduceti un text cu dotarile cladirii')
                ->class('form-control data-source')
                ->controlsource('dotari')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('cota_indiviza')
                ->caption('Cota indiviza')
                ->placeholder('Cota indiviza')
                ->class('form-control data-source')
                ->controlsource('cota_indiviza')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('perioada_constructie')
                ->caption('Perioada constructie')
                ->placeholder('Perioada constructie')
                ->class('form-control data-source')
                ->controlsource('perioada_constructie')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Climatizare')->name('txt-ascensor')->placeholder('Textbox')
        ->value('Climatizare')->class('form-control')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('climatizare', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'climatizare', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'climatizare', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Mansarda')->name('txt-mansarda')->placeholder('Textbox')
        ->value('Mansarda')->class('form-control')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('mansarda', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'mansarda', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'mansarda', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('observati')
                ->caption('Observati')
                ->placeholder('Introduceti un text observatii')
                ->class('form-control data-source')
                ->controlsource('observati')
                ->controltype('textbox')
                ->maxlength(255)
        )



        ;

    }
}