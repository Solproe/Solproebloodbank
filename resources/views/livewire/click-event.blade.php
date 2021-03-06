<div class="border border-info rounded" style="height:100%;width:100%;">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="container-fluid d-flex flex-col fixed-height">

        {{-- <a href="{{ asset('menu') }}" class="btn btn-dark mb-3 mr-2">
        <i class="fa fa-home"></i>
        MENÚ
        </a> --}}

        <div class="border border-info rounded mt-3" style="height:370px;width:40%;">
            <div class="card-header text-center  shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8 ">
                <h5 class="text-info">SIHEVI CONSULT</h5>
            </div>
            <div class="card-body" v-if=" permisos.find( e => e === 36 ) || permisos.find( e => e === 37 ) ">


                <div class="form-group">
                    <label><i class="text-danger">*</i>Document type</label>
                    <select wire:model="documenttype" class="form-control">
                        <option value="">Choosse documenttype </option>
                        <option value="CC">CC - CITIZENSHIP CARD</option>
                        <option value="CE">CE - FOREIGNER ID</option>
                        <option value="PA">PA - PASSPORT</option>
                        <option value="NUIP">NUIP - UNIQUE PERSONAL IDENTIFICATION NUMBER</option>
                        <option value="PE">PE - SPECIAL RESIDENCE PERMIT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Identification</label>
                    <input wire:model="identification" type="text" class="form-control" placeholder="Enter identification">

                    {{-- <input @keydown.tab.prevent="GestionarLectura($event.target.value)" v-model="identificacion"
                        type="text" class="form-control"> --}}
                </div>

                {{-- BUTTON --}}
                <section class="row">
                    {{-- <div class="col-6">
                            <button v-on:click="ConsultarDonanteEnHuav()" class="btn btn-block btn-primary"><i class="fa fa-h-square"></i> HUAV</button>
                        </div> --}}
                    <div class="col">
                        <x-modal></x-modal>
                    </div>
                    <div class="col">
                        <button wire:click="callFunction()" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-globe"></i>
                            SIHEVI
                        </button>
                    </div>
                </section>
            </div>
        </div>
        <div class="border border-info rounded ml-3 mt-3" style="height:370px;width:80%;">
            <div class="card-header text-center shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8">
                <h5 class="text-info">SHOW ANSWER</h5>
            </div>
            @if ($open == true)
            <div>
                <script>
                    swal("Oops!", "Something went wrong on the page!", "error");
                </script>
            </div>
            @endif
            @if ($historico != null)
            <p>{{$response}}</p>
            <div class="container table-responsive text-center">
                <table class="table-sm" style="height: 100%;">
                    <TR>
                        <th style="text-align:left;">Identification</th>
                        <td>:</td>
                        <td>{{$data['NUM_IDENTIFICACION']}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Full Name</th>
                        <td>:</td>
                        <div class="container d-flex justify-left">
                            <TD>{{$data['PRIMER_NOMBRE']}}</TD>
                            <td>{{$data['SEGUNDO_NOMBRE']}}</td>
                            <td>{{$data['PRIMER_APELLIDO']}}</td>
                            <td>{{$data['SEGUNDO_APELLIDO']}}</td>
                        </div>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Donation Date</th>
                        <td>:</td>
                        <td>{{$data['FECHA_DONACION']}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Donor Type</th>
                        <td>:</td>
                        <td>{{$data['TIPO_DONACION']}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Blood Bank</th>
                        <td>:</td>
                        <td style="width:40%;">{{$data['NOMBRE_BANCO']}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Status</th>
                        <td>:</td>
                        <td>{{$data['TIPO_DONANTE']}}</td>
                    </tr>
                </table>
            </div>
            @endif
        </div>
        <div class="border border-info rounded ml-3 mt-3" style="height:370px;;width:30%;">
            <div class="card-header text-center shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8">
                <h5 class="text-info">IMC/VOLEMIA</h5>
            </div>
        </div>
    </div>
    {{-- creating space for communication by whatsapp --}}
    <div class="container-fluid d-flex  flex-row fixed-width">
        <div class="border border-info rounded ml-1 mt-3 mb-3" style="height:180px;;width:100%;">
            <div class="card-header text-center fs-3 text-info shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8 ">
                <h2 class="text-info ">SENDING AND VERIFICATION AND NOTIFICATION OF TELEPHONE NUMBER</h2>
            </div>

            <div class="form-group row mt-3 col-md-5  ml-3">
                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                <div class="col-md-6">
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>