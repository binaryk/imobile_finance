<?php

namespace Imobiliare\Nomenclatoare\Form;

class LocalitateRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare localitate')
		->setCaption('update', 'Modificare localitate (#:id:)')
		->setCaption('delete', 'Ştergere localitate (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea localitatii a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea localitatii <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea localitatii a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea localitatii <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea localitatii a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea localitatii <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		->addRule('update', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Denumirea localitatii trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea localitatii trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new LocalitateRecord('localitati');
	}
	
}