<div class="modal fade" id="results-modal" tabindex="-1" role="dialog" aria-labelledby="results-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="results-modal-label">Estadísticos</h4>
      </div>
      <div class="modal-body center">
        <div class="row">
          <div class="col-md-6">
            <h4>
              Promedio de demora en cola 1
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($prom_d1, 3)}}</p>
          </div>
          <div class="col-md-6">
            <h4>
              Promedio de demora en cola 2
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($prom_d2, 3)}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h4>
              Promedio de requerimientos en cola 1
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($prom_cola1, 3)}}</p>
          </div>
          <div class="col-md-6">
            <h4>
              Promedio de requerimientos en cola 2
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($prom_cola2, 3)}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h4>
              Promedio de requerimientos en el sistema
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($prom_sis, 3)}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h4>
              Utilización del servidor 1
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($eventos->last()->util_s1, 3)}}</p>
          </div>
          <div class="col-md-6">
            <h4>
              Utilización del servidor 2
            </h4>
            <p><span class="glyphicon glyphicon-time"></span> {{number_format($eventos->last()->util_s2, 3)}}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer center no-border">
      </div>
    </div>
  </div>
</div>
