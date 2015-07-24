<?php

namespace Dezvoltatori;

class CautareDezvoltatoriController extends \Datatable\DatatableController
{
    protected $layout 		= 'template.layout';

    public function index()
    {
        $config = \Imobiliare\Grids::make('cauta_dezvoltatori')->toIndexConfig('cauta_dezvoltatori');

        $config['caption'] = '<span class="font-blue">Căutare</span> imobil';

        $this->show( $config + ['other-info' => [
                'current_org' => $this->current_org,
                'controls' => $this->controls()
            ]]);
    }

    public function rows()
    {
        $config = \Imobiliare\Grids::make('cauta_dezvoltatori')->toRowDatasetConfig('cauta_dezvoltatori');
        $filters = $config['source']->custom_filters();
        $config['source']->custom_filters( $filters + [
                'oferta-valabila' => 'v_dezvoltatori.id_organizatie = ' . $this->current_org->id,
            ]);
        return $this->dataset( $config );
    }

    public function showDetails($id)
    {
        $apartament = \Imobiliare\Apartament::find($id);
        if( ! $apartament )
        {
            return \Redirect::route('cautare-apartamente-index');
        }
        $this->layout->breadcrumbs = [
            [
                'name' => 'Cautare apartamente',
                'url'  => "cautare-apartamente-index",
                'ids' => ''
            ],
            [
                'name' => 'Detalii apartament',
                'url'  => "apartament-detalii-oferta",
                'ids' =>  $id
            ]
        ];
        $this->layout->content = \View::make('apartamente.detalii.index')->with([
            'record'   		=> $apartament,
            'photos'        => \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament', $apartament->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get(),
            'sections'      => [
                'tab1' => [
                    'caption' => 'Localizare',
                    'view' => '1'
                ],
                'tab2' => [
                    'caption' => 'Date generale',
                    'view' => '2'
                ],
                'tab3' => [
                    'caption' => 'Date suplimentare',
                    'view' => '3'
                ],
                'tab4' => [
                    'caption' => 'Poze',
                    'view' => '4'
                ],
                'tab5' => [
                    'caption' => 'Proprietar',
                    'view' => '5'
                ]
            ]
        ]);
    }

    public function downloadPDF($id)
    {
        $apartament = \Imobiliare\Apartament::find($id);
        if( ! $apartament )
        {
            return \Redirect::route('cautare-apartamente-index');
        }
        $apartament->current_user = $this->current_user;
        $apartament->current_org = $this->current_org;
        $pdf = new CreateOfertaPdf('P', 'A4', 'D', $apartament, false);
        $pdf->Output();
    }

    public function openPDF($id)
    {
        $apartament = \Imobiliare\Apartament::find($id);
        if( ! $apartament )
        {
            return \Redirect::route('cautare-apartamente-index');
        }
        $apartament->current_user = $this->current_user;
        $apartament->current_org = $this->current_org;
        $pdf = new CreateOfertaPdf('P', 'A4', 'I', $apartament, false);
        $pdf->Output();
    }

    public function downloadPDFredus($id)
    {
        $apartament = \Imobiliare\Apartament::find($id);
        if( ! $apartament )
        {
            return \Redirect::route('cautare-apartamente-index');
        }
        $apartament->current_user = $this->current_user;
        $apartament->current_org = $this->current_org;
        $pdf = new CreateOfertaPdf('P', 'A4', 'D', $apartament, true);
        $pdf->Output();
    }

    public function openPDFredus($id)
    {
        $apartament = \Imobiliare\Apartament::find($id);
        if( ! $apartament )
        {
            return \Redirect::route('cautare-apartamente-index');
        }
        $apartament->current_user = $this->current_user;
        $apartament->current_org = $this->current_org;
        $pdf = new CreateOfertaPdf('P', 'A4', 'I', $apartament, true);
        $pdf->Output();
    }

    public function loadPhoto()
    {
        $photo = \Imobiliare\Nomenclatoare\ApartamentPhotos::find( (int) \Input::get('id_photo') );
        return
            \Response::json(['img' => '<img src="' . (string) \Image::make($photo->file_name)->resize(480, NULL, function ($constraint){$constraint->aspectRatio(); $constraint->upsize();})->encode('data-url') . '" style="width: 480px; display: block;"/>']);
    }

