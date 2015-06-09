<?php

namespace Imobiliare\Nomenclatoare\Form;

class ProprietariRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare proprietar')
		->setCaption('update', 'Modificare proprietar (#:id:)')
		->setCaption('delete', 'Ştergere proprietar (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea proprietarului a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea proprietarului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea proprietarului a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea proprietarului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea proprietarului a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea proprietarului <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'nume', 'required')
		
		->addMessage('insert', 'nume.required', 'Numele proprietarului trebuie completat.')
		->addMessage('update', 'nume.required', 'Numele proprietarului trebuie completat.') 
		;
	}

    public static function create()
	{
		return self::$instance = new ProprietariRecord('proprietari');
	}
	
}