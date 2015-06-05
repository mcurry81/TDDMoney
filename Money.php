<?php

    Class Money {
        //started public
        protected $amount;
        protected $currency;

        public function __construct($amount, $currency){
        	$this->amount = $amount;
        	$this->currency = $currency;
        }

        //static function doens't depend on any instance properties of the Money class
        static function franc($amount) {
        	return new Money($amount, "CHF");
        }

        //static function doens't depend on any instance properties of the Money class
        static function dollar($amount){
        	return new Money($amount, "USD");
        }

        public function times($multiplier){
        	return new Money($this->amount * $multiplier, $this->currency);
        }

        public function equals(Money $object){
        	$money = $object;
            return $this->amount == $money->amount && self::currency() == $money->currency;
        }

        public function currency(){
        	return $this->currency;
        }


    }
?>