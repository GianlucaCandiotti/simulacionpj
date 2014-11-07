<?php

class InitInfoSeeder extends Seeder {

	public function run()
	{
		//User::create(array('username' => 'user' , 'password' => Hash::make('pass') , 'email' =>  'user@url.com'));
		TipoEvento::create(array('nombre' => 'Arribo'));
		TipoEvento::create(array('nombre' => 'Salida1'));
		TipoEvento::create(array('nombre' => 'Salida2'));
	}
}