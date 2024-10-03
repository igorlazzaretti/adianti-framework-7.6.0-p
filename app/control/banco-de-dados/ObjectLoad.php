<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;


/** ===================================================
 *  Object Load 
 *  Busca por um Objeto com base em seu ID
 * 
 * 
 *  ele "trava" a execução do programa 
 *  Melhor alternativa seria ObjectFind
 ** =================================================== */

class ObjectLoad extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        try
        {
            TTransaction::open('curso');
            
            TTransaction::dump();
                                    //ID do Produto
            $produto = new Produto( 8 );
                                        // Atributo do Objeto Produto + ID
            echo '<b>Descrição</b>: ' . $produto->descricao;
            echo '<br>';
            echo '<b>Estoque</b>: ' . $produto->estoque;
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
} 