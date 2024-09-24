<!-- Aula 6b Módulo 4 - 23/09 -->
<!-- Após adicionar os campos na tela, criaremos um evento ao usar um campo exemplo ver linha 40 -->
<?php

class FormularioVetorialEventos  extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $this->form = new BootstrapFormBuilder('meu_form');
        $this->form->setFormTitle('Lista de campos');
        
        $combo  = new TCombo('combo[]');
        $texto  = new TEntry('texto[]');
        $numero = new TEntry('valor[]');
        $data   = new TDate('dt_registro[]');
        
        $combo->enableSearch();
        $combo->addItems( ['a' => 'Opção A', 'b' => 'Opção B'] );
        $combo->setSize('100%');
        $texto->setSize('100%');
        $numero->setNumericMask(2, ',', '.', true);
        $numero->setSize('100%');
        $numero->style = 'text-align:right';
        $data->setSize('100%');
        
        // componente que vai ao redor dos campos, automatizando operações
            // TFieldList é o container 
        $fieldlist = new TFieldList;
        $fieldlist->generateAria();
        $fieldlist->width = '100%';
        // Nome, objeto, propriedades da coluna
        $fieldlist->addField( '<b>Combo</b>',  $combo,  [ 'width' => '25%'] );
        $fieldlist->addField( '<b>Texto</b>',  $texto,  [ 'width' => '25%'] );
                                // sum => true Faz a totalização da soma deste campo
        $fieldlist->addField( '<b>Número</b>', $numero, [ 'width' => '25%', 'sum' => true] );
        $fieldlist->addField( '<b>Data</b>',   $data,   [ 'width' => '25%'] );
        
// CRIAREMOS botão de ação da linha (ver linha)
        $fieldlist->addButtonAction( new TAction([$this, 'showRow']), 'fa:info-circle purple', 'Mostrar Dados Inseridos Nesta Linha');
// CRIANDO Toast
        $fieldlist->setTotalUpdateAction(new TAction( [$this, 'onTotalUpdate'] ) );

        // Mover objetos de uma linha para Outra
        $fieldlist->enableSorting();
        
        
        $obj = new stdClass;
        $obj->combo = 'a';
        $obj->texto = 'teste';
        $obj->valor = 100;
        $obj->dt_registro = date('Y-m-d');
        
        
        // Coloca as linhas no formulário: header
        $fieldlist->addHeader();
        // Cria uma linha sem conteúdo
        $fieldlist->addDetail( $obj );
        $fieldlist->addDetail( new stdClass );
        $fieldlist->addDetail( new stdClass );
        $fieldlist->addDetail( new stdClass );
        $fieldlist->addDetail( new stdClass );
        // Botao de Mais no Inferior da lista
        $fieldlist->addCloneAction();
        
        // Avisa o formulário para gerenciar os campos

        $this->form->addField( $combo );
        $this->form->addField( $numero );
        $this->form->addField( $data );
        $this->form->addField( $texto );

        $this->form->addContent( [$fieldlist] );
        
        $this->form->addAction('Enviar', new TAction( [$this, 'onSend'] ), 'fa:save');
        
        parent::add( $this->form );
    }
    
// Metodo ShowRow

    public static function   showRow($param)
    {
        new TMessage('info', str_replace(',', '<br>',json_encode($param)));
    }

    // Gera um Toast quando atualizado Valor na Coluna number
    public static function onTotalUpdate($param)
    {   // Agora vamos percorrer o vetor list_data gerado pelo formulário
        
        // echo '<pre>';
        // var_dump($param);
        // echo '<pre>';

        $grandtotal = 0;
        if ($param['list_data'])
        {    
            foreach ($param['list_data'] as $row)
            {       // str replace substitui o primeiro parametro pelo segundo dos dados do terceiro parâmetro
                    // floatval transforma strings em float (numeros com virgula)
                $grandtotal += floatval(str_replace(['.',','],['','.'],$row['valor']));
            }
        }

        // Cria o toast
    //  TToast::show('info', '<b>Total: </b>' . $grandtotal);  
        TToast::show('info', '<b>Total: </b>' . number_format( $grandtotal, 2, ',', '.'), 'bottom right');  

            
    }   

    public static function onSend($param)
    {
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }
}