<?php

namespace Imobiliare\Imobile\Form;

class ApartamentImobil extends \Processing\Form\Form
{

    /**
     * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
     */
    public static function make()
    { 
        return self::$instance = new ApartamentImobil();
    }

    protected function setView()
    {
        $this->view('dezvoltatori.ansambluri.imobile.apartament.form');
    }

    protected function setModel()
    {
        $this->model('Imobiliare|Apartament');
    }

    protected function addControls()
    {
        // id_judet
// id_localitate,id_cartier,id_cladire,id_imobil,id_organizatie,id_proprietar_pf,id_tip_cladire,id_tip_finisaje_interioare,
// id_tip_compartiment,is_agentie,id_img,oferta_valabila,pret_m2,ultima_actualizare,suprafata_min,suprafata_max,email,
// telefon,telefon_secundar_1,telefon_secundar_2,nr_camere,credit_prima_casa,nr_etaj,nr_balcoane,anul_constructiei,
// nr_bai,detalii_bacoane,id_sistem_incalzire,are_termopane,parcare,accepta_prima_casa,zona_aproximativa,adresa_exacta,
// detalii,detalii_private,        
        $this
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon')
                ->caption('Telefon apartament')
                ->placeholder('Telefon apartament')
                ->class('form-control data-source')
                ->controlsource('telefon')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon_secundar_1')
                ->caption('Telefon secundar 1')
                ->placeholder('Telefon secundar 1')
                ->class('form-control data-source')
                ->controlsource('telefon_secundar_1')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon_secundar_2')
                ->caption('Telefon secundar 2')
                ->placeholder('Telefon secundar 2')
                ->class('form-control data-source')
                ->controlsource('telefon_secundar_2')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('email')
                ->caption('Email')
                ->placeholder('Email')
                ->class('form-control data-source')
                ->controlsource('email')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Agentie')->name('txt-platitor-tva')->placeholder('Textbox')
        ->value('Bifati daca este agentie')->class('form-control')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('is_agentie', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'is_agentie', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'is_agentie', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_cartier')
                ->caption('Cartier')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_cartier')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Cartier::toCombobox())
            )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nr_camere')
                ->caption('Nr camere')
                ->placeholder('Nr camere')
                ->class('form-control data-source')
                ->controlsource('nr_camere')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_compartiment')
                ->caption('Tip compartimentare')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_tip_compartiment')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipCompartiment::toCombobox())
            )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('suprafata_min')
                ->caption('Suprafata minima')
                ->placeholder('Suprafata minima')
                ->class('form-control data-source')
                ->controlsource('suprafata_min')
                ->controltype('textbox')
                ->maxlength(255)
        )  
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('suprafata_max')
                ->caption('Suprafata maxima')
                ->placeholder('Suprafata maxima')
                ->class('form-control data-source')
                ->controlsource('suprafata_max')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nr_etaj')
                ->caption('Etaj')
                ->placeholder('Etaj')
                ->class('form-control data-source')
                ->controlsource('nr_etaj')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_finisaje_interioare')
                ->caption('Tip finisaje interioare')
                ->class('form-control data-source init-on-update-delete')
                ->controlsource('id_tip_finisaje_interioare')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipFinisajeInterioare::toCombobox())
            )

        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nr_bai')
                ->caption('Numar băi')
                ->placeholder('Numar băi')
                ->class('form-control data-source')
                ->controlsource('nr_bai')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nr_balcoane')
                ->caption('Numar balcoane')
                ->placeholder('Numar balcoane')
                ->class('form-control data-source')
                ->controlsource('nr_balcoane')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('detalii_bacoane')
                ->caption('Detalii despre balcoane')
                ->placeholder('Detalii despre balcoane')
                ->class('form-control data-source')
                ->controlsource('detalii_bacoane')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('anul_constructiei')
                ->caption('Anul constructiei')
                ->placeholder('Anul constructiei')
                ->class('form-control data-source')
                ->controlsource('anul_constructiei')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('parcare')
                ->caption('Parcare')
                ->placeholder('Introduceti date doar daca are parcare')
                ->class('form-control data-source')
                ->controlsource('parcare')
                ->controltype('textbox')
                ->maxlength(255)
        )

        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Accepta credit prima casa')->name('txt-platitor-tva')->placeholder('Textbox')
        ->value('Accepta credit prima casa')->class('form-control')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('credit_prima_casa', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'credit_prima_casa', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'credit_prima_casa', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('zona_aproximativa')
                ->caption('Zona aproximativa')
                ->placeholder('Detalii privind zona aproximativa')
                ->class('form-control data-source')
                ->controlsource('zona_aproximativa')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('adresa_exacta')
                ->caption('Adresa exacta')
                ->placeholder('Detalii privind adresa exacta')
                ->class('form-control data-source')
                ->controlsource('adresa_exacta')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('pret_m2')
                ->caption('Pret')
                ->placeholder('Pret')
                ->class('form-control data-source')
                ->controlsource('pret_m2')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('detalii')
                ->caption('Detalii')
                ->placeholder('Detalii')
                ->class('form-control data-source')
                ->controlsource('detalii')
                ->controltype('textbox')
                ->maxlength(255)
        )
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('detalii_private')
                ->caption('Detalii private')
                ->placeholder('Detalii private')
                ->class('form-control data-source')
                ->controlsource('detalii_private')
                ->controltype('textbox')
                ->maxlength(255)
        )

        ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                ->name('ultima_actualizare')->caption('Ultima actualizare')->placeholder('Ultima actualizare')
                ->class('form-control data-source')->readonly(1)
                ->controlsource('ultima_actualizare')->controltype('textbox')
                ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL]) 
            )

        ;

    }
}