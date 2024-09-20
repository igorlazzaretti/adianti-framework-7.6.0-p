<?php
class HBoxView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $notebook1 = new TNotebook;
        $notebook2 = new TNotebook;
        $notebook3 = new TNotebook;
        
        $notebook1->appendPage('Page1', new TLabel('page 1'));
        $notebook1->appendPage('Page2', new TLabel('page 2'));
        
        $notebook2->appendPage('Page1', new TLabel('page 1'));
        $notebook2->appendPage('Page2', new TLabel('page 2'));
        $notebook2->appendPage('Page3', new TLabel('page 3'));


        $notebook3->appendPage('Page2', new TLabel('page 2'));
        $notebook3->appendPage('Page3', new TLabel('page 3'));
        

        //
        // Aqui teremos a Caixa Vertical
        $hbox = new THBox;
        $hbox->style = 'height:100%';
        $hbox->add($notebook1);
        $hbox->add($notebook2);
        $hbox->add($notebook3);
        parent::add( $hbox );
    }
}