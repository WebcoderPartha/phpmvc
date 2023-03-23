<?php
/*
  * Form Validation
  */
    class Form {

        public $currentValue;
        public $values = [];
        public $errors = [];

        public function __construct(){
        }

        public function post($key){

            $this->values[$key] = trim($_POST[$key]);
            $this->currentValue = $key;
            return $this;

        }

        public function isEmpty(){
            if ($this->values[$this->currentValue] == ''){
                $this->errors[$this->currentValue]['empty'] = 'Field must not be empty!';
            }
            return $this;
        }
        public function isSelectEmpty(){
            if ($this->values[$this->currentValue] == 0){
                $this->errors[$this->currentValue]['empty'] = 'Field must not be empty!';
            }
            return $this;
        }


        public function length($min, $max){

            if (strlen($this->values[$this->currentValue]) < $min OR strlen($this->values[$this->currentValue]) > $max){
                $this->errors[$this->currentValue]['length'] = 'Should min '.$min. ' And Max '.$max. ' Characters.';
            }
            return $this;
        }

        public function submit(){
            if (empty($this->errors)){
                return true;
            }else{
                return false;
            }
        }


    }
