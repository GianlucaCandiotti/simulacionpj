<?php

class SimulationController extends BaseController {

  private $m;
  private $a;
  private $c;
  private $x;
  private $event_array;

  public function __construct($m = 60000000, $a = 13, $c = 31)
  {
    $this->m = pow ( 2, ceil( log($m)  / log( 2 ) ) );
    $this->a = $a;
    $this->c = $c;
    $this->x = idate('U');
    $this->event_array = array
    (
      'A' => 0,
      'S1' => 9999,
      'S2' => 9999
    );
  }

  private function generateRandomNumbers($quant)
  {
    if($quant!=0){
      $this->x = fmod(($this->a * $this->x + $this->c), $this->m);
      return number_format((($this->x / $this->m) + $this->generateRandomNumbers($quant-1.0)) , 10);
    }
    return 0;
  }

  public function generateVariables($dist, $param1, $param2 = NULL){
    switch($dist){
      case 'uniforme':
        $max = max($param1, $param2);
        $min = min($param1, $param2);
        $r = $this->generateRandomNumbers(1);
        $result = $min * $r * ($max - $min);
        break;
      case 'exponencial':
        $r = $this->generateRandomNumbers(1);
        $result = $param1 * -1 * log(1 - $r);
        break;
      case 'normal':
        $r = $this->generateRandomNumbers(12);
        $result = $param1 + $param2 * ($r - 6);
        break;
      case 'discreta':
        $r = $this->generateRandomNumbers(1);
        $length = count($param1);
        for($i=0; $i<$length; $i++){
          if($r < $param1[$i]){
            $result = $param1[$i];
						break;
          }
        }
    }
    return $result;
  }

