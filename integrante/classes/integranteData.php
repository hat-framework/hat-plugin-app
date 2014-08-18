<?php 
class app_integranteData extends \classes\Model\DataModel{
    protected $dados  = array(
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
        
        'cod_usuario' => array(
	    'name'     => 'Usuário',
	    'type'     => 'int',
	    'size'     => '11',
	    'grid'    => true,
	    'display' => true,
	    'fkey' => array(
                'filther' => array(),
	        'model' => 'usuario/login',
	        'cardinalidade' => '1n',
	        'keys' => array('cod_usuario', 'user_name'),
                'ondelete' => 'restrict',
	    ),
        ),
        
        'criadoem' => array(
	    'name'     => 'Participa desde',
	    'type'     => 'timestamp',
            'private' => true,
	    'grid'    => true,
	    'display' => true,
        ),
        
        'excluidoem' => array(
	    'name'     => 'Deixou de participar',
	    'type'     => 'datetime',
            'private' => true,
	    'grid'    => true,
	    'display' => true,
        ),
        
        'autor' => array(
	    'name'     => 'Quem Adicionou',
	    'type'     => 'int',
	    'size'     => '11',
	    'grid'     => true,
	    'display'  => true,
            'especial' => 'autentication',
            'autentication' => array('needlogin' => true),
	    'fkey' => array(
                'filther'       => array(),
	        'model'         => 'usuario/login',
	        'cardinalidade' => '1n',
	        'keys'          => array('cod_usuario', 'user_name'),
                'ondelete'      => 'restrict',
	    ),
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
        'button'     => array('button' => 'Adicionar Integrante'),
   );
}
?>