<!-- 
    Outra forma para fazer o ObjectStore
        porém não é via Objeto e sim via vetor dentro de ::create

    Esta Classe serve para
    
    Gravar Objetos, excluir de forma simples
    os dados vão para o BD de forma segura com Prepared Statements
    
    Neste exemplo inserimos o Cabo HDMI

-->
<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

class ObjectStore extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        try
        {           // CURSO É O NOME DO BANCO DE DADOS
            TTransaction::open('curso');
            
            // MOSTRA EM TELA O QUE ESTA ACONTENCENDO ou LOGGER OU DUMP
            
            // TTransaction::setLoggerFunction( function($mensagem) {
            //     print $mensagem . '<br>';
            // });
            
            TTransaction::dump();

            Produto::create( [

                'descrição' => 'Cabo HDMI',
                'estoque' => 10,
                'preco_venda' => 27.50,
                'unidade' => 'PC',
                'local_foto' => ''

            ]);
            
            new TMessage('info', 'Produto gravado com sucesso');
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}
