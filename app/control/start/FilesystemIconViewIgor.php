<?php
use Adianti\Widget\Base\TButton;

    class FilesystemIconViewIgor extends TPage
    {
                                      // IGOR LAZZARETTI - ESTAGIÁRIO
        //COPIEI E COLEI CONSTS
        // Descrição do programa
        const DESC = 'Caaaaaaaa';      
        // versão do programa
        const VERS = '1.00.01';
    
        private $iconview;

        // GUARDA O CAMINHO INICIAL
        private $storagePath = 'app';
     
// Constructor method
        public function __construct($param)
        {
            parent::__construct();

            $fullPath = getcwd();
            //ADICIONAREI /  ANTES DO CAMINHO GUARDADO
            $fullPath .= '/' . $this->storagePath; 
            //AGORA UMA FUNÇÃO 
            if (is_array($param) && isset($param['path']))
            {
                $path = $fullPath . '/' . $param['path'];
            } else
            {   
                $path = $fullPath;
            }

            //ADICIONA AO PATH UMA INTEGRIDADE
            $path = $this->checkPath($path);

            
            $this->iconview = new TIconView;
            
            $dir = new DirectoryIterator( $path );
            
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

                    if ($fileinfo->isDir())
                    {
                        $item->path .= '/' . $fileinfo->getFilename();
                    }

                    $item->name = $fileinfo->getFilename();


                    //ESTAVA FORA DO IF
                    $this->iconview->addItem($item);
                }
                
            }
            
            $this->iconview->enablePopover('', '<b>Name:</b> {name}');
            
            $this->iconview->setIconAttribute('icon');
            $this->iconview->setLabelAttribute('name');
            $this->iconview->setInfoAttributes(['name', 'path']);
            
            $display_condition = function($object) {
                return ($object->type == 'file');
            };

            //CRIEI ESSA CONDIÇÃO PARA OS DIRETÓRIOS
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

//INTEGRIDADE
        // Método que garante a integridade do path
    private function checkPath($path)
    {
        $path = str_replace('..', '', $path);
        $path = str_replace('//', '/', $path);
        return $path;
    }
        
// Open action
    public static function onOpen($param)
    {
        
    }
    
// Download action
    public static function onDownload($param)
    {
        new TMessage ('info', '<a href="' . $param['path'] .'" download>' . "Clique Aqui" . '</a>' . 
                        " para baixar o arquivo" . ' ' . $param['name'] . '.');
                        var_dump($param);
    }
}
