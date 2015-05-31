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

		->addRule('insert', 'nume', 'required')
		->addRule('insert', 'adresa', 'required')
		->addRule('insert', 'telefon', 'required')
		->addRule('insert', 'email', 'required|email')
		->addRule('update', 'nume', 'required')
		->addRule('update', 'adresa', 'required')
		->addRule('update', 'telefon', 'required')
		->addRule('update', 'email', 'required|email') 
		
		->addMessage('insert', 'nume.required', 'Denumirea dezvoltatorului trebuie completată.')
		->addMessage('update', 'nume.required', 'Denumirea dezvoltatorului trebuie completată.')
		->addMessage('insert', 'adresa.required', 'Adresa dezvoltatorului trebuie completată.')
		->addMessage('update', 'adresa.required', 'Adresa dezvoltatorului trebuie completată.')
		->addMessage('insert', 'telefon.required', 'Telefonul dezvoltatorului trebuie completată.')
		->addMessage('update', 'telefon.required', 'Telefonul dezvoltatorului trebuie completată.')
		->addMessage('insert', 'email.required', 'E-mailul dezvoltatorului trebuie completată.')
		->addMessage('update', 'email.required', 'E-mailul dezvoltatorului trebuie completată.')	
		->addMessage('insert', 'email.email', 'E-mailul dezvoltatorului trebuie să fie valid.')
		->addMessage('update', 'email.email', 'E-mailul dezvoltatorului trebuie să fie valid.')
		;
	}

    public static function create()
	{
		return self::$instance = new DezvoltatoriRecord('dezvoltatori');
	}
	
}