<?php

namespace Imobiliare\Nomenclatoare\Form;

class CladiriPhotosRecord extends \Imobiliare\FormsRecord {

    public function __construct($id) {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'AdÄƒugare Imagine')
            ->setCaption('update', 'Modificare Imagine (#:id:)')
            ->setCaption('delete', 'È˜tergere Imagine (#:id:)')

            ->setFeedback('insert', 'success', 'AdÄƒugarea imaginii a fost realizatÄƒ cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea imaginii <span class="badge">nu</span> a fost realizatÄƒ.')
            ->setFeedback('update', 'success', 'Modificarea imaginii a fost realizatÄƒ cu succes.')
            ->setFeedback('update', 'error', 'Modificarea imaginii <span class="badge">nu</span> a fost realizatÄƒ.')
            ->setFeedback('delete', 'success', 'È˜tergerea imaginii a fost realizatÄƒ cu succes.')
            ->setFeedback('delete', 'error', 'È˜tergerea imaginii <span class="badge">nu</span> a fost realizatÄƒ.')
            // ->addRule('insert', 'denumire_tip', 'required')
            // ->addRule('update', 'denumire_tip', 'required')

            // ->addMessage('insert', 'denumire_tip.required', 'Denumirea tipului de finan?are trebuie completat?.')
            // ->addMessage('update', 'denumire_tip.required', 'Denumirea tipului de finan?are trebuie completat?.')
        ;
    }

    public static function create() {
        return self::$instance = new CladiriPhotosRecord('cladire_photo');
    }

}