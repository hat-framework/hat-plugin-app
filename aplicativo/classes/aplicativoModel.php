<?php

class app_aplicativoModel extends \classes\Model\Model{
    
    protected $tabela  = "app_aplicativo";
    protected $pkey    = "cod";
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
        
        'modelo' => array(
	    'name'     => 'Modelo',
	    'type'     => 'varchar',
	    'size'     => '64',
	    'display'  => true,
        ),
        
        'aplicativo' => array(
	    'name'     => 'Aplicativo',
	    'type'     => 'varchar',
	    'size'     => '64',
	    'display'  => true,
        ),

    );
    
    public function getApps($model){
        $where = "modelo = '$model'";
        return $this->selecionar(array(), $where);
    }
}

?>