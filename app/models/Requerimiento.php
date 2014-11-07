<?php

	class Requerimiento extends Eloquent{
	
		public static $timestamps = false;
		
		public function eventos()
		{
				return $this->belongsToMany('Evento');
		}
	
	}