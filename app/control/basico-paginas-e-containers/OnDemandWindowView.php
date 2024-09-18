 <!-- Este html foi criado na Aula 6, 5min do Módulo 2 do Curso Adianti Pablo.  -->
<!-- Uma Janela aparece quando solicitada -->

<?php
class OnDemandWindowView extends TPage
{
    public function __construct()
    {
        // contrução da pagina
        parent::__construct();
        // Aqui cria-se a janela sob demanda
        $window = TWindow::create('Titulo', 0.5 , null);


        // html renderer que vai pra Janela
        $html = new THtmlRenderer('app/resources/basico-paginas-e-containers/page.html');

        // substituições no arquivo page.html, se liberado a seçao main
        $replaces = [];
        $replaces['title'] = 'Títulooo';
        $replaces['body'] = 'Corpin';
        $replaces['footer'] = 'Roda pé';



        // ativa o main no html
        $html->enableSection("main", $replaces);



        //adiciona a página
        $window->add($html);
        $window->show();
    }
};