  public function showSimulation()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('eventos')->truncate();
    DB::table('requerimientos')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    return View::make('simulation.simulation-start');
  }

  public function showResults()
  {
    $eventos = Evento::all();
    $requirements = Requerimiento::all();
    $total_time = min($eventos->last()->time_A, $eventos->last()->time_S1, $eventos->last()->time_S2);
    $prom_d1 = 0;
    $prom_d2 = 0;
    $prom_cola1 = 0;
    $prom_cola2 = 0;
    $prom_sis = 0;
    $i = 0;
    $j = 0;

    foreach($requirements as $requirement){
      if($requirement->estado_id > 1){
        $prom_d1 = $prom_d1 + $requirement->D1;
        $i++;
      }
      if($requirement->estado_id > 3){
        $prom_d2 = $prom_d2 + $requirement->D2;
        $j++;
      }
    }

    foreach($eventos as $evento){
      if($evento->id < $eventos->last()->id){
        $next_event = Evento::find($evento->id + 1);
        $prom_cola1 = $prom_cola1 + $evento->req_cola1 * (min($next_event->time_A, $next_event->time_S1, $next_event->time_S2) - min($evento->time_A, $evento->time_S1, $evento->time_S2));
        $prom_cola2 = $prom_cola2 + $evento->req_cola2 * (min($next_event->time_A, $next_event->time_S1, $next_event->time_S2) - min($evento->time_A, $evento->time_S1, $evento->time_S2));
        $prom_sis = $prom_sis + $evento->req_sistema * (min($next_event->time_A, $next_event->time_S1, $next_event->time_S2) - min($evento->time_A, $evento->time_S1, $evento->time_S2));
      }
    }
    if($prom_d1 != 0){
      $prom_d1 = $prom_d1/$i;
    }
    if($prom_d2 != 0){
      $prom_d2 = $prom_d2/$j;
    }
    $prom_cola1 = $prom_cola1/$total_time;
    $prom_cola2 = $prom_cola2/$total_time;
    $prom_sis = $prom_sis/$total_time;

    return View::make('simulation.simulation-results', ['total_time' => $total_time, 'prom_d1' => $prom_d1, 'prom_d2' => $prom_d2, 'prom_cola1' => $prom_cola1, 'prom_cola2' => $prom_cola2, 'prom_sis' => $prom_sis])->with('eventos', $eventos);
  }

  public function simulationPost()
  {

    $simulation_data = array
    (
      'cantidad' => Input::get('cantidad'),
      'tiempo' => Input::get('tiempo'),
      'arribo-dist' => Input::get('distribution-type-A'),
      'salida1-dist' => Input::get('distribution-type-B'),
      'salida2-dist' => Input::get('distribution-type-C'),
    );

		$param1A = 0;
		$param2A = 0;
		$param1B = 0;
		$param2B = 0;
		$param1C = 0;
		$param2C = 0;

    switch($simulation_data['arribo-dist']){
      case 'uniforme':
				$param1A = Input::get('uniform-dist-1-A');
				$param2A = Input::get('uniform-dist-2-A');
        break;
      case 'exponencial':
				$param1A = Input::get('exponential-dist-1-A');
        break;
      case 'normal':
				$param1A = Input::get('normal-dist-1-A');
				$param2A = Input::get('normal-dist-2-A');
				break;
			case 'discreta':
				$param1A = Input::get('discrete-dist-1-A');
				$param1A = explode(" ", $param1A);
				break;
    }

		switch($simulation_data['salida1-dist']){
			case 'uniforme':
				$param1B = Input::get('uniform-dist-1-B');
				$param2B = Input::get('uniform-dist-2-B');
				break;
			case 'exponencial':
				$param1B = Input::get('exponential-dist-1-B');
				break;
			case 'normal':
				$param1B = Input::get('normal-dist-1-B');
				$param2B = Input::get('normal-dist-2-B');
				break;
			case 'discreta':
				$param1B = Input::get('discrete-dist-1-B');
				$param1B = explode(" ", $param1B);
				break;
		}

		switch($simulation_data['salida2-dist']){
			case 'uniforme':
				$param1C = Input::get('uniform-dist-1-C');
				$param2C = Input::get('uniform-dist-2-C');
				break;
			case 'exponencial':
				$param1C = Input::get('exponential-dist-1-C');
				break;
			case 'normal':
				$param1C = Input::get('normal-dist-1-C');
				$param2C = Input::get('normal-dist-2-C');
				break;
			case 'discreta':
				$param1C = Input::get('discrete-dist-1-C');
				$param1C = explode(" ", $param1C);
				dd($this->generateVariables('discreta', $param1C));
				break;
		}

    if(isset($simulation_data['cantidad']) && $simulation_data['cantidad'] > 0){
      $this->simulationMecanism('cantidad', $simulation_data['cantidad'], $simulation_data['arribo-dist'], $simulation_data['salida1-dist'], $simulation_data['salida2-dist'], $param1A, $param2A, $param1B, $param2B, $param1C, $param2C);
    }elseif(isset($simulation_data['tiempo']) && $simulation_data['tiempo'] > 0){
      $this->simulationMecanism('tiempo', $simulation_data['tiempo'], $simulation_data['arribo-dist'], $simulation_data['salida1-dist'], $simulation_data['salida2-dist'], $param1A, $param2A, $param1B, $param2B, $param1C, $param2C);
    }

    return Redirect::to('/resultados');
  }

  public function simulationMecanism($simulation_type, $rel_param, $arribo_dist, $salida1_dist, $salida2_dist, $param1A, $param2A, $param1B, $param2B, $param1C, $param2C)
  {
    $i = 1;
    $param = 0;
    $event_pass_time = 0;

    while($param < $rel_param){
      $new_event = new Evento;
      $new_requerimiento = new Requerimiento;

      if($i == 1){
        $this->event_array['A'] = $this->generateVariables('exponencial', 2);
        $new_requerimiento->T = $this->event_array['A'];
        $new_requerimiento->estado_id = 2;
        $new_requerimiento->D1 = 0;
        $new_requerimiento->save();

				$new_event->event_time = $this->event_array['A'];
        $new_event->time_A = $this->event_array['A'];
        $new_event->time_S1 = $this->event_array['S1'];
        $new_event->time_S2 = $this->event_array['S2'];
        $new_event->next_req_to_A = 2;
        $new_event->next_req_to_S1 = 1;
        $new_event->next_req_to_S2 = 1;
        $new_event->req_sistema = 1;
        $new_event->req_cola1 = 0;
        $new_event->req_cola2 = 0;
        $new_event->util_s1_flag = 1;
        $new_event->util_s2_flag = 0;
        $new_event->util_s1 = 0;
        $new_event->util_s2 = 0;
        $new_event->requerimiento_id = 1;
        $new_event->tipo_evento_id = 1;
        $new_event->save();

        $event_pass_time = $this->event_array['A'];
        $this->event_array['A'] = 'x';
        $this->event_array['S1'] = 'x';

      }else{
        $last_event = Evento::find($i - 1);
        $next_req_to_A = $last_event->next_req_to_A;
        $next_req_to_S1 = $last_event->next_req_to_S1;
        $next_req_to_S2 = $last_event->next_req_to_S2;

        if($this->event_array['A'] == 'x'){
          $this->event_array['A'] = Requerimiento::find($next_req_to_A - 1)->T + $this->generateVariables($arribo_dist, $param1A, $param2A);
        }
        if($this->event_array['S1'] == 'x'){
          $this->event_array['S1'] = Requerimiento::find($next_req_to_S1)->T + Requerimiento::find($next_req_to_S1)->D1 + $this->generateVariables($salida1_dist, $param1B, $param2B);
        }
        if($this->event_array['S2'] == 'x'){
          $this->event_array['S2'] = Requerimiento::find($next_req_to_S2)->C1 + Requerimiento::find($next_req_to_S2)->D2 + $this->generateVariables($salida2_dist, $param1C, $param2C);
        }

        $event_pass_time = min($this->event_array['A'], $this->event_array['S1'], $this->event_array['S2']);

				$new_event->event_time = $event_pass_time;
        $new_event->next_req_to_A = $next_req_to_A;
        $new_event->next_req_to_S1 = $next_req_to_S1;
        $new_event->next_req_to_S2 = $next_req_to_S2;

        switch($event_pass_time){
          case $this->event_array['A']:

            $new_requerimiento->T = $event_pass_time;
            $new_requerimiento->estado_id = 1;

            $new_event->time_A = $this->event_array['A'];
            $new_event->time_S1 = $this->event_array['S1'];
            $new_event->time_S2 = $this->event_array['S2'];
            $new_event->next_req_to_A = $next_req_to_A + 1;
            $new_event->req_sistema = $last_event->req_sistema + 1;
            $new_event->req_cola1 = $last_event->req_cola1 + 1;
            $new_event->req_cola2 = $last_event->req_cola2;
            $new_event->util_s1_flag = $last_event->util_s1_flag;
            $new_event->util_s2_flag = $last_event->util_s2_flag;

            $new_event->util_s1 = $last_event->util_s1 + $event_pass_time - $last_event->event_time;
            $new_event->util_s2 = $last_event->util_s2 + $event_pass_time - $last_event->event_time;
            $new_event->requerimiento_id = $next_req_to_A;
            $new_event->tipo_evento_id = 1;

            if($last_event->util_s1_flag == 0){
              $new_requerimiento->estado_id = 2;
              $new_requerimiento->D1 = 0;

              $new_event->req_cola1 = $last_event->req_cola1;
              $new_event->util_s1_flag = 1;
              $new_event->util_s1 = $last_event->util_s1;

              $this->event_array['S1'] = 'x';
            }

            if($last_event->util_s2_flag == 0){
              $new_event->util_s2 = $last_event->util_s2;
            }

            $this->event_array['A'] = 'x';
            $new_requerimiento->save();

            break;

          case $this->event_array['S1']:
            $req_out = Requerimiento::find($next_req_to_S1);
            $req_out->C1 = $event_pass_time;
            $req_out->estado_id = 3;

            $new_event->time_A = $this->event_array['A'];
            $new_event->time_S1 = $this->event_array['S1'];
            $new_event->time_S2 = $this->event_array['S2'];
            $new_event->next_req_to_S1 = $next_req_to_S1 + 1;
            $new_event->req_sistema = $last_event->req_sistema;
            $new_event->req_cola1 = $last_event->req_cola1;
            $new_event->req_cola2 = $last_event->req_cola2 + 1;
            $new_event->util_s1_flag = 0;
            $new_event->util_s2_flag = $last_event->util_s2_flag;
            $new_event->util_s1 = $last_event->util_s1 + $event_pass_time - $last_event->event_time;
            $new_event->util_s2 = $last_event->util_s2 + $event_pass_time - $last_event->event_time;
            $new_event->requerimiento_id = $req_out->id;
            $new_event->tipo_evento_id = 2;

            $this->event_array['S1'] = '9999';

            if($last_event->req_cola1 > 0){
              $req_in = Requerimiento::find($next_req_to_S1 + 1);
              $req_in->D1 = $req_out->C1 - $req_in->T;
              $req_in->estado_id = 2;

              $new_event->req_cola1 = $last_event->req_cola1 - 1;
              $new_event->util_s1_flag = 1;
              $req_in->save();

              $this->event_array['S1'] = 'x';
            }

            if($last_event->util_s2_flag == 0){
              $req_out->estado_id = 4;
              $req_out->D2 = 0;

              $new_event->req_cola2 = $last_event->req_cola2;
              $new_event->util_s2_flag = 1;
              $new_event->util_s2 = $last_event->util_s2;

              $this->event_array['S2'] = 'x';
            }

            $req_out->save();

            break;

          case $this->event_array['S2']:
            $req_out = Requerimiento::find($next_req_to_S2);
            $req_out->C2 = $event_pass_time;
            $req_out->estado_id = 5;

            $new_event->time_A = $this->event_array['A'];
            $new_event->time_S1 = $this->event_array['S1'];
            $new_event->time_S2 = $this->event_array['S2'];
            $new_event->next_req_to_S2 = $next_req_to_S2 + 1;
            $new_event->req_sistema = $last_event->req_sistema - 1;
            $new_event->req_cola1 = $last_event->req_cola1;
            $new_event->req_cola2 = $last_event->req_cola2;
            $new_event->util_s1_flag = $last_event->util_s1_flag;
            $new_event->util_s2_flag = 0;
            $new_event->util_s1 = $last_event->util_s1 + $event_pass_time - $last_event->event_time;
            $new_event->util_s2 = $last_event->util_s2 + $event_pass_time - $last_event->event_time;
            $new_event->requerimiento_id = $req_out->id;
            $new_event->tipo_evento_id = 3;

            $this->event_array['S2'] = '9999';

            if($last_event->req_cola2 > 0){
              $req_in = Requerimiento::find($next_req_to_S2 + 1);
              $req_in->D2 = $req_out->C2 - $req_in->C1;
              $req_in->estado_id = 4;
              $req_in->save();

              $new_event->req_cola2 = $last_event->req_cola2 - 1;
              $new_event->util_s2_flag = 1;

              $this->event_array['S2'] = 'x';
            }

            $req_out->save();

            break;
        }

        $new_event->save();

      }

      $i++;

      if($simulation_type == 'cantidad'){
        $param++;
      }elseif($simulation_type == 'tiempo'){
        $param = $event_pass_time;
      }

    }

    if($simulation_type == 'tiempo'){
      $events = Evento::all();
      $events->last()->delete();
    }

    return false;
  }

}
