<?php

namespace numbers;


  class NumbersHelper {

    protected $m;
    protected $a;
    protected $c;
    protected $x;

    function __construct($m, $a, $c, $x) {
      $this->m = pow ( 2, ceil( log($m)  / log( 2 ) ) ); ;
      $this->a = $a;
      $this->c = $c;
      $this->x = $x;
    }

    public function generateRandomNumbers(quant) {
      
    }
  }
