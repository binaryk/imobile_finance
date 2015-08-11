<?php

namespace Imobiliare\Imobile\Form;

class ApartamentImobil extends \Processing\Form\Form {

	/**
	 * @return Dezvoltatori, obiect cu toate textbox-urile, cu blade-ul formularului, modelul, buttons (adauga, salveaza, sterge)
	 */
	public static function make() {
		return self::$instance = new ApartamentImobil();
	}

	protected function setView() {
		$this->view('dezvoltatori.ansambluri.imobile.apartament.form');
	}

	protected function setModel() {
		$this->model('Imobiliare|Apartament');
	}

	protected function addControls() {
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
		strada
		nr_cladire
		scara
		nr_apartament
		id_tip_mobilare
		observatii_caracteristici_generale
		observatii_finisaje_dotari
		observatii_dotari
		observatii_generale
		nr_etaje_cladire
		id_tip_finisaje_externe

		'id_tip_utilitati_existente',
		'front_strada_principala',
		'existenta_drum_de_servitute',
		'existenta_constructie_pe_teren',
		'id_tip_teren',
		'existenta_pud_teren',
		'existenta_puz_teren',
		'regim_inaltime_teren',
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
				->value('Bifați dacă este agentie.')->class('form-control input_label')->enabled(0)
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
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('nr_camere')
				->caption('Numar camere')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('nr_camere')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\NumarCamere::toCombobox())
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
				->class('form-control data-source')
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
				->caption('Etaj apartament')
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
				->options(['' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4'])
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
				->value('Bifați dacă are parcare.')->class('form-control input_label')->enabled(0)
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
				->caption('Accepta credit prima casă')->name('credit_prima_casa')->placeholder('Textbox')
				->value('Bifați dacă acceptă credit prima casă.')->class('form-control input_label')->enabled(0)
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
				->name('strada')
				->caption('Strada')
				// ->placeholder('Detalii privind adresa exacta')
				->class('form-control data-source')
				->controlsource('strada')
				->controltype('textbox')
				->maxlength(255)
		)
		// 20
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('pret_m2')
				->caption('Pret (EUR)')
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
				->value('Bifați dacă are termopan.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are contoare gaz.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are parchet.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are faianta.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are aer conditionat.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are uscator.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are centrala termica.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are contoare apa.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă este zugravit lavabil.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are tv cablu.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are loc in pod.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are usa antiefractie.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă s-au facut modificari interioare.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are gresie.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are balcoane inchise.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are telefon.')->class('form-control input_label')->enabled(0)
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
				->value('Bifați dacă are loc in pivnita.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('loc_pivnita', '1', false,
						['class' => 'data-source icheck', 'id' => 'loc_pivnita',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'loc_pivnita',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 44 nume_apartament
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nume')
				->caption('Titlu apartament (apare in ofertare).')
				->class('form-control data-source')
				->controlsource('nume')
				->controltype('textbox')
				->maxlength(255)
		)
		// 45
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nr_cladire')
				->caption('Număr clădire')
				->class('form-control data-source')
				->controlsource('nr_cladire')
				->controltype('textbox')
				->maxlength(255)
		)
		// 46
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('scara')
				->caption('Scara')
				->class('form-control data-source')
				->controlsource('scara')
				->controltype('textbox')
				->maxlength(255)
		)
		// 47
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('nr_apartament')
				->caption('Număr apartament')
				->class('form-control data-source')
				->controlsource('nr_apartament')
				->controltype('textbox')
				->maxlength(255)
		)

		// 48
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('tip_imobil')
				// ->caption('Tip imobil')
				->class('form-control data-source input-group form-select bs-select init-on-update-delete reset-on-show')
				->controlsource('tip_imobil')
				->controltype('combobox')
				->enabled('true')
				->options(\Imobiliare\Nomenclator\TipImobil::toCombobox())
		)
		// 49
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Imobil nou')->name('vechime_imobil')->placeholder('Textbox')
				->value('Bifați dacă imobilul este nou.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('vechime_imobil', '1', false,
						['class' => 'data-source icheck', 'id' => 'vechime_imobil',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'vechime_imobil',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 50
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('suprafata_teren')
				->caption('Suprafata teren')
				->class('form-control data-source')
				->controlsource('suprafata_teren')
				->controltype('textbox')
				->maxlength(255)
		)
		// 51
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Oferta este valabila')->name('oferta_valabila')->placeholder('Textbox')
				->value('Bifați dacă oferta este valabila.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('oferta_valabila', '1', false,
						['class' => 'data-source icheck', 'id' => 'oferta_valabila',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'oferta_valabila',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 52
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_tip_mobilare')
				->caption('Tip mobilare')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('id_tip_mobilare')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\TipMobilare::toCombobox())
		)

		// 53
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Prețul este negociabil')->name('negociabil')->placeholder('Textbox')
				->value('Bifați daca prețul este negociabil.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('negociabil', '1', false,
						['class' => 'data-source icheck', 'id' => 'negociabil',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'negociabil',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)
		// 54
		->addControl(
			\Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
				->name('observatii_caracteristici_generale')
				->caption('Observații caracteristici generale')
				// ->placeholder('Detalii')
				->controlsource('observatii_caracteristici_generale')
				->controltype('editbox')
				->class('form-control input-sm data-source')
		)
		// 55
		->addControl(
			\Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
				->name('observatii_finisaje_dotari')
				->caption('Observații finisaje și dotări')
				// ->placeholder('Detalii')
				->controlsource('observatii_finisaje_dotari')
				->controltype('editbox')
				->class('form-control input-sm data-source')
		)
		// 56
		->addControl(
			\Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
				->name('observatii_dotari')
				->caption('Observații dotări')
				// ->placeholder('Detalii')
				->controlsource('observatii_dotari')
				->controltype('editbox')
				->class('form-control input-sm data-source')
		)
		// 57
		->addControl(
			\Easy\Form\Editbox::make('~layouts.form.controls.editboxes.editbox')
				->name('observatii_generale')
				->caption('Observații generale')
				// ->placeholder('Detalii')
				->controlsource('observatii_generale')
				->controltype('editbox')
				->class('form-control input-sm data-source')
		)
		// 58
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('nr_etaje_cladire')
				->caption('Etaje cladire')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('nr_etaje_cladire')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\TipEtajCladire::toCombobox())
		)
		// 59
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_tip_finisaje_externe')
				->caption('Tip finisaje exterioare')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('id_tip_finisaje_externe')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\TipFinisajeExterioare::toCombobox())
		)
		// 60
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_localitate')
				->caption('Localitate')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('id_localitate')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\Localitate::toCombobox())
		)
		// 61
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_tip_utilitati_existente')
				->caption('Tip utilități existente')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('id_tip_utilitati_existente')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\TipUtilitatiExistente::toCombobox())
		)
		// 62
		->addControl(
			\Easy\Form\Combobox::make('~layouts.form.controls.comboboxes.combobox')
				->name('id_tip_teren')
				->caption('Tip teren')
				->class('form-control data-source input-group form-select init-on-update-delete')
				->controlsource('id_tip_teren')
				->controltype('combobox')
				->enabled('false')
				->options(\Imobiliare\Nomenclator\TipTeren::toCombobox())
		)
		// 63
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Front stradă principală')->name('front_strada_principala')->placeholder('Textbox')
				->value('Bifați dacă are front la stradă principală.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('front_strada_principala', '1', false,
						['class' => 'data-source icheck', 'id' => 'front_strada_principala',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'front_strada_principala',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)

		// 64
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Există drum de servitute')->name('existenta_drum_de_servitute')->placeholder('Textbox')
				->value('Bifați dacă există drum de servitute.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('existenta_drum_de_servitute', '1', false,
						['class' => 'data-source icheck', 'id' => 'existenta_drum_de_servitute',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'existenta_drum_de_servitute',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)

		// 65
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Există contrucție pe teren')->name('existenta_constructie_pe_teren')->placeholder('Textbox')
				->value('Bifați dacă există contrucție pe teren.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('existenta_constructie_pe_teren', '1', false,
						['class' => 'data-source icheck', 'id' => 'existenta_constructie_pe_teren',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'existenta_constructie_pe_teren',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)

		// 66
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Terenul are PUD')->name('existenta_pud_teren')->placeholder('Textbox')
				->value('Bifați dacă terenul are PUD.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('existenta_pud_teren', '1', false,
						['class' => 'data-source icheck', 'id' => 'existenta_pud_teren',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'existenta_pud_teren',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)

		// 67
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox-addon')
				->caption('Terenul are PUZ')->name('existenta_puz_teren')->placeholder('Textbox')
				->value('Bifați dacă terenul are PUZ.')->class('form-control input_label')->enabled(0)
				->addon([
					'before' => \Form::checkbox('existenta_puz_teren', '1', false,
						['class' => 'data-source icheck', 'id' => 'existenta_puz_teren',
							'data-checkbox' => 'icheckbox_square-green', 'data-control-source' => 'existenta_puz_teren',
							'data-control-type' => 'checkbox', 'data-on' => 1, 'data-off' => 0]
					),
					'after' => NULL])
		)

		// 68
		->addControl(
			\Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
				->name('regim_inaltime_teren')
				->caption('Completați regimul de înălțime')
				// ->placeholder('Detalii privind adresa exacta')
				->class('form-control data-source')
				->controlsource('regim_inaltime_teren')
				->controltype('textbox')
				->maxlength(255)
		)
		;

	}
}