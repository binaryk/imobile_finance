<?php

namespace Imobiliare\Nomenclatoare\Form;

class DezvoltatoriAnsambluriRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare ansamblu rezidential')
            ->setCaption('update', 'Modificare ansamblu rezidential (#:id:)')
            ->setCaption('delete', 'Ştergere ansamblu rezidential (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea ansamblului rezidential a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea ansamblului rezidential <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea ansamblului rezidential a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea ansamblului rezidential <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea ansamblului rezidential a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea ansamblului rezidential <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nume', 'required')

            ->addMessage('insert', 'nume.required', 'Denumirea ansamblului rezidential trebuie completată.')
            ->addMessage('update', 'nume.required', 'Denumirea ansamblului rezidential trebuie completată.') 
        ;
    }

    public static function create()
    {
        return self::$instance = new DezvoltatoriAnsambluriRecord('dezvoltator-ansambluri');
    }

}