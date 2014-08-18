<?php

class appInstall extends classes\Classes\InstallPlugin{
    
    protected $dados = array(
        'pluglabel' => 'Aplicativos da Página',
        'isdefault' => 'n',
        'detalhes'  => 'Este plugin permite instalar aplicativos dentro das páginas de um plugin',
        'system'    => 's',
    );
    
    public function install(){
        return true;
    }
    
    public function unstall(){
        return true;
    }
}