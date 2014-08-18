<?php

use classes\Controller\CController;
class app_appController extends CController{
    protected $document = "";
    public function setDocument($doc){
        $this->document = $doc;
    }
}