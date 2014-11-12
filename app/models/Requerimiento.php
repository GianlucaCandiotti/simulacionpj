<?php

	class Requerimiento extends Eloquent{

		public function eventos()
		{
				return $this->belongsToMany('Evento');
		}

		public function estados()
		{
				return $this->hasOne('Estado');
		}

	}
