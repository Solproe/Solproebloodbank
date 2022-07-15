<div class="card">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <div class="container-fluid d-flex flex-row fixed-width">

        @if($event == true)
            @livewire('response-sihevi', ['identification' => $identification, 'documenttype' => $documenttype])
        @endif

        {{-- <a href="{{ asset('menu') }}" class="btn btn-dark mb-3 mr-2">
        <i class="fa fa-home"></i>
        MENÚ
        </a> --}}

        <div class="card col-sm-3 mt-5 ml-4">
            <div class="card-header text-center">
                <br>
                SIHEVI CONSULT
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
                    <h1>{{ $documenttype }}</h1>
                </div>


                <div class="form-group">
                    <label>Identification</label>
                    <input wire:model="identification" type="text" class="form-control"
                        placeholder="Enter identification">
                    <h1>{{ $identification }}</h1>

                    {{-- <input @keydown.tab.prevent="GestionarLectura($event.target.value)" v-model="identificacion"
                        type="text" class="form-control"> --}}
                </div>

                {{-- BUTTON --}}
                <section class="row">
                    {{-- <div class="col-6">
                            <button v-on:click="ConsultarDonanteEnHuav()" class="btn btn-block btn-primary"><i class="fa fa-h-square"></i> HUAV</button>
                        </div> --}}
                    <div class="card-header text-center">
                        <button wire:click="callFunction()" class="btn btn-block btn-danger align-left"
                            data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-globe"></i>
                            SIHEVI</button>
                        {{-- <p>{{ $message }}</p> --}}
                    </div>
                </section>
            </div>
        </div>
        <div class="card col-md-5 mt-5 ml-3">
            <div class="card-header text-center">
                <br>
                SHOW ANSWER
            </div>
        </div>
        <div class="card col-sm-3 mt-5 ml-3">
            <h1>data 2</h1>
        </div>
    </div>
    {{-- creating space for communication by whatsapp --}}
    <div class="ml-3 mr-3 mb-3 border border-primary rounded" >
        <div class="card ">
            <div class="card-header text-center fs-3 text-danger ">
                <br>
                <p class="text-center">SENDING AND VERIFICATION AND NOTIFICATION OF TELEPHONE NUMBER</p>
            </div>

            <div class="form-group row mt-3 col-md-5  ml-3">
                <label for="phone_number"
                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                <div class="col-md-6">
                    <input id="phone_number" type="text"
                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                        value="{{ old('phone_number') }}" required autocomplete="phone_number">
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
</div>
