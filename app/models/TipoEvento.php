<?php

	class TipoEvento extends Eloquent{

		protected $table = 'tipo_eventos';
	
		public function eventos()
		{
				return $this->belongsToMany('Evento');
		}
	
	}