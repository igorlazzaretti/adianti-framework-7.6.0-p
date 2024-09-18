<!-- A página inteira é uma Janela -->

<?php
class SingleWindowView extends TWindow
{
    public function __construct()
    {
        parent::__construct();
        // add título da página (janela)
        parent::setTitle('Título da Janela');
        // tamanhos
        parent::setSize(0.6, 0.8);  
        // padding
        parent::removePadding();    

                
        $html = new THtmlRenderer('app/resources/basico-paginas-e-containers/page.html');

        // substituições no arquivo page.html, se liberado a seçao main
        $replaces = [];
        $replaces['title'] = 'Títulooo';
        $replaces['body'] = 'Corpin';
        $replaces['footer'] = 'Roda pé';

        // ativa o main no html
        $html->enableSection("main", $replaces);

        // adiciona o html dentro da página (THtmlRenderer)
        parent::add($html);
    }
};


