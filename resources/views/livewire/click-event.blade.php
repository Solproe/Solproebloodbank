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
                    <select wire:model="documenttype" class="form-control">
                        <option value="">Choose documenttype </option>
                        <option value="CC">CC - CEDULA DE CIUDADANÍA</option>
                        <option value="CE">CE - CEDULA DE EXTRANJERÍA</option>
                        <option value="PA">PA - PASAPORTE</option>
                        <option value="NUIP">NUIP - NÚMERO ÚNICO DE IDENTIFICACIÓN PERSONAL</option>
                        <option value="PE">PE - PERMISO ESPECIAL DE PERMANENCIA</option>
                    </select>
                    <h1>{{$documenttype}}</h1>
                </div>


                <div class="form-group">
                    <label>Identificación</label>
                    <input wire:model="identification" type="text" class="form-control"   placeholder="Enter identification">
                    <h1>{{ $identification}}</h1>

                   {{--  <input @keydown.tab.prevent="GestionarLectura($event.target.value)" v-model="identificacion"
                        type="text" class="form-control"> --}}
                </div>

                {{-- BUTTON --}}
                <section class="row">
                    {{-- <div class="col-6">
                            <button v-on:click="ConsultarDonanteEnHuav($identification)" class="btn btn-block btn-primary"><i class="fa fa-h-square"></i> HUAV</button>
                        </div> --}}
                    <div class="card-header text-center">
                        <button wire:click="callFunction()" class="btn btn-block btn-danger"><i
                                class="fa fa-globe"></i>
                            SIHEVI</button>
                        {{-- <p>{{ $message }}</p> --}}
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
    </div>
</div>
</div>
