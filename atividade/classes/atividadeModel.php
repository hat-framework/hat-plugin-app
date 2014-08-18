<?php 
class app_atividadeModel extends \classes\Model\Model{
    public $tabela = "app_atividade";
    public $pkey   = 'cod';
    public $dados  = array(
         'cod' => array(
	    'name'     => 'Código',
	    'type'     => 'int',
	    'size'     => '11',
	    'pkey'    => true,
	    'ai'      => true,
	    'grid'    => true,
	    'display' => true,
	    'private' => true
        ),
        'autor' => array(
	    'name'     => 'Autor',
	    'type'     => 'int',
	    'size'     => '11',
	    'grid'    => true,
	    'display' => true,
            'especial'        => 'autentication',
            'autentication'   => array('needlogin' => true),
	    'fkey' => array(
	        'model' => 'usuario/login',
	        'cardinalidade' => '1n',
	        'keys' => array('cod_usuario', 'user_name'),
	    ),
        ),
         'tipo' => array(
	    'name'     => 'Tipo',
	    'type'     => 'enum',
            'private'  => true,
	    'default' => 'usuario',
	    'options' => array(
	    	'usuario' => 'usuario',
	    	'sistema' => 'sistema',
	    ),
	    'grid'    => true,
	    'display' => true,
        ),
        'data' => array(
	    'name'     => 'Data',
	    'type'     => 'timestamp','private' => true,
	    'grid'    => true,
	    'display' => true,
         ),
         'texto' => array(
	    'name'     => 'Atividade',
	    'type'     => 'text',
	    'grid'     => true,
	    'display'  => true,
            'especial' => 'editor',
            'editor'   => array('format', 'list', 'link', 'history'),
        ),
        
        'referencia' => array(
	    'name'     => 'Referência',
	    'type'     => 'int',
	    'size'     => '11',
	    'private'  => true,
            'especial' => 'referencia',
	    'fkey' => array(
	        'model' => 'app/referencia',
	        'cardinalidade' => '1n',
	        'keys'     => array('cod', 'link'),
                'onupdate' => 'cascade',
                'ondelete' => 'cascade',
	    ),
        ),
        'button'     => array('button' => 'Publicar Atividade'),);
}
?>