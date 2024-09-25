<!-- 
    Módulo 8
    Aula 01
    TCardView
    Para Vídeos

-->
<?php
class CardViewVideo extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $cards = new TCardView;
        
        $items = [];
        $items[] = (object) ['id' => 1, 'titulo' => 'Video 1',           'origem' => '-ok_8UuFZ4Y?si=XTZrNeOb3gGxLiEd'];
        $items[] = (object) ['id' => 2, 'titulo' => 'Título do Video 2', 'origem' => 'C4AeMUabwD0?si=qfCI9m_9zt7mPqoH'];
        $items[] = (object) ['id' => 3, 'titulo' => 'Item 3',            'origem' => 'RezjC4jdbTU?si=1GWb0-XpqSNZxOBb           '];
        
        foreach ($items as $item)
        {
            $cards->addItem($item);
        }
        
        $cards->setTitleAttribute('titulo');
        // Será exibido no conteúdo do card
    $cards->setItemTemplate( '<iframe width="100%" height="475" 
                                src="https://www.youtube.com/embed/{origem}" allowfullscreen></iframe>');
                
        $acao_edit   = new TAction([$this, 'onEdit'],   ['id' => '{id}']);
        $acao_delete = new TAction([$this, 'onDelete'], ['id' => '{id}']);
        
        $cards->addAction( $acao_edit,    'Editar',  'fa:edit blue');
        $cards->addAction( $acao_delete,  'Excluir', 'fas:trash-alt red');

        parent::add($cards);
    }
    
    public static function onEdit($param)
    {
        new TMessage('info', '<b>onEdit</b><br>'. json_encode($param) );
    }
    
    public static function onDelete($param)
    {
        new TMessage('warning', '<b>onDelete</b><br>'. json_encode($param) );
    }
}
