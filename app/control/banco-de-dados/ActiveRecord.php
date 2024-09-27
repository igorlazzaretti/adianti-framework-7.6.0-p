<!-- Como fazer Operações Básicas com o BD
    Módulo 3
    Aula 3

    Gravar Objetos, excluir de forma simples
    os dados vão para o BD de forma segura com Prepared Statements
    
    Existem outras classes para operações em Grupoas, mas usaremos a classe
    "TRecord" para operações individuais.
    Salvadas na classe de modelo /app/model no singular e com primeira letra maiúscula.     

    Cada Classe precisa de 3 constantes: Nome, Chave Primária e Chave de Geração de novos ID's.

-->
<?php
class ActiveRecord extends TPage
{
    public function __construct()
    {
        // contrução da pagina
        parent::__construct();
        
        // html renderer
        $html = new THtmlRenderer('app/control/banco-de-dados/activerecord.html');

        // substituições no arquivo page.html, se liberado a seçao main
        $replaces = [];
        $replaces['title'] = 'Banco de Dados Módulo 3 - Aula 3';
        $replaces['bodyp1'] = 'Gravar Objetos, excluir de forma simples os dados vão para o BD de forma segura com Prepared Statements';
        $replaces['bodyp2'] = 'Existem outras classes para operações em Grupoas, mas usaremos a classe.';
        $replaces['bodyp3'] = '"TRecord" para operações individuais.';
        $replaces['bodyp4'] = 'Salvadas na classe de modelo /app/model no singular e com primeira letra maiúscula.';
        $replaces['bodyp5'] = 'Cada Classe precisa de 3 constantes: Nome, Chave Primária e Chave de Geração de novos IDs';
        $replaces['footer'] = 'Curso Adianti 7 Framework - Criador: Pablo';


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