    public function searchPhone()
    {
        $data =
            \DB::select("
				SELECT * FROM v_telefoane WHERE telefon LIKE '%" . ($searched = \Input::get('q')) . "%'
			");
        if( count($data) == 0)
        {
            $data[0] = new \StdClass();
            $data[0]->id = 'not-exist';
            $data[0]->telefon = $searched;
            $data[0]->nume = '<span class="label label-sm label-danger">Nu exista</span>';
            $data[0]->phone_type = 'Selectaţi pentru adăugare';
        }
        return \Response::json(['searched' => $searched, 'items' => $data]);
    }

    public function schimbaOfertaValabila()
    {
        if( $apartament = \Imobiliare\Apartament::find( (int) \Input::get('id') ) )
        {
            $apartament->oferta_valabila = 1 - (int) \Input::get('status');
            $apartament->save();
            $result = ['success' => true, 'apartament' => $apartament];
        }
        else
        {
            $result = ['success' => false];
        }
        return \Response::json($result);

    }

    public function schimbaDataActualizare()
    {
        if( $apartament = \Imobiliare\Apartament::find( (int) \Input::get('id') ) )
        {
            $apartament->ultima_actualizare = \Carbon\Carbon::now()->format('Y-m-d');
            $apartament->save();
            $result = ['success' => true, 'apartament' => $apartament];
        }
        else
        {
            $result = ['success' => false];
        }
        return \Response::json($result);

    }


    protected function controls()
    {
        return [
            // [1] = daca oferta este valabila sa nu
            'oferta-valabila' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('oferta_valabila')->caption('Oferta valabila')
                    ->class('form-control input-sm data-source')
                    ->controlsource('oferta_valabila')->controltype('combobox')
                    ->options([-1 => 'Toate (cu oferta valabila sau nu)', 0 => 'Fara oferta valabila', 1 => 'Doar cele cu oferta valabila']),
            // [2] = nume dezvoltator
            'dezvoltator' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('dezvoltator')
                    ->caption('Nume dezvoltator')
                    ->placeholder('Nume dezvoltator')
                    ->class('form-control data-source input-sm')
                    ->controlsource('dezvoltator')
                    ->controltype('textbox')
                    ->maxlength(255),
            // [2] = nume dezvoltator
            'cladire' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('cladire')
                    ->caption('Nume cladire')
                    ->placeholder('Nume cladire')
                    ->class('form-control data-source input-sm')
                    ->controlsource('cladire')
                    ->controltype('textbox')
                    ->maxlength(255),
            // [2] = nume imobil
            'imobil' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('imobil')
                    ->caption('Nume imobil')
                    ->placeholder('Nume imobil')
                    ->class('form-control data-source input-sm')
                    ->controlsource('imobil')
                    ->controltype('textbox')
                    ->maxlength(255),
//            adresa
            'adresa_exacta' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('adresa_apartament')
                    ->caption('Strada apartament')
                    ->placeholder('Nume adresa')
                    ->class('form-control data-source input-sm')
                    ->controlsource('adresa_apartament')
                    ->controltype('textbox')
                    ->maxlength(255),
            // [2] = nume dezvoltator
            'ansamblu' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('ansamblu')
                    ->caption('Nume ansamblu')
                    ->placeholder('Nume ansamblu')
                    ->class('form-control data-source input-sm')
                    ->controlsource('ansamblu')
                    ->controltype('textbox')
                    ->maxlength(255),
            // [3] = numarul de camere
            'nr_camere_min' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_camere_min')
                    ->caption('Numarul de camere')
                    ->placeholder('De la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('nr_camere_min')
                    ->controltype('textbox'),
            'nr_camere_max' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_camere_max')
                    ->caption('&nbsp;')
                    ->placeholder('Pana la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('nr_camere_max')
                    ->controltype('textbox'),
            // [3] = suprafata utila
            'suprafata_utila_min' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('suprafata_utila_min')
                    ->caption('Suprafata utila')
                    ->placeholder('De la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('suprafata_utila_min')
                    ->controltype('textbox'),
            'suprafata_utila_max' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('suprafata_utila_max')
                    ->caption('&nbsp;')
                    ->placeholder('Pana la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('suprafata_utila_max')
                    ->controltype('textbox'),
            // [4] = pretul
            'pret_m2_min' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('pret_m2_min')
                    ->caption('Pretul')
                    ->placeholder('De la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('pret_m2_min')
                    ->controltype('textbox'),
            'pret_m2_max' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('pret_m2_max')
                    ->caption('&nbsp;')
                    ->placeholder('Pana la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('pret_m2_max')
                    ->controltype('textbox'),
            // [5] = daca este agentie sau nu
            /**
             * 25.06.2015 - Issue #2: 14.2 Dispare cautarea dupa campul “Este agentie”
             * Calin Verdes - COMPTECH SOFT
             **/
            /*
            'is_agentie' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                ->name('is_agentie')->caption('Este agentie')
                ->class('form-control input-sm data-source')
                ->controlsource('is_agentie')->controltype('combobox')
                ->options([-1 => 'Toate (agentii sau nu)', 0 => 'Fara agentii', 1 => 'Doar agentiile']),
            */
            // [6] = data ultima actualizare
            'data_finalizare_cladire' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('perioada')
                    ->caption('Perioada finalizarii cladirii')
                    ->placeholder('Perioada finalizarii')
                    ->value('01.01.2005 - ' . \Carbon\Carbon::now()->format('d.m.Y'))
                    ->class('form-control input-sm perioada-picker')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL]),
            'data_finalizare_ansamblu' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
                    ->name('perioada_ansamblu')
                    ->caption('Perioada finalizarii ansamblului')
                    ->placeholder('Perioada finalizarii')
                    ->value('01.01.2005 - ' . \Carbon\Carbon::now()->format('d.m.Y'))
                    ->class('form-control input-sm perioada-picker')
                    ->addon(['before' => '<i class="fa fa-calendar"></i>', 'after' => NULL]),
            // [7] = telefon, telefon 1, telefon 2
            'telefon' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('telefon')
                    ->caption('Numar de telefon')
                    ->placeholder('Telefon')
                    ->class('form-control data-source input-sm')
                    ->controlsource('telefon')
                    ->controltype('textbox')
                    ->maxlength(255),
            // [8] = daca este credit prima casa sau nu
            'credit_prima_casa' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('credit_prima_casa')->caption('Accepta credit prima casa')
                    ->class('form-control input-sm data-source')
                    ->controlsource('credit_prima_casa')->controltype('combobox')
                    ->options([-1 => 'Toate (accepta sau nu)', 0 => 'Nu accepta', 1 => 'Accepta']),
            // [9] = etajul
            'nr_etaj_min' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_etaj_min')
                    ->caption('Numarul de etaje')
                    ->placeholder('De la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('nr_etaj_min')
                    ->controltype('textbox'),
            'nr_etaj_max' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('nr_etaj_max')
                    ->caption('&nbsp;')
                    ->placeholder('Pana la')
                    ->class('form-control data-source input-sm')
                    ->controlsource('nr_etaj_max')
                    ->controltype('textbox'),
            // [10] = tip finisare
            'id_tip_finisaje_interioare' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('id_tip_finisaje_interioare')->caption('Finisaje interioare')
                    ->class('form-control input-sm data-source')
                    ->controlsource('id_tip_finisaje_interioare')->controltype('combobox')
                    ->options(\Imobiliare\Nomenclator\TipFinisajeInterioare::ToCombobox('- Toate -')),
            //
            'id_tip_stadiu_cladire' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('id_tip_stadiu_cladire')->caption('Stadiu cladire')
                    ->class('form-control input-sm data-source')
                    ->controlsource('id_tip_stadiu_cladire')->controltype('combobox')
                    ->options(\Imobiliare\Nomenclator\TipStadiuAnsamblu::ToCombobox('- Toate -')),
            'id_tip_stadiu_ansamblu' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('id_tip_stadiu_ansamblu')->caption('Stadiu ansamblu')
                    ->class('form-control input-sm data-source')
                    ->controlsource('id_tip_stadiu_ansamblu')->controltype('combobox')
                    ->options(\Imobiliare\Nomenclator\TipStadiuAnsamblu::ToCombobox('- Toate -')),
            // [11] = compartimentare
            'id_tip_compartiment' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('id_tip_compartiment')->caption('Tip compartiment')
                    ->class('form-control input-sm data-source')
                    ->controlsource('id_tip_compartiment')->controltype('combobox')
                    ->options(\Imobiliare\Nomenclator\TipCompartiment::ToCombobox('- Toate -')),

            /**
             * 25.96.2015 - Issue #2
             * Calin Verdes. COMPTECH SOFT
             * Actualizare formular cautare
             **/
            // [12] = cartier
            'id_cartier' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('id_cartier')->caption('Cartier')
                    ->class('form-control input-sm data-source')
                    ->controlsource('id_cartier')->controltype('combobox')
                    ->options(\Imobiliare\Cartier::ToCombobox('- Toate -')),
            // [12] = cartier
            'id_localitate' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('id_localitate')->caption('Localitate')
                    ->class('form-control input-sm data-source')
                    ->controlsource('id_localitate')->controltype('combobox')
                    ->options(\Imobiliare\Nomenclator\Localitate::ToCombobox('- Toate -')),
            // [13] = tip imobil
            'tip_imobil' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('tip_imobil')->caption('Tip imobil')
                    ->class('form-control input-sm data-source')
                    ->controlsource('tip_imobil')->controltype('combobox')
                    ->options(\Imobiliare\Nomenclator\TipImobil::ToCombobox('- Toate -')),
            // [14] = vechime imobil
            'vechime_imobil' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('vechime_imobil')->caption('Vechime imobil')
                    ->class('form-control input-sm data-source')
                    ->controlsource('vechime_imobil')->controltype('combobox')
                    ->options([-1 => 'Toate (vechi sau noi)', 1 => 'Imobil nou', 0 => 'Imobil vechi']),

            /**
             *  26.06.2015 - Telefoane select2
             **/
            'cbo_telefon' =>
                \Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
                    ->name('cbo_telefon')->caption('Telefon')
                    ->class('form-control input-sm data-source')
                    ->controlsource('cbo_telefon')->controltype('combobox')
                    ->options([]),
        ];
    }
}