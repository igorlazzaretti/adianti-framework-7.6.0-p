<?php

    class FilesystemIconView extends TPage
    {
        
        //COPIEI E COLEI CONSTS
        // Descrição do programa
        const DESC = 'Caaaaaaaa';      
        // versão do programa
        const VERS = '1.00.01';
    
    
        private $iconview;
        

        /**
         * Constructor method
         */
        public function __construct($param)
        {
            parent::__construct();
            
            $this->iconview = new TIconView;
            
            $caminho = "../app/control";

            $dir = new DirectoryIterator( $caminho );
            
            foreach ($dir as $fileinfo)
            {
                if (!$fileinfo->isDot())
                {
                    $item = new stdClass;
                    
                    if ($fileinfo->isDir())
                    {
                        $item->type = 'folder';
                        $item->icon = 'far:folder blue fa-4x';
                    }
                    else
                    {
                        $item->type = 'file';
                        $item->icon = 'far:file orange fa-4x';
                    }
                    
                    $item->path = $fileinfo->getPath();
                    $item->name = $fileinfo->getFilename();


                    //ESTAVA FORA DO IF
                    $this->iconview->addItem($item);
                }
                
            }
            
            // $this->iconview->enablePopover('', '<b>Name:</b> {name}');
            
            $this->iconview->setIconAttribute('icon');
            $this->iconview->setLabelAttribute('name');
            $this->iconview->setInfoAttributes(['name', 'path']);
            
            $display_condition = function($object) {
                return ($object->type == 'file');
            };

            //CRIEI
            $display_condition_folder = function($object) {
                return ($object->type == 'folder');
            };
            
            $this->iconview->addContextMenuOption('Opções');
            $this->iconview->addContextMenuOption('');
            //ALTEREI AQUI AS OPÇÕES AO CLICAR COM O BOTAO DIREITO
            $this->iconview->addContextMenuOption('Abrir',   new TAction([$this, 'onOpen']),   'far:folder-open blue', $display_condition_folder);
            $this->iconview->addContextMenuOption('Download', new TAction([$this, 'onDownload']), 'fas:download green', $display_condition);
            
            parent::add( $this->iconview );
        }
        
        /**
         * Open action
         */
    public static function onOpen($param)
    {
        new TMessage ('info','Alguém me ajuda kkkrying');
        
    }
    

    
    /**
     * Download action
     */
    public static function onDownload($param)
    {
        new TMessage( 'info', '<a href="' . $param['path'] . '" download>' . "Clique Aqui" . '</a>' . 
                        " para baixar o arquivo" . ' ' . $param['name'] . '.');
    }
}