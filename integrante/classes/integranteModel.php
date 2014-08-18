<?php 
class app_integranteModel extends \classes\Model\Model{
    public $tabela = "app_integrante";
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
        'button'     => array('button' => 'Adicionar Integrante'),);
    
    public function inserir($dados) {
        if(isset($dados['excluidoem']))unset($dados['excluidoem']);
        return parent::inserir($dados);
    }
    
    public function editar($id, $post, $camp = "") {
        if(isset($post['excluidoem']))unset($post['excluidoem']);
        return parent::editar($id, $post, $camp);
    }
    
    public function paginate($page, $link = "", $cod_item = "", $campo = "", $qtd = 20, $campos = array(), $adwhere = "", $order = "") {
        $wh      = "excluidoem IS NULL";
        $adwhere = ($adwhere == "")?$wh:"$wh AND ($adwhere)";
        return parent::paginate($page, $link, $cod_item, $campo, $qtd, $campos, $adwhere, $order);
    }
    
    public function apagar($valor, $chave = "") {
        $dados['excluidoem'] = \classes\Classes\timeResource::getFormatedDate();
        if(!parent::editar($valor, $dados, $chave)){
            $this->setErrorMessage("Erro ao remover integrante!");
            return false;
        }
        $this->setSuccessMessage("Integrante removido com sucesso!");
        return true;
    }
}
?>