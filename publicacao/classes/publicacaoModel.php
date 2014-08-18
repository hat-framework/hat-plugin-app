<?php

class app_publicacaoModel extends \classes\Model\Model{
    
    protected $tabela            = "app_publicacao";
    protected $pkey              = "cod";
    protected $dados = array(
        
        'cod' => array(
            'name'    => "Código",
            'pkey'    => true,
            'ai'      => true,
            'type'    => 'int',
            'size'    => '11',
            'grid'    => true,
            'display' => true,
            'private' => true,
            'notnull' => true
         ),
        
        'titulo' => array(
            'name'    => 'Título',
            'type'    => 'varchar',
            'title'   => true,
            'size'    => '128',
            'grid'    => true,
            'display' => true,
            'notnull' => true
        ),
        
        'resumo' => array(
            'name'    => 'Resumo',
            'type'    => 'varchar',
            'size'    => '200',
            'especial'=> 'resumeof',
            'resumeof'=> 'conteudo',
            'display' => true,
            'notnull' => true
        ),

        'conteudo' => array(
            'name'    => 'Conteúdo',
            'type'    => 'text',
            'especial'=> 'editor',
            'editor'   => array('format', 'align', 'list', 'link', 'history', 'font-size', 'font-family', 'color'),
            'notnull' => true
        ),
        
        'autor' => array(
	    'name'     => 'Publicado por',
	    'type'     => 'int',
	    'size'     => '11',
	    'notnull' => true,
	    'grid'    => true,
            'especial' => 'autentication',
            'autentication' => array('needlogin' => true),
	    'fkey' => array(
	        'model' => 'usuario/login',
	        'cardinalidade' => '1n',
	        'keys' => array('cod_usuario', 'user_name'),
                'onupdate' => 'cascade',
                'ondelete' => 'restrict'
	    ),
         ),
        
        'criadoem' => array(
	    'name'     => 'Publicadoem',
	    'type'     => 'timestamp',
	    'notnull' => true,
	    'grid'    => true,
	    'display' => true,
            'default' => "CURRENT_TIMESTAMP",
            'especial' => 'hide'
        ),
        
        'referencia' => array(
	    'name'     => 'Referência',
	    'type'     => 'int',
	    'size'     => '11',
            'especial' => 'referencia',
	    'private'  => true,
	    'fkey' => array(
	        'model' => 'app/referencia',
	        'cardinalidade' => '1n',
	        'keys'     => array('cod', 'link'),
                'onupdate' => 'cascade',
                'ondelete' => 'cascade',
	    ),
        ),
    );
}

?>