<!-- Aula 5 do Módulo 4 - Formulário Estático 
    O Formulário Estático quando clico em enviar o meio da tela é substituída.
    No enviar ele executa apenas a action
    basta transformar a function do send em static

    ***
    O $this não pode ser usado em uma função estática

-->
<?php

class FormularioBootstrapEstatico extends TPage
{
    // cria-se o Objeto Formulário $form + linha 13
    private $form;

    public function __construct()
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder;
        // Título do formulário:
        $this->form->setFormTitle('Formulário de Autorização para Passeio para Hogsmeade');
            // Esta classe já faz a lógica, tratamento de campo e view, bem completo

            $id           = new TEntry('id');
            $descricao    = new TEntry('descricao');
            $senha        = new TPassword('senha');
            $dt_criacao   = new TDateTime('dt_criacao');
            $dt_expiracao = new TDate('dt_expiracao');
            $valor        = new TEntry('valor');
            $cor          = new TColor('cor');
            $peso         = new TSpinner('peso');
            $tipo         = new TCombo('tipo'); // lista de opções
            $texto        = new TText('texto');

            $nome         = new TEntry('Nome');
            $casa         = new TCombo('Casa');
            $casa->addItems( [ 'G' => 'Grifinória', 'L' => 'Lufa-Lufa', 'C' => 'Corvinal', 'S' => 'Sonserina'] );
            $ano          = new TDate('Ano Escolar');
            $ano->setMask('yyyy');
            $ano->setDatabaseMask('yyyy');

            $label1 = new TLabel('Dados do Bruxo', '#6E57E0', 12, 'bi');
            $label1->style = 'text-align:left;border-bottom: 1px solid gray; width: 100%';
            $label2 = new TLabel('Dados do(s) Responsável(eis)', '#6E57E0', 12, 'bi');
            $label2->style = 'text-align:left;border-bottom: 1px solid gray; width: 100%';

            $nomeR          = new TEntry('Nome Completo');
            $parentesco     = new TEntry('Parentesco');

            $conteudo       = new TText('Conteudo');
            $conteudo->placeholder = 'Eu, [Nome do Responsável], autorizo [Nome do Aluno] a participar dos passeios em Hogsmeade durante o ano letivo.
Estou ciente de que Hogsmeade é uma aldeia bruxa e que meu filho/filha estará sujeito às leis e costumes locais.
Compreendo que a escola não se responsabiliza por quaisquer incidentes que possam ocorrer durante os passeios.';
            $assinatura     = new TEntry('Assinatura');
            $data           = new TDate('Data');
            $data->setMask('dd-mm-yyyy');
            $data->setDatabaseMask('mm-dd-yyyy');

            $id->setEditable(FALSE); // deixa o campo  id não editável pro usuário não usar

            // Coloca campos na tela, capa campo tem um array com os slots
            // cada slot = Label + variável
            $this->form->addContent( [$label1] );
            $this->form->addFields( [ new TLabel('Nome') ], [$nome] );
            $this->form->addFields( [ new TLabel('Casa') ], [$casa], [ new TLabel('Ano Escolar') ], [$ano]  );
            $this->form->addContent( [$label2] );
            $this->form->addFields( [new TLabel('Nome Completo')],[$nomeR]);
            $this->form->addFields( [new TLabel('Parentesco')],[$parentesco]);
            $this->form->addFields( [new TLabel('Conteúdo')],[new TLabel('O responsável autoriza o aluno deste fomulário a participar dos passeios em Hogsmeade durante o ano letivo.
                                                                          Estou ciente de que Hogsmeade é uma aldeia bruxa e que meu filho/filha estará sujeito às leis e costumes locais.
                                                                          Compreendo que a escola não se responsabiliza por quaisquer incidentes que possam ocorrer durante os passeios.')]);

            $this->form->addFields( [ new TLabel('Data') ], [$data] );
            $this->form->addFields( [ new TLabel('Observações Médicas') ], [$texto] );
            $this->form->addFields( [new TLabel('')]);
            $this->form->addFields( [new TLabel('Este formulário deve ser preenchido e assinado por um pai ou responsável de um aluno do terceiro ano ou acima.')]);
            $this->form->addFields( [new TLabel('O formulário deve ser entregue ao professor responsável pela viagem com antecedência.')]);
            $this->form->addFields( [new TLabel('A escola se reserva o direito de negar a participação de um aluno caso o formulário não seja preenchido corretamente ou se houver alguma preocupação quanto à segurança do aluno.')]);


            $this->form->addFields( [], [new TLabel('Assinatura') ], [$assinatura],[] );
            $this->form->addAction( 'Enviar', new TAction( [$this, 'onSend'] ), 'fa:save');

            parent::add( $this->form );
    }
    public static function onSend($param)
    {
        echo '<pre>';
        var_dump($param);
        echo '<pre>';
        
    }

}