<?php

/**
 * Amostradir (Mostra Diretórios)
 * @version    -1.0
 * @package    samples
 * @subpackage tutor
 * @author     GeminIgor igorlazzaretti.com
 */
class NavegaDir extends TPage
{

    public function __construct()
    {
        parent::__construct();
        echo 'Voce está no Adianti Framework puro';
        echo 'Aqui será construído o programa Amostradir';
        echo "<br><br>" . "Meu primeiro programa que exibirá diretórios";
    }
}
