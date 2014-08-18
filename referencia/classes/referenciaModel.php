<?php 
class app_referenciaModel extends \classes\Model\Model{
    public $tabela = "app_referencia";
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
        'link' => array(
            'name' => 'Link',
            'type' => 'varchar',
            'size' => '128',
            'unique' => array('model' => 'app/referencia'),
            'private' => true,
        ),
        'button'     => array('button' => 'Gravar Referência'),);
    
    public function getRef($referencia){
        $link  = (trim($referencia) != "")?$referencia:str_replace(CURRENT_ACTION."/", "", CURRENT_URL);
        if(trim($link) == "")throw new classes\Exceptions\modelException("O link enviado para o aplicativo de Referência não pode ser vazio");
        $ref = getSimplePath($ref);
        
        $total = $this->getCount("link = '$ref'");
        if($total > 0){
            $item = $this->getItem($ref, 'referencia');
            return $item['cod'];
        }
        
        $insert = array('link' => $ref);
        if(!parent::inserir($insert)) throw new classes\Exceptions\modelException("Não foi possível salvar o link $ref no banco de dados!");
        return $this->getLastId();
    }
}
?>