<!-- Mod 4 Aula 7 - CheckList -->
<?php

class FormularioCheckList extends TPage
{
    private $form;

    public function __construct()
    {
        parent::__construct();

        $this->form = new BootstrapFormBuilder;
        $this->form->setFormTitle('Check List');

        $id    = new TEntry('id');
        $nome  = new TEntry('nome');
        $lista = new TCheckList('lista_produtos');

        $lista->addColumn('id',         'Id',         'center', '10%');
        $lista->addColumn('descricao',  'Descrição',  'left',   '50%');
        $lista->addColumn('preco_venda','Preço Venda','left',   '40%');
        // $lista->setHeigth(250);
        // $lista->makeScrolable();

        // Adicionando campos na tela
        $this->form->addFields([ new TLabel('id')],       [$id]);
        $this->form->addFields([ new TLabel('Nome')],     [$nome]);
        $this->form->addFields([ new TLabel('Produtos')], [$lista]);

        // Adcionando o conteúdo
        TTransaction::open( 'sample' );
        $produtos = Produto::all();
        TTransaction::close();
        $lista->addItem( $produtos );

        //Botão de Ação

        $this->form->addAction('Enviar', new TAction( [$this, 'onSend' ] ) ,'fa:save' );

        parent::add( $this->form );

    }

    public function onsend($param)
    {
        $data = $this->form->getData();
        $this->form->setData($data);
        
        var_dump($data->nome);
        var_dump($data->lista_produtos);
    }
} 