<?php
class atividadeComponent extends classes\Component\Component{
    public function __construct() {
        $this->listActions = array('Veja Mais' => CURRENT_URL."show");
        parent::__construct();
    }
}
?>