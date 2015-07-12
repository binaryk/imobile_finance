<?php

namespace Imobiliare\Nomenclatoare\Form;

class AgentiiRecord extends \Imobiliare\FormsRecord
{

	public function __construct($id)
	{
		parent::__construct($id);
		$this
		->setCaption('insert', 'Adăugare agenție')
		->setCaption('update', 'Modificare agenție (#:id:)')
		->setCaption('delete', 'Ştergere agenție (#:id:)')

		->setFeedback('insert', 'success', 'Adăugarea agenției a fost realizată cu succes.')
		->setFeedback('insert', 'error', 'Adaugarea agenției <span class="badge">nu</span> a fost realizată.')
		->setFeedback('update', 'success', 'Modificarea agenției a fost realizată cu succes.')
		->setFeedback('update', 'error', 'Modificarea agenției <span class="badge">nu</span> a fost realizată.')
		->setFeedback('delete', 'success', 'Ştergerea agenției a fost realizată cu succes.')
		->setFeedback('delete', 'error', 'Ştergerea agenției <span class="badge">nu</span> a fost realizată.')

		->addRule('insert', 'telefon', 'required')
		->addRule('insert', 'telefon', 'required|unique:agentii')
		
		->addMessage('insert', 'telefon.required', 'Telefonul agenției trebuie completat.')
		->addMessage('update', 'telefon.required', 'Telefonul agenției trebuie completat.')

		->addMessage('insert', 'telefon.unique', 'Telefonul agenției trebuie sa fie unic.')
		->addMessage('update', 'telefon.unique', 'Telefonul agenției trebuie sa fie unic.')
		;
	}

    public static function create()
	{
		return self::$instance = new AgentiiRecord('agentii');
	}
	
}