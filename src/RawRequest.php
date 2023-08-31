<?php

namespace Crafter;

class RawRequest{
    private $data = array();

    public function __construct($data =false){
        $this->data = $data ? $data : $this->initFromHttp();

        unset($_REQUEST);
        unset($_POST);
        unset($_GET);
    }

    private function initFromhttp(){
        if(!empty($_POST)){
            return $_POST;
        }

        if(!empty($_GET)){
            return $_GET;
        }

        return array();
    }

    public function getForValidation($var){
        return $this->data[$var];
    }
}