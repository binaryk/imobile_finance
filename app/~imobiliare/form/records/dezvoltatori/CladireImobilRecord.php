<?php

namespace Imobiliare\Nomenclatoare\Form;

class CladireImobilRecord extends \Imobiliare\FormsRecord
{

    public function __construct($id)
    {
        parent::__construct($id);
        $this
            ->setCaption('insert', 'Adăugare clădire')
            ->setCaption('update', 'Modificare clădire (#:id:)')
            ->setCaption('delete', 'Ştergere clădire (#:id:)')

            ->setFeedback('insert', 'success', 'Adăugarea clădirei a fost realizată cu succes.')
            ->setFeedback('insert', 'error', 'Adaugarea clădirei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('update', 'success', 'Modificarea clădirei a fost realizată cu succes.')
            ->setFeedback('update', 'error', 'Modificarea clădirei <span class="badge">nu</span> a fost realizată.')
            ->setFeedback('delete', 'success', 'Ştergerea clădirei a fost realizată cu succes.')
            ->setFeedback('delete', 'error', 'Ştergerea clădirei <span class="badge">nu</span> a fost realizată.')

            ->addRule('insert', 'nume', 'required') 
            ->addRule('update', 'nume', 'required') 
            
            
            // ->addRule('insert', 'id_tip_destinatie', 'required|integer|not_in:0') 
            // ->addRule('update', 'id_tip_destinatie', 'required|integer|not_in:0') 
            
            // ->addRule('insert', 'id_tip_stadiu', 'required|integer|not_in:0') 
            // ->addRule('update', 'id_tip_stadiu', 'required|integer|not_in:0') 
            
            // ->addRule('insert', 'id_tip_categorie', 'required|integer|not_in:0') 
            // ->addRule('update', 'id_tip_categorie', 'required|integer|not_in:0') 
            
            ->addRule('insert', 'id_cartier', 'required|integer|not_in:0') 
            ->addRule('update', 'id_cartier', 'required|integer|not_in:0') 


            
            
            ->addMessage('insert', 'id_cartier.not_in', 'Cartierul clădirei trebuie completat.')
            ->addMessage('insert', 'id_cartier.required', 'Cartierul clădirei trebuie completat.')
            ->addMessage('update', 'id_cartier.not_in', 'Cartierul clădirei trebuie completat.') 
            ->addMessage('update', 'id_cartier.required', 'Cartierul clădirei trebuie completat.') 


            // ->addMessage('insert', 'id_tip_destinatie.not_in', 'Destinația clădirei trebuie completată.')
            // ->addMessage('insert', 'id_tip_destinatie.required', 'Destinația clădirei trebuie completată.')
            // ->addMessage('update', 'id_tip_destinatie.not_in', 'Destinația clădirei trebuie completată.') 
            // ->addMessage('update', 'id_tip_destinatie.required', 'Destinația clădirei trebuie completată.') 

            // ->addMessage('insert', 'id_tip_stadiu.not_in', 'Stadiul clădirei trebuie completat.')
            // ->addMessage('insert', 'id_tip_stadiu.required', 'Stadiul clădirei trebuie completat.')
            // ->addMessage('update', 'id_tip_stadiu.not_in', 'Stadiul clădirei trebuie completat.') 
            // ->addMessage('update', 'id_tip_stadiu.required', 'Stadiul clădirei trebuie completat.') 

            // ->addMessage('insert', 'id_tip_categorie.not_in', 'Categoria clădirei trebuie completată.')
            // ->addMessage('insert', 'id_tip_categorie.required', 'Categoria clădirei trebuie completată.')
            // ->addMessage('update', 'id_tip_categorie.not_in', 'Categoria clădirei trebuie completată.') 
            // ->addMessage('update', 'id_tip_categorie.required', 'Categoria clădirei trebuie completată.') 
            
            ->addMessage('insert', 'nume.required', 'Denumirea clădirei trebuie completată.')
            ->addMessage('update', 'nume.required', 'Denumirea clădirei trebuie completată.') 
        ;
    }

    public static function create()
    {
        return self::$instance = new CladireImobilRecord('cladire_imobil');
    }

}