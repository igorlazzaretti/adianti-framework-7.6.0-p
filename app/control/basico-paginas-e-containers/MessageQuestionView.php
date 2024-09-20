<?php
class MessageQuestionView extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        // define TAction para a variável
        $action1 = new TAction([$this, 'onActionYes']);
        $action2 = new TAction([$this, 'onActionNo']);

        // Cria a TQuestion com 3 parâmetros: pergunta,ação 1 e 2;
        new TQuestion('Gosta de Harry Potter?', $action1, $action2);
    
    }
        // Cria a função onActionYes e a onActionNo

        public static function onActionYes($param)
        {
            new TMessage('info', 'Parabéns pelo óbvio, você escolheu Sim!');
        }

        // Método Estático o framework executa apenas o TMessage Específico

        public static function onActionNo($param)
        {
            new TMessage('error', 'Não? Ta maluco? Sugiro procurar um psicólogo urgente!');
        }
  
}