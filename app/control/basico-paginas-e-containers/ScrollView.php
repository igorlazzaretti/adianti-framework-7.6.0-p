<?php
class ScrollView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // Cria nossa janela com scroll 
        $scroll = new TScroll;
        // Tamanho da janela 450 pixels
        $scroll->setSize('100%', '450');
        // Tabela dentro do Scroll com muito conteúdo
        $table = new TTable;
        $scroll->add($table);
        // Laço de Repetição Loop com 20 iterações
        for ($n=1; $n<=20; $n++)
        {
            $object = new TEntry('field'. $n);
            $table->addRowSet( ' Campo nro '. $n, $object);
        }

        parent::add( $scroll );
    }
}