<?php

class SimulationController extends BaseController {

  public function showSimulation()
  {
    return View::make('simulation.simulation-start');
  }

  public function showResults()
  {
    return View::make('simulation.simulation-results');
  }

  public function simulationPost()
  {
    return Redirect::to('/resultados');
  }

  public function resultsPost()
  {
    return View::make('simulation.simulation-results');
  }


}
