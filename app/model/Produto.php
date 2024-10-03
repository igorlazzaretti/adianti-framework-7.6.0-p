<?php

use Adianti\Database\TRecord;

class Produto extends TRecord
{
    const TABLENAME   = 'produto';
    const PRIMARYKEY  = 'id';
    const IDPOLICY    = 'max'; // {max,serial}
    
    public function __construct($id = null, $callObjectLoad = true)
    {
        parent::__construct('id', $callObjectLoad);

        parent::addAttribute('descrição');
        parent::addAttribute('estoque');
        parent::addAttribute('preco_venda');
        parent::addAttribute('unidade');
        parent::addAttribute('local_foto');
    }
}

/*
    Os atributos são retirados do BANCO DE DADOS

  CREATE TABLE produto(
  id INTEGER PRIMARY KEY NOT NULL,
  descricao VARCHAR(200),
  estoque float,
  preco_venda float,
  unidade VARCHAR(200),
  local_foto text

*/
// Os objetos serão gravados no banco de dados na classe ObjectStore (app/control)       