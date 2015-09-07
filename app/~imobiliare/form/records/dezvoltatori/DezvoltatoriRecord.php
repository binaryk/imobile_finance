<?php

namespace Imobiliare\Nomenclatoare\Form;

class DezvoltatoriRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare dezvoltator')
		->setCaption('update', 'Modificare dezvoltator (#:id:)')
		->setCaption('delete', 'Ştergere dezvoltator (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea dezvoltatorului a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea dezvoltatorului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea dezvoltatorului a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea dezvoltatorului <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea dezvoltatorului a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea dezvoltatorului <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'telefon', 'required')
		->addRule('update', 'telefon', 'required')
		
		->addMessage('insert', 'telefon.required', 'Telefonul dezvoltatorului trebuie completată.')
		->addMessage('update', 'telefon.required', 'Telefonul dezvoltatorului trebuie completată.')
		;
	}

    public static function create()
	{
		return self::$instance = new DezvoltatoriRecord('dezvoltatori');
	}
	
}