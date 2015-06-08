<?php

namespace Imobiliare\Nomenclatoare\Form;

class TerenImobilRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare teren')
            ->setCaption('update', 'Modificare teren (#:id:)')
            ->setCaption('delete', 'Ştergere teren (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea terenului a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea terenului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea terenului a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea terenului <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea terenului a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea terenului <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nume', 'required') 
            ->addRule('update', 'nume', 'required') 

            ->addMessage('insert', 'nume.required', 'Denumirea terenului trebuie completată.')
            ->addMessage('update', 'nume.required', 'Denumirea terenului trebuie completată.') 
        ;
    }

    public static function create()
    {
        return self::$instance = new TerenImobilRecord('teren_imobil');
    }

}