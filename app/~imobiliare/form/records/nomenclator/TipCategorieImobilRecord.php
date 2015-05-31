<?php

namespace Imobiliare\Nomenclatoare\Form;

class TipCategorieImobilRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare Tip categorie imobil')
		->setCaption('update', 'Modificare Tip categorie imobil (#:id:)')
		->setCaption('delete', 'Ştergere Tip categorie imobil (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea categoriei de imobil a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea categoriei de imobil <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea categoriei de imobil a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea categoriei de imobil <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea categoriei de imobil a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea categoriei de imobil <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		->addRule('update', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Denumirea categoriei de imobil trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea categoriei de imobil trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new TipCategorieImobilRecord('tip_categorie_imobil');
	}
	
}