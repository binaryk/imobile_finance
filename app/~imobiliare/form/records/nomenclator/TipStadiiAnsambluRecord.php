<?php

namespace Imobiliare\Nomenclatoare\Form;

class TipStadiiAnsambluRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare Tip stadiu ansamblu')
		->setCaption('update', 'Modificare Tip stadiu ansamblu (#:id:)')
		->setCaption('delete', 'Ştergere Tip stadiu ansamblu (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea tipului de stadiu al ansamblului a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea tipului de stadiu al ansamblului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea tipului de stadiu al ansamblului a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea tipului de stadiu al ansamblului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea tipului de stadiu al ansamblului a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea tipului de stadiu al ansamblului <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		->addRule('update', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Denumirea tipului de stadiu al ansamblului trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea tipului de stadiu al ansamblului trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new TipStadiiAnsambluRecord('tip_stadii_ansamblu');
	}
	
}