<?php

/* Módulo 2 - Aula 04 
*  Repetição de linhas em um formulário, por exemplo
*    
*/

class TemplateViewRepeat extends TPage{

    public function __construct(){
        parent::__construct();

        try{
            $html = new THtmlRenderer('app/resources/basico-paginas-e-containers/template_repeat.html');
            
            $replace = [];
            $replace[] = [ 'id' => 1, 'nome' => 'Fred', 'casa' => 'Grifinória' ];
            $replace[] = [ 'id' => 2, 'nome' => 'Susan Bones',  'casa' => 'Lufa-lufa' ];
            $replace[] = [ 'id' => 3, 'nome' => 'Hermione Granger',  'casa' => 'Grifinória' ];
            $replace[] = [ 'id' => 4, 'nome' => 'Ron Weasley',  'casa' => 'Grifinória' ];
            $replace[] = [ 'id' => 5, 'nome' => 'Draco Malfoy',  'casa' => 'Sonserina' ];
            $replace[] = [ 'id' => 6, 'nome' => 'Luna Lovegood',  'casa' => 'Corvinal' ];
            $replace[] = [ 'id' => 7, 'nome' => 'Cho Chang',  'casa' => 'Corvinal' ];
            $replace[] = [ 'id' => 8, 'nome' => 'Neville Longbottom',  'casa' => 'Grifinória' ];
            
            // o main habilitará cabeçalho com 3 colunas e as linhas serão feitas no details
            $html->enableSection('main', []);

            // O true diz que a sessão é repetida n vezes, conforme o array acima;
            $html->enableSection('details', $replace, true);
            
            parent::add($html);




        }catch(Exception $e){
            new TMessage('error', $e->getMessage());
         }
        }

}