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

		->addRule('insert', 'telefon', 'required')
		->addRule('insert', 'telefon', 'required|unique:proprietari_persoane_fizice')
		
		->addMessage('insert', 'telefon.required', 'Telefonul proprietarului trebuie completat.')
		->addMessage('update', 'telefon.required', 'Telefonul proprietarului trebuie completat.')

		->addMessage('insert', 'telefon.unique', 'Telefonul proprietarului trebuie sa fie unic.')
		->addMessage('update', 'telefon.unique', 'Telefonul proprietarului trebuie sa fie unic.') 
		;
	}

    public static function create()
	{
		return self::$instance = new ProprietariRecord('proprietari');
	}
	
}