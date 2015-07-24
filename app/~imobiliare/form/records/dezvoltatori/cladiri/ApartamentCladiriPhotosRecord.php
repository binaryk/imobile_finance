<?php
/**
 * Created by PhpStorm.
 * User: lupac
 * Date: 7/22/2015
 * Time: 11:43 AM
 */

namespace Imobiliare\Nomenclatoare\Form;


class ApartamentCladiriPhotosRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare Imagine')
            ->setCaption('update', 'Modificare Imagine (#:id:)')
            ->setCaption('delete', 'Ştergere Imagine (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea imaginii a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea imaginii <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea imaginii a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea imaginii <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea imaginii a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea imaginii <span class="badge">nu</span> a fost realizată.')

            // ->addRule('insert', 'denumire_tip', 'required')
            // ->addRule('update', 'denumire_tip', 'required')

            // ->addMessage('insert', 'denumire_tip.required', 'Denumirea tipului de finanţare trebuie completată.')
            // ->addMessage('update', 'denumire_tip.required', 'Denumirea tipului de finanţare trebuie completată.')
        ;
    }

    public static function create()
    {
        return self::$instance = new ApartamentCladiriPhotosRecord('apartament_cladire_photo');
    }

}