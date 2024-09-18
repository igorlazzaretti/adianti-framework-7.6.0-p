<?php

class SinglePageView extends TPage
{
    public function __construct()
    {
        // contrução da pagina
        parent::__construct();
        
        // html renderer
        $html = new THtmlRenderer('app/resources/basico-paginas-e-containers/page.html');

        // substituições no arquivo page.html, se liberado a seçao main
        $replaces = [];
        $replaces['title'] = 'Títulooo';
        $replaces['body'] = 'Corpin';
        $replaces['footer'] = 'Roda pé';



        // ativa o main no html
        $html->enableSection("main", $replaces);


        // menu bread
            //cria uma caixa vertical widhth:100% com os dados do menu
        $vbox = new TVBox; 
        $vbox->style = 'width:100%';
        $vbox->add (new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($html);

        // adiciona o html dentro da página
        parent::add($vbox);
    }
};

