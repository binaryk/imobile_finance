<?php

namespace Imobiliare\Nomenclatoare\Form;

class JudetRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare judet')
		->setCaption('update', 'Modificare judet (#:id:)')
		->setCaption('delete', 'Ştergere judet (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea judetului a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea judetului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea judetului a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea judetului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea judetului a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea judetului <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		->addRule('update', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Denumirea judetului trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea judetului trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new JudetRecord('judet');
	}
	
}