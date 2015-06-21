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
/*id_judet
id_localitate,id_cartier,id_cladire,id_imobil,id_organizatie,id_proprietar_pf,id_tip_cladire,id_tip_finisaje_interioare,
id_tip_compartiment,is_agentie,id_img,oferta_valabila,pret_m2,ultima_actualizare,suprafata_min,suprafata_max,email,
telefon,telefon_secundar_1,telefon_secundar_2,nr_camere,credit_prima_casa,nr_etaj,nr_balcoane,anul_constructiei,
nr_bai,detalii_bacoane,id_sistem_incalzire,termopan,parcare,accepta_prima_casa,zona_aproximativa,adresa_exacta,
detalii,detalii_private, contoare_gaz
parchet
faianta
aer_conditionat
uscator
centrala_termica
contoare_apa
zugravit_lavabil
tv_cablu
loc_pod
usa_atiefractie
modificari_interioare
gresie
balcoane_inchise
has_telefon
loc_pivnita
parcare
tip_acoperis
tip_confort
*/       
        $this
        // 0
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon')
                ->caption('Telefon apartament')
                // ->placeholder('Telefon apartament')
                ->class('form-control data-source')
                ->controlsource('telefon')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 1
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon_secundar_1')
                ->caption('Telefon secundar 1')
                // ->placeholder('Telefon secundar 1')
                ->class('form-control data-source')
                ->controlsource('telefon_secundar_1')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 2
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('telefon_secundar_2')
                ->caption('Telefon secundar 2')
                // ->placeholder('Telefon secundar 2')
                ->class('form-control data-source')
                ->controlsource('telefon_secundar_2')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 3
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('email')
                ->caption('Email')
                // ->placeholder('Email')
                ->class('form-control data-source')
                ->controlsource('email')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        // 4
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Agentie')->name('is_agentie')->placeholder('Textbox')
        ->value('Bifati daca este agentie')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('is_agentie', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'is_agentie', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'is_agentie', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        // 5
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_cartier')
                ->caption('Cartier')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('id_cartier')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Cartier::toCombobox())
            )
        // 6
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('nr_camere')
                ->caption('Nr camere')
                // ->placeholder('Nr camere')
                ->class('form-control data-source')
                ->controlsource('nr_camere')
                ->controltype('textbox')
                ->maxlength(255)
        ) 
        // 7
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_compartiment')
                ->caption('Tip compartimentare')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('id_tip_compartiment')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipCompartiment::toCombobox())
            )
        // 8
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('suprafata')
                ->caption('Suprafata (mp)')
                // ->placeholder('Suprafata (mp)')
                ->class('form-control data-source'  )
                ->controlsource('suprafata')
                ->controltype('textbox')
                ->maxlength(255)
        )  
        // 9 asta nu se foloseste
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('suprafata_max')
                ->caption('Suprafata maxima')
                // ->placeholder('Suprafata maxima')
                ->class('form-control data-source')
                ->controlsource('suprafata_max')
                ->controltype('textbox')
                ->maxlength(255)
        )  
        // 10
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('nr_etaj')
                ->caption('Etaj')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('nr_etaj')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipEtaj::toCombobox())
            ) 

        // 11
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_finisaje_interioare')
                ->caption('Tip finisaje interioare')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('id_tip_finisaje_interioare')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipFinisajeInterioare::toCombobox())
            )

        // 12
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('nr_bai')
                ->caption('Numar băi')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('nr_bai')
                ->controltype('combobox') 
                ->enabled('false')
                ->options([ '' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4' ])
            )

        // 13
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('nr_balcoane')
                ->caption('Balcon')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('nr_balcoane')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipNrBalcoane::toCombobox())
            ) 
        // 14
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('detalii_bacoane')
                ->caption('Detalii despre balcoane')
                // ->placeholder('Detalii despre balcoane')
                ->class('form-control data-source')
                ->controlsource('detalii_bacoane')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 15
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('anul_constructiei')
                ->caption('Anul constructiei')
                // ->placeholder('Anul constructiei')
                ->class('form-control data-source')
                ->controlsource('anul_constructiei')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 16
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Parcare')->name('parcare')->placeholder('Textbox')
        ->value('Bifati daca are parcare')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('parcare', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'parcare', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'parcare', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        ) 

        // 17
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Accepta credit prima casa')->name('credit_prima_casa')->placeholder('Textbox')
        ->value('Accepta credit prima casa')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('credit_prima_casa', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'credit_prima_casa', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'credit_prima_casa', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )
        // 18
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('zona_aproximativa')
                ->caption('Zona aproximativa')
                // ->placeholder('Detalii privind zona aproximativa')
                ->class('form-control data-source')
                ->controlsource('zona_aproximativa')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 19
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('adresa_exacta')
                ->caption('Adresa exacta')
                // ->placeholder('Detalii privind adresa exacta')
                ->class('form-control data-source')
                ->controlsource('adresa_exacta')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 20
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                ->name('pret_m2')
                ->caption('Pret')
                // ->placeholder('Pret')
                ->class('form-control data-source')
                ->controlsource('pret_m2')
                ->controltype('textbox')
                ->maxlength(255)
        )
        // 21
        ->addControl(
            \Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
            ->name('detalii')
            ->caption('Detalii')
            // ->placeholder('Detalii')
            ->controlsource('detalii')
            ->controltype('editbox')
            ->class('form-control input-sm data-source')
        ) 
        // 22
        ->addControl(
            \Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
                ->name('detalii_private')
                ->caption('Detalii private')
                // ->placeholder('Detalii private')
                ->controlsource('detalii_private')
                ->controltype('editbox') 
                ->class('form-control input-sm data-source')
        )

        // 23
        ->addControl(
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                ->name('ultima_actualizare')->caption('Ultima actualizare')->placeholder('Ultima actualizare')
                ->class('form-control data-source')->readonly(1)
                ->controlsource('ultima_actualizare')->controltype('textbox')
                ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL]) 
            )

        // 24
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('id_tip_garaj')
                ->caption('Garaj')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('id_tip_garaj')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipGaraj::toCombobox())
            )

        // 25
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Geamuri termopan')->name('termopan')->placeholder('Textbox')
        ->value('Bifati daca are termopan')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('termopan', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'termopan', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'termopan', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )

        // 26
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Contoare gaz')->name('contoare_gaz')->placeholder('Textbox')
        ->value('Bifati daca are contoare gaz')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('contoare_gaz', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'contoare_gaz', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'contoare_gaz', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )

        // 27
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Parchet')->name('parchet')->placeholder('Textbox')
        ->value('Bifati daca are parchet')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('parchet', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'parchet', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'parchet', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )

        // 28
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Faianta')->name('faianta')->placeholder('Textbox')
        ->value('Bifati daca are faianta')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('faianta', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'faianta', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'faianta', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )

        // 29
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Aer conditionat')->name('aer_conditionat')->placeholder('Textbox')
        ->value('Bifati daca are aer conditionat')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('aer_conditionat', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'aer_conditionat', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'aer_conditionat', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
        )

        // 30
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Uscator')->name('uscator')->placeholder('Textbox')
        ->value('Bifati daca are uscator')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('uscator', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'uscator', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'uscator', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
            )

        // 31
        ->addControl(
            \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('tip_acoperis')
                ->caption('Acoperis')
                ->class('form-control data-source input-group form-select init-on-update-delete')
                ->controlsource('tip_acoperis')
                ->controltype('combobox') 
                ->enabled('false')
                ->options(\Imobiliare\Nomenclator\TipAcoperis::toCombobox())
        ) 

        // 32
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Centrala termica')->name('centrala_termica')->placeholder('Textbox')
        ->value('Bifati daca are centrala termica')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('centrala_termica', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'centrala_termica', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'centrala_termica', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
            )

        // 33
        ->addControl(
            \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
        ->caption('Contoare apa')->name('contoare_apa')->placeholder('Textbox')
        ->value('Bifati daca are contoare apa')->class('form-control input_label')->enabled(0)
        ->addon([
            'before' => \Form::checkbox('contoare_apa', '1', false, 
                ['class' => 'data-source icheck', 'id' => 'contoare_apa', 
                'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'contoare_apa', 
                'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                ), 
            'after' => NULL])
            )
        // 34
         ->addControl(
             \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                 ->name('tip_confort')
                 ->caption('Confort')
                 ->class('form-control data-source input-group form-select init-on-update-delete')
                 ->controlsource('tip_confort')
                 ->controltype('combobox') 
                 ->enabled('true')
                 ->options(\Imobiliare\Nomenclator\TipConfort::toCombobox())
         ) 


         // 35
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Zugravit lavabil')->name('zugravit_lavabil')->placeholder('Textbox')
         ->value('Bifati daca este zugravit lavabil')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('zugravit_lavabil', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'zugravit_lavabil', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'zugravit_lavabil', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 36
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('TV cablu')->name('tv_cablu')->placeholder('Textbox')
         ->value('Bifati daca are tv cablu')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('tv_cablu', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'tv_cablu', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'tv_cablu', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 37
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Loc in pod')->name('loc_pod')->placeholder('Textbox')
         ->value('Bifati daca are loc in pod')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('loc_pod', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'loc_pod', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'loc_pod', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 38
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Usa antiefractie')->name('usa_atiefractie')->placeholder('Textbox')
         ->value('Bifati daca are usa atiefractie')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('usa_atiefractie', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'usa_atiefractie', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'usa_atiefractie', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 39
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Modificari interioare')->name('modificari_interioare')->placeholder('Textbox')
         ->value('Bifati daca s-au facut modificari interioare')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('modificari_interioare', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'modificari_interioare', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'modificari_interioare', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 40
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Gresie')->name('gresie')->placeholder('Textbox')
         ->value('Bifati daca are gresie')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('gresie', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'gresie', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'gresie', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 41
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Balcoane inchise')->name('balcoane_inchise')->placeholder('Textbox')
         ->value('Bifati daca are balcoane inchise')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('balcoane_inchise', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'balcoane_inchise', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'balcoane_inchise', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 42
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Telefon')->name('has_telefon')->placeholder('Textbox')
         ->value('Bifati daca are telefon')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('has_telefon', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'has_telefon', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'has_telefon', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // 43
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
         ->caption('Loc in pivnita')->name('loc_pivnita')->placeholder('Textbox')
         ->value('Bifati daca are loc in pivnita')->class('form-control input_label')->enabled(0)
         ->addon([
             'before' => \Form::checkbox('loc_pivnita', '1', false, 
                 ['class' => 'data-source icheck', 'id' => 'loc_pivnita', 
                 'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'loc_pivnita', 
                 'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
                 ), 
             'after' => NULL])
             )
         // Detalii proprietar
         // 44
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                 ->name('nume_proprietar')
                 ->caption('Nume proprietar') 
                 ->class('form-control data-source')
                 ->controlsource('nume_proprietar')
                 ->controltype('textbox')
                 ->maxlength(255)
         )
         // 45 
         ->addControl(
             \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                 ->name('nume')
                 ->caption('Nume') 
                 ->class('form-control data-source')
                 ->controlsource('nume')
                 ->controltype('textbox')
                 ->maxlength(255)
         ) 
        ;

    }
}