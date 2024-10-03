<!-- 
    Esta Classe serve para
    
    Gravar Objetos, excluir de forma simples
    os dados vão para o BD de forma segura com Prepared Statements
    
    Neste exemplo inserimos o Gravador de DVD

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
            
            // MOSTRA EM TELA O QUE ESTA ACONTENCENDO
            
            TTransaction::setLoggerFunction( function($mensagem) {
                print $mensagem . '<br>';
            });
                        
            // TTransaction::dump();

                // O OBJETO Produto POSSUI UM MODELO (APP/MODEL) DDE GRAVACAO BASEADO NA TABELA DO BD
            $produto = new Produto;
            $produto->descricao = 'GRAVADOR DVD';
            $produto->estoque = 10;
            $produto->preco_venda = 100;
            $produto->unidade = 'PC';
            $produto->local_foto =  '';
            $produto->store();
            
            new TMessage('info', 'Produto gravado com sucesso');
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}

// OBJECTCreate é outra forma de gravar estes dados 