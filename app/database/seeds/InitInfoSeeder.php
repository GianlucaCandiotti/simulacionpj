<?php

class InitInfoSeeder extends Seeder {

	public function run()
	{
		//User::create(array('username' => 'user' , 'password' => Hash::make('pass') , 'email' =>  'user@url.com'));
		TipoEvento::create(array('nombre' => 'Arribo'));
		TipoEvento::create(array('nombre' => 'Salida Servidor 1'));
		TipoEvento::create(array('nombre' => 'Salida Servidor 2'));
		Estado::create(array('nombre' => 'Cola1'));
		Estado::create(array('nombre' => 'Servidor1'));
		Estado::create(array('nombre' => 'Cola2'));
		Estado::create(array('nombre' => 'Servidor2'));
		Estado::create(array('nombre' => 'Salio'));
	}
}
