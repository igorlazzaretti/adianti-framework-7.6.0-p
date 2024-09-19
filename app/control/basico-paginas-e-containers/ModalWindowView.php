 <!-- Este html foi criado na Aula 7, 5min do Módulo 2 do Curso Adianti Pablo.  -->
<!-- Uma Janela Modal será criada -->

<?php
class ModalWindowView extends TWindow
{
    public function __construct()
    {
        // contrução da pagina
        parent::__construct();
        // Aqui define-se tamanho: largura e altura
        parent::setSize(0.5, null);
        parent::removePadding();
        parent::removeTitleBar();
        parent::disableEscape();
        
    
        //html renderer
        $html = new THtmlRenderer('app/resources/basico-paginas-e-containers/modal.html');  
        
        $replaces = [];
        $replaces['title'] = 'Títulooo';
        $replaces['body'] = 'Corpin';
        $replaces['footer'] = 'Roda pé';

        $html->enableSection('main', $replaces);

        parent::add($html);
        parent::show();
    } 
}