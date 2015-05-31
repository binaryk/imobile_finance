<?php

namespace Imobiliare\Nomenclatoare\Form;

class TipIntermediariRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare Tip intermediar')
		->setCaption('update', 'Modificare Tip intermediar (#:id:)')
		->setCaption('delete', 'Ştergere Tip intermediar (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea tipului de intermediar a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea tipului de intermediar <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea tipului de intermediar a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea tipului de intermediar <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea tipului de intermediar a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea tipului de intermediar <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		->addRule('update', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Denumirea tipului de intermediar trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea tipului de intermediar trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new TipIntermediariRecord('tip_intermediar');
	}
	
}