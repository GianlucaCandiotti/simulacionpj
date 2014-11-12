<?php

	class Evento extends Eloquent{

		public function requerimientos()
		{
				return $this->hasOne('Requerimiento');
		}

		public function tipo_eventos()
		{
				return $this->hasOne('TipoEvento');
		}

	}
