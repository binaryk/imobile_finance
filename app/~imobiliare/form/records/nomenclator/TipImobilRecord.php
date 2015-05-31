<?php

namespace Imobiliare\Nomenclatoare\Form;

class TipImobilRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare Tip imobil')
		->setCaption('update', 'Modificare Tip imobil (#:id:)')
		->setCaption('delete', 'Ştergere Tip imobil (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea tipului de imobil a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea tipului de imobil <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea tipului de imobil a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea tipului de imobil <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea tipului de imobil a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea tipului de imobil <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		->addRule('update', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Denumirea tipului de imobil trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea tipului de imobil trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new TipImobilRecord('tip_imobile');
	}
	
}