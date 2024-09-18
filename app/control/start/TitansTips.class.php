<?php

use Adianti\Widget\Base\TElement;

/**
 * TitansTips - Classe
 *
 * @author Allan Kehl <allan@plenatech.com.br>
 * 27/08/2018 - Allan Kehl
 *    Classe criada
 * 06/05/2024 - Marco Driemeyer
 *    Ajustado código e adicionado método que permite devolver o HTML
 * 26/07/2024 - Arthur Bozardi da Silva
 *    Alterado o ícone utilizado como tip
 */
class TitansTips extends TElement
{

    private $html;

    /**
     * Class Constructor
     * @param $message Mensagem
     */
     
    public function __construct($message)
    {
        parent::__construct('img');
        $this->html = "<i class='fa-solid fa-circle-question' title='$message' style='font-size: 15px; color: #17a2b8;'></i>";
        parent::add($this->html);
    }


    /**
     * Método que devolve o conteúdo html do objeto
     */
    public function getHtmlContent()
    {
        return $this->html;
    }
}
