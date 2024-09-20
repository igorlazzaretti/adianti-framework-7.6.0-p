<?php
class InformationView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // info, error, warning.
        new TMessage('info', 'Mensagem');
     // new TMessage('error', 'Mensagem');
     // new TMessage('warning', 'Mensagem');
     
    }
}