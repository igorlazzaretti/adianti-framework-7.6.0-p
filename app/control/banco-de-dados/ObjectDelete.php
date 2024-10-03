<?php

use Adianti\Control\TPage;
use Adianti\Database\TTransaction;
use Adianti\Widget\Dialog\TMessage;

/** ===============================================
 *  
 *  Deleta um produto com  find + delete()
 * 
 ** =============================================  */

class ObjectDelete extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        try
        {
            TTransaction::open('curso');
            
            TTransaction::dump();
            
            $produto = Produto::find( 29 );
            
            if ($produto instanceof Produto)
            {
                $produto->delete();
            }
            
            /* -------------------------
             * Forma mais rápida:
             * Cria-se um objeto vazio e exclui o ID específico gerando apenas um delete na instrução
             * -------------------------                       
            $produto = new Produto;
            $produto->delete( 28 );
            */
            
            TTransaction::close();
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
    }
}