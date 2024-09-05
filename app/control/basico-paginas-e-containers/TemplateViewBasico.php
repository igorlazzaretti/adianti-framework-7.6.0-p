<?php
class TemplateViewBasico extends TPage
{   // contrução da pagina
    public function __construct()
    {
        // contrução da pagina
        parent::__construct();

        // VAMOS USAR O HTML RENDER DO FRAMEWORK EM UM TRY CATCH
        try
        {   //O ARQUIVO HTML FICA AQUI, E RECEBE CONSTANTES PARA SEU CONTEUDO COM O REPLACE
            $html = new THtmlRenderer('app/resources/basico-paginas-e-containers/template_basico.html');
            //PARA ISSO FUNCIONAR HABILITAMOS A MAIN E UM VETOR DE SUBSTITUIÇÕES E ADD NELE NO FINAL
            //REPLACES SAO AS SUBSTITUICOES DE TEXTO NO HTML POR $VAR DAQUI

            //SIMULAMOS UM CLIENTE / stdClass é um objeto do php que serve apenas para carregar dados
            $customer = new stdClass;
            $customer->id = 5;
            $customer->name = 'Harry';
            $customer->address = 'Rua dos Alfeneiros, 10';

            $replaces = []; 
            //JOGAMOS NOSSAS VARIAVEIS DENTRO DESTE ARRAY, POSICAO = ATRIBUTO DO OBJETO
            $replaces['id']= $customer->id;
            $replaces['name']= $customer->name;
            // $replaces['address']= $customer->address ;
            //PASSAMOS O OBJETO INTEIRO
            $replaces['customer'] = $customer;

            $html->enableSection('main', $replaces);

            //VAMOS PARA OUTRO BLOCO

            $replaces2 = [];
            $replaces2['obs'] = 'Esta é a observação';
            
            $html->enableSection('outros', $replaces2);

            //VARIAVEL $HTML ADICIONADA
            parent::add($html);
        }
        catch (Exception $e)
        {   
            new TMessage('error', $e->getMessage());
        }    
    }
}