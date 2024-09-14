<?php

use Adianti\Widget\Dialog\TMessage;

/**
 * FilesystemIconView do Marco Modificado
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class FilesystemIconViewMarcov1Mod extends TPage
{    
    private $iconview;
    private $storagPath = 'app';
    private $allowedExtensions = ['php', 'png'];

//  Constructor method
    public function __construct($param)
    {
        parent::__construct();


        $fullPath = getcwd();
        $fullPath .= '/' . $this->storagPath;

        if (is_array($param) && isset($param['path'])) {
            $path = $fullPath . '/' . $param['path'];
        } else {
            $path = $fullPath;
        }
    
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

                // remove o fullpath do path
                $item->path = str_replace($fullPath, '', $item->path);

                // checa se é um diretório, apenda o nome do dir
                if ($fileinfo->isDir())
                {
                    $item->path .= '/' . $fileinfo->getFilename();
                }


                $item->name = $fileinfo->getFilename();
          
                $this->iconview->addItem($item);
            }

        }

         $this->iconview->setIconAttribute('icon');
         $this->iconview->setLabelAttribute('name');
         $this->iconview->setInfoAttributes(['name', 'path']);

         $display_condition_download = function($object) {
             return ($object->type == 'file');
         };

         $display_condition_open = function($object) {
            return ($object->type == 'folder');
        };

         $this->iconview->addContextMenuOption('Opções');
         $this->iconview->addContextMenuOption('');
         $this->iconview->addContextMenuOption('Abrir',   new TAction([$this, 'onOpen']),   'far:folder-open blue', $display_condition_open);
         $this->iconview->addContextMenuOption('Realizar o Download',   new TAction([$this, 'onDownload']),   'far:folder-open blue', $display_condition_download);


         parent::add( $this->iconview );
    }

    // Método que garante a integridade do path
    private function checkPath($path)
    {
        $path = str_replace('..', '', $path);
        $path = str_replace('//', '/', $path);
        return $path;
    }

    // Empty function to reindex new path

    public function onOpen($param) { 
    
        echo '<p> Você abriu o diretório: ' . $param['path'] . ' </p>';
        
    }

    // Open action
    public function onDownload($param)
    {
        echo '<p> Você abriu o diretório: ' . $param['path'] . ' </p>';
        
        // garante que tenha a prop path
        if (is_array($param) && isset($param['path']) && isset($param['name'])) {
            $path = $param['path'];
            
            $path .= '/' . $param['name'];
            
            $path = $this->checkPath($path);
            

            // ignora se for um dir
            if (is_dir($path)) {
                return;
            }

            // checa se o arquivo tem uma extensão permitida
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            
            if (!in_array($ext, $this->allowedExtensions)) {
                new TMessage('error', 'Opa! O Download deste Arquivo não foi autorizado.');
                return;
            } 
                else
                {
                new TMessage( 'info', '<a href="' . $param['path'] . '" download>' . "Clique aqui" . '</a>' . 
                        " para baixar o arquivo" . ' ' . $param['name'] . '.') ;
                }
        }
    }
}
