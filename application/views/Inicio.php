<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title txt-center">Nueva Reserva</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="overlay-wrapper" style="display: none;" id="overlay">
                            <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                <div class="text-bold text-lg pt-2"> &nbsp &nbsp Enviando...</div>
                            </div>
                        </div>


                        <form enctype="multipart/form-data" id="form">
                            <div class="form-group" id="fech">
                                <label for="fecha">Fecha: *</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" min="" required>
                            </div>
                            <div class="form-group" id="hor_ini">
                                <label for="hora_inicial">Hora Inicial: *</label>
                                <input type="time" class="form-control" id="hora_inicial" name="hora_inicial" placeholder="Horal Inicial" min="07:00" max="18:00" required>
                            </div>
                            <div class="form-group" id="hor_fin">
                                <label for="hora_final">Hora Final: *</label>
                                <input type="time" class="form-control" id="hora_final" name="hora_final" placeholder="Hora Final" min="07:00" max="18:00" required>
                            </div>
                            <div class="form-group" id="funci">
                                <label for="nombre_funcionario">Nombre Funcionario: *</label>
                                <input type="text" class="form-control" id="nombre_funcionario" name="nombre_funcionario" placeholder="Funcionario" required>
                            </div>
                            <div class="form-group" id="motiv">
                                <label for="motivo">Motivo: *</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Motivo" required>
                            </div>
                            <div class="form-group" id="equip">
                                <label for="equipos">Equipos requeridos: *</label>
                                <textarea  id="equipos" name="equipos" class="form-control" placeholder="Escriba los equipos que requiere para la actividdad tales como microfono, cable HDMI, camara, cable de Red, extensión, etc..."></textarea>
                            </div>
                            <div class="card-footer text-center">
                                <button form="form" id="guardar" type="button" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>

                    </div>


                </div>
            </div>


            <div class="col-md-7">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title txt-center">Reservas activas </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover table-responsive">
                            <thead class="primary">
                                <tr>
                                    <th>Motivo</th>
                                    <th>Hora Inicial</th>
                                    <th>Hora Final</th>
                                    <th>Funcionario</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>

        </div>



        <div class="row">
          <div class="col-md-3">
            
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>


</section>