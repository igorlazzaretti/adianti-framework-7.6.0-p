<?php
class DialogInputView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // Classe flexivel para montar formulários
        $form = new BootstrapFormBuilder('input_form');
        
        $personagemfavorito = new TEntry('personagemfavorito');
        $casafavorita  = new TEntry('casafavorita');
        
        $form->addFields( [new TLabel('Personagem')], [$personagemfavorito] );
        $form->addFields( [new TLabel('Casa')], [$casafavorita] );
        // acão do botão: label, ação (Classe, __CLASS__ (méotodo do php para dizer que é a própria classe e seu nome) e ícone
        $form->addAction('Salvar', new TAction( [__CLASS__, 'onConfirm1'] ), 'fa:save green');
        
        new TInputDialog('Responda seu Personagem Favorito e Casa Favorita', $form);
    }
    
    public static function onConfirm1($param)
    {
       new TMessage('info', 'Você respondeu: '. "<br>" . '  Personagem Favorito: ' . "<b>" .$param['personagemfavorito'] ."</b>" . "<br>" .  'Personagem: ' . "<b>" . $param['casafavorita'] . "</b>");
       // new TMessage('info', json_encode($param) );
    }
}