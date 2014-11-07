<?php

	class Evento extends Eloquent{
		
		public static $timestamps = false;
		
		public function requerimientos()
		{
				return $this->hasOne('Requerimiento');
		}
		
		public function tipo_eventos()
		{
				return $this->hasOne('TipoEvento');
		}
	
	}