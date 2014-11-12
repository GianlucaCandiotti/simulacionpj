<?php

  class Estado extends Eloquent{

    protected $table = 'estado';

    public function requerimientos()
    {
        return $this->belongsToMany('Requerimiento');
    }

  }
