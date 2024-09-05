<?php

/**
 * Amostradir (Mostra Diretórios)
 * @version    -1.0
 * @package    samples
 * @subpackage tutor
 * @author     GeminIgor igorlazzaretti.com
 */
class Amostradir extends TPage
{
    private $form;
    private $datagrid;

    public function __construct()
    {
        parent::__construct();
        echo 'Aqui será construído o programa Amostradir';
        echo "<br><br>" . "Meu primeiro programa que exibirá diretórios";
    }
}