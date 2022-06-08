<div class="card">
    <div class="container">

        {{-- <a href="{{ asset('menu') }}" class="btn btn-dark mb-3 mr-2">
            <i class="fa fa-home"></i>
            MENÚ
        </a> --}}

        <div class="card">
            <div class="card-header text-center">
                <br>
                SIHEVI CONSULT
            </div>
            <div class="card-body" v-if=" permisos.find( e => e === 36 ) || permisos.find( e => e === 37 ) ">


                <div class="form-group">
                    <label><i class="text-danger">*</i> Tipo de documento</label>
                    <select v-model="tipo_documento" class="form-control">
                        <option value="CC">CC - CEDULA DE CIUDADANÍA</option>
                        <option value="CE">CE - CEDULA DE EXTRANJERÍA</option>
                        <option value="PA">PA - PASAPORTE</option>
                        <option value="NUIP">NUIP - NÚMERO ÚNICO DE IDENTIFICACIÓN PERSONAL</option>
                        <option value="PE">PE - PERMISO ESPECIAL DE PERMANENCIA</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Identificación</label>
                    <input @keydown.tab.prevent="GestionarLectura($event.target.value)" v-model="identificacion"
                        type="text" class="form-control">
                </div>
                
                {{-- BUTTON --}}
                <section class="row">
                    {{-- <div class="col-6">
                            <button v-on:click="ConsultarDonanteEnHuav()" class="btn btn-block btn-primary"><i class="fa fa-h-square"></i> HUAV</button>
                        </div> --}}
                    <div class="card-header text-center">
                        <button wire:click="callFunction" class="btn btn-block btn-danger"><i class="fa fa-globe"></i>
                            SIHEVI</button>
                        <p>{{ $message }}</p>
                    </div>
                </section>

                {{-- <section class="row">
                    <div class="col-6">
                        <button v-on:click="ConsultarDonanteEnHuav()" class="btn btn-block btn-primary"><i class="fa fa-h-square"></i> HUAV</button>
                    </div>
                    <div class="col-6">
                        <button v-on:click="ConsultarDonanteEnSihevi()" class="btn btn-block btn-danger"><i class="fa fa-globe"></i> SIHEVI</button>
                    </div>
                </section> --}}

            </div>
        </div>


        <div class="modal fade" id="ModalCalendario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">HUAV DICE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-success" role="alert">
                            <p>El donante <strong>@{{ modal.nombre }}</strong> esta en <strong>ESTADO
                                    ACEPTADO</strong>, su última donación fue de <strong>@{{ modal.ultima_donacion_tipo }}</strong>
                                el día <strong>@{{ modal.ultima_donacion_fecha }}</strong>.</p>
                            <p>Tipo sanguineo: <strong>@{{ modal.sangre }}</strong></p>
                        </div>

                        <p class="text-center text-success mb-3">.::Próximas Donaciones::.</p>

                        <table class="table table-sm table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>TIPO</th>
                                    <th>DISPONIBLE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SANGRE TOTAL</td>
                                    <td>@{{ modal.sangre_total }}</td>
                                </tr>
                                <tr>
                                    <td>HEMAFERESIS</td>
                                    <td>@{{ modal.hemaferesis }}</td>
                                </tr>
                                <tr>
                                    <td>PLAQUETAS</td>
                                    <td>@{{ modal.plaquetas }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


    

</div>
</div>
