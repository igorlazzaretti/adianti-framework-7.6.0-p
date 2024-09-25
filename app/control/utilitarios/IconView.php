<?php
class IconView extends TPage
{
    private $iconview;

    public function __construct()
    {
        parent::__construct();

        $this->iconview = new TIconView;

        $item = new stdClass;

        $item->tipo = 'pasta';
        $item->caminho = '/pasta';
        $item->nome = 'Pasta A';
        $item->icone = 'far:folder blue fa-4x';
        $this->iconview->addItem($item);

        $item = new stdClass;

        $item->tipo = 'arquivo';
        $item->caminho = '/pasta/arquivo.txt';
        $item->nome = 'Arquivo B';  
        $item->icone = 'far:file orange fa-4x';
        $this->iconview->addItem($item);

        // Vamos mostrar para a IconView quais são os atributos

            // Mostra o nome do atributo ao hover
        $this->iconview->enablePopover('', '{nome}' );
        $this->iconview->setIconAttribute('icone');
        $this->iconview->setLabelAttribute('nome');
        $this->iconview->setInfoAttributes(['nome', 'caminho']);

        // Condição: true or false  

        $conditionP = function($object){
            return $object->tipo == 'pasta';
        };

        $conditionA = function($object){
            return $object->tipo == 'arquivo';
        };  


        // Botão Direito e suas Opções
        $this->iconview->addContextMenuOption('Opções');
        $this->iconview->addContextMenuOption('');
        $this->iconview->addContextMenuOption('Abrir', new TAction([$this, 'onOpen']), 'far:folder-open blue', $conditionP);
        $this->iconview->addContextMenuOption('Renomear', new TAction([$this, 'onRename']), 'far:edit orange');
        $this->iconview->addContextMenuOption('Download', new TAction([$this, 'onDownload']), 'fa:download blue', $conditionA);
        $this->iconview->addContextMenuOption('Excluir', new TAction([$this, 'onDelete']), 'fas:trash-alt red', $conditionA);


        parent::add( $this->iconview );
    
    }

    public static function onOpen($param)
    {
        new TMessage('info', '<b>onOpen</b><br>'. json_encode($param) );    
        new TMessage('info', '<b>Nome:</b><br>'. $param['nome'] . '<br>' . '<b>Caminho:</b><br>'. $param['caminho']    );    
    }
    public static function onRename($param)
    {
        new TMessage('info', '<b>onOpen</b><br>'. json_encode($param) );    
        new TMessage('info', '<b>Nome:</b><br>'. $param['nome'] . '<br>' . '<b>Caminho:</b><br>'. $param['caminho']    );    
    }
    public static function onDownload($param)
    {
        new TMessage('info', '<b>onOpen</b><br>'. json_encode($param) );    
        new TMessage('info', '<b>Nome:</b><br>'. $param['nome'] . '<br>' . '<b>Caminho:</b><br>'. $param['caminho']    );    
    }
    public static function onDelete($param)
    {
        new TMessage('info', '<b>onOpen</b><br>'. json_encode($param) );    
        new TMessage('info', '<b>Nome:</b><br>'. $param['nome'] . '<br>' . '<b>Caminho:</b><br>'. $param['caminho']    );    
    }
}