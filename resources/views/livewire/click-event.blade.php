<div class="border border-info rounded col-span-12">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- Check donors in Sihevi and local blood bank database --}}
    <div class="container-fluid row">
        {{-- The data of the donor to be consulted is received --}}
        <div class=" container-fluid border border-info rounded mt-3 col-md-3 mb-3">
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
                    <input wire:model="identification" type="text" name="identification" class="form-control"
                        placeholder="Enter identification">
                </div>

                <section class="row">
                    <div class="col">
                        {{-- Call the function that communicates to the Sihevi API --}}
                        <center>
                            <button wire:click="callFunction()" type="submit" class="btn btn-outline-danger"><i
                                    class="fa fa-globe"></i>
                                Consult
                            </button>
                        </center>
                    </div>
                </section>
            </div>
        </div>
        {{-- Shows the data that the Sihevi API returns after the query --}}
        <div class=" container-fluid border border-info rounded mt-3 col-md-4 mb-3 ml-1">
            <div class="card-header text-center shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8">
                <h5 class="text-info">SIHEVI ANSWER</h5>
            </div>

            @if ($historico != null)
                <div class="container table-responsive text-center">
                    <table class="table-sm" style="height: 100%;">
                        <tr>
                            <th style="text-align:left;">Identification</th>
                            <td>:</td>
                            <td class="text-left">{{ $data['NUM_IDENTIFICACION'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Full Name</th>
                            <td>:</td>
                            <th colspan="2" class="text-left">
                                {{ $data['PRIMER_NOMBRE'] }}
                                {{ $data['SEGUNDO_NOMBRE'] }}
                                {{ $data['PRIMER_APELLIDO'] }}
                                {{ $data['SEGUNDO_APELLIDO'] }}
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Donor Type</th>
                            <td>:</td>
                            <td class="text-left">{{ $data['TIPO_DONACION'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Blood Bank</th>
                            <td>:</td>
                            <th colspan="2" class="text-left p-1">{{ $data['NOMBRE_BANCO'] }}</th>
                        </tr>

                        <tr>
                            <th style="text-align:left;">Status</th>
                            <td>:</td>
                            @if ($data['TIPO_DONANTE'] == 'Aceptado' and $diferido['TIPO_DIFERIMIENTO'] == null)
                                <td class="text-left table-success text-uppercase font-weight-bold p-1 mb-1 bg-success text-white"
                                    style="border:4px solid green; border-radius: 12px; padding: 5px;">
                                    {{ $data['TIPO_DONANTE'] }}
                                </td>
                            @elseif ($diferido['NUM_IDENTIFICACION'] != null)
                                <td class="text-left table-danger text-uppercase font-weight-bold p-1 mb-1 bg-danger text-white"
                                    style="border:4px solid red; border-radius: 12px; padding: 5px;">
                                    {{ $diferido['TIPO_DIFERIMIENTO'] }}
                                </td>
                                <td
                                    class="text-left table-danger text-uppercase font-weight-bold p-1 mb-1 bg-yellow text-white">
                                    {{ $data['CAUSA_DIFERIMIENTO'] }}
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <th style="text-align:left;">Donation date</th>
                            <td>:</td>

                            <th colspan="2" translate="no" class="text-left p-1">{{ $sihevidate }}</th>
                        </tr>
                    </table>
                </div>
            @elseif (isset($status[0]) and $status[0] == 'no data')
                <div class="alert alert-warning" role="alert">
                    <label>No Data</label>
                </div>
            @endif
        </div>
        {{-- We consult the data in the local blood bank database --}}
        <div class="container-fluid border border-info rounded  mt-3 col-md-4 mb-3 ml-1">
            <div class="card-header text-center  shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8 ">
                <h5 class="text-info">LOCAL BLOOD BANK</h5>
            </div>
            @if ($localDataDonor != null)
                <div class="container table-responsive text-center">
                    <table class="table-sm" style="height: 100%;">
                        <tr>
                            <th style="text-align:left;">Identification</th>
                            <td>:</td>
                            <td class="text-left">{{ $localDataDonor['COD_CIVILID'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Full Name</th>
                            <td>:</td>
                            <th colspan="2" class="text-left">
                                @if ($localDataDonor['DES_NAME1'] != null)
                                    {{ $localDataDonor['DES_NAME1'] }}
                                    {{ $localDataDonor['DES_NAME2'] }}
                                    {{ $localDataDonor['DES_SURNAME1'] }}
                                    {{ $localDataDonor['DES_SURNAME2'] }}
                                @elseif ($localDataDonor['DES_NAME'] != null)
                                    {{ $localDataDonor['DES_NAME'] }}
                                    {{ $localDataDonor['DES_SURNAME'] }}
                                @endif
                            </th>
                        </tr>
                        <tr translate="no">
                            <th style="text-align:left;">Blood type</th>
                            <td>:</td>

                            @switch($localDataDonor['COD_GROUP'])
                                @case('A')
                                    <td class="text-left table-warning text-uppercase font-weight-bold p-1 mb-1 bg-warning text-white"
                                        style="border:4px solid yellow; border-radius: 12px; padding: 5px;">
                                        <center>
                                            <h3> {{ $localDataDonor['COD_GROUP'] }}
                                                <span>{{ $localDataDonor['COD_RH'] }}</span>
                                            </h3>
                                        </center>
                                    </td>
                                @break

                                @case('B')
                                    <td class="text-left table-secondary text-uppercase font-weight-bold p-1 mb-1 bg-pink text-white"
                                        style="border:4px solid pink; border-radius: 12px; padding: 5px;">
                                        <center>
                                            <h3> {{ $localDataDonor['COD_GROUP'] }}
                                                <span>{{ $localDataDonor['COD_RH'] }}</span>
                                            </h3>
                                        </center>
                                    </td>
                                @break

                                @case('AB')
                                    <td class="text-left table-dark text-uppercase font-weight-bold p-1 mb-1 bg-dark text-white"
                                        style="border:4px solid white; border-radius: 12px; padding: 5px;">
                                        <center>
                                            <h3> {{ $localDataDonor['COD_GROUP'] }}
                                                <span>{{ $localDataDonor['COD_RH'] }}</span>
                                            </h3>
                                        </center>
                                    </td>
                                @break

                                @case('O')
                                    <td class="text-left table-info text-uppercase font-weight-bold p-1 mb-1 bg-info text-white"
                                        style="border:4px solid blue; border-radius: 12px; padding: 5px;">
                                        <center>
                                            <h3> {{ $localDataDonor['COD_GROUP'] }}
                                                <span>{{ $localDataDonor['COD_RH'] }}</span>
                                            </h3>
                                        </center>
                                    </td>
                                @break

                                @default
                            @endswitch

                        </tr>

                        <tr>
                            <th style="text-align:left;">Donor Type</th>
                            <td>:</td>

                            @if (isset($donationtype['DES_DONATIONTYPE']))
                                @if ($donationtype['DES_DONATIONTYPE'] != null)
                                    <td class="text-left">{{ $donationtype['DES_DONATIONTYPE'] }}</td>
                                @endif
                            @endif
                        </tr>
                        <tr>
                            <th style="text-align:left;">Blood Bank</th>
                            <td>:</td>
                            <th colspan="2" class="text-left p-1">{{ $localBloodBank['DES_CENTRE'] }}</th>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Status</th>
                            <td>:</td>
                            @if (isset($donationtype['COD_VALIDATED']))
                                @if ($donationtype['COD_VALIDATED'] == 'A')
                                    <td class="text-left table-success text-uppercase font-weight-bold p-1 bg-success text-white"
                                        style="border:4px solid green; border-radius: 12px; padding: 5px;">
                                        <label>Aceptado</label>
                                    </td>
                                @endif
                            @elseif (isset($localDeferredDonor[0]))
                                @if ($localDeferredDonor[0] == 'T')
                                    <td
                                        class="text-left table-warning text-uppercase font-weight-bold p-1 mb-1 bg-warning text-white">
                                        {{ $status[1] }}
                                    </td>
                                @endif
                            @else
                                <td
                                    class="text-left table-danger text-uppercase font-weight-bold p-1 mb-1 bg-danger text-white">
                                    {{ $status[0] }}
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <th style="text-align:left;">Donation date</th>
                            <td>:</td>
                            <th colspan="2" class="text-left p-1">{{ $date }}</th>
                        </tr>

                    </table>
                </div>
            @endif
        </div>
    </div>
    {{-- Calculation of Volemia, BMI, Hematocrit and verification of mobile phone by whatsapp --}}
    <div class="container-fluid row">
        <div class=" container-fluid border border-info rounded mt-3 col-md-4 mb-3">
            <div class="card-header text-center  shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8 ">
                <h5 class="text-info">IMC/VOLEMIA</h5>
            </div>

            @if (isset($status[0]))
                @if ($status[0] == 'Aceptado')
                    @if (!isset($localDataDonor['COD_GENDER']) and $historico == null)
                        <x-gender></x-gender>
                        @if ($gender != null)
                            @component('components.insert-patient')
                                @if ($size != null and $weight != null)
                                    <?php
                                    $size = (float) $size / 100;
                                    $IMC = (float) $weight / (float) $size ** 2;
                                    $volemiaM = 70 * (float) $weight;
                                    $volemiaF = 65 * (float) $weight;
                                    ?>
                                    @section('imc')
                                        {{ round($IMC, 2) }}
                                    @endsection
                                    @section('volemia')
                                        @if ($gender == 'M')
                                            {{ @round($volemiaM) }}
                                        @elseif ($gender == 'F')
                                            {{ @round($volemiaF) }}
                                        @endif
                                    @endsection
                                    @section('hematocrito')
                                        {{ (float) $hemoglobin * 3 }}
                                    @endsection
                                @endif
                            @endcomponent
                            <?php $band_consult = null; ?>
                        @endif
                    @elseif ($data['TIPO_DONANTE'] == 'Aceptado' and $diferido['TIPO_DIFERIMIENTO'] == null)
                        <x-gender></x-gender>
                        @if ($gender != null)
                            @component('components.insert-patient')
                                @if ($size != null and $weight != null)
                                    <?php
                                    $size = (float) $size / 100;
                                    $IMC = (float) $weight / (float) $size ** 2;
                                    $volemiaM = 70 * (float) $weight;
                                    $volemiaF = 65 * (float) $weight;
                                    ?>
                                    @section('imc')
                                        {{ round($IMC, 2) }}
                                    @endsection
                                    @section('volemia')
                                        @if ($gender == 'M')
                                            {{ @round($volemiaM) }}
                                        @elseif ($gender == 'F')
                                            {{ @round($volemiaF) }}
                                        @endif
                                    @endsection
                                    @section('hematocrito')
                                        {{ (float) $hemoglobin * 3 }}
                                    @endsection
                                @endif
                            @endcomponent
                            <?php $band_consult = null; ?>
                        @endif
                    @else
                        <h3 style="text-align:center;">Next donation date</h3>
                        <div class="text-center-justify">
                            {{ $nextdonationdate }}
                        </div>

                        @if ($nextdonationdate != null and isset($sihevinextdate[1]))
                            @if (isset($localDataDonor) && $localDataDonor['COD_GENDER'] == 'F')
                                @if (strtotime($nextdonationdate) >= strtotime($today) and strtotime($sihevinextdate[1]) >= strtotime($today))
                                    <h3 style="text-align:center;">Outside the donation range</h3>
                                @else
                                    @component('components.insert-patient')
                                        @if ($size != null and $weight != null)
                                            <?php
                                            $size = (float) $size / 100;
                                            $IMC = (float) $weight / (float) $size ** 2;
                                            $volemiaM = 70 * (float) $weight;
                                            $volemiaF = 65 * (float) $weight;
                                            ?>
                                            @section('imc')
                                                {{ round($IMC, 2) }}
                                            @endsection
                                            @section('volemia')
                                                {{ @round($volemiaF) }}
                                            @endsection
                                            @section('hematocrito')
                                                {{ (float) $hemoglobin * 3 }}
                                            @endsection
                                        @endif
                                    @endcomponent
                                @endif
                            @elseif (isset($localDataDonor) && $localDataDonor['COD_GENDER'] == 'M')
                                @if (strtotime($nextdonationdate) >= strtotime($today) and strtotime($sihevinextdate[1]) >= strtotime($today))
                                    <h3 style="text-align:center;">Outside the donation range</h3>
                                @else
                                    @component('components.insert-patient')
                                        @if ($size != null and $weight != null)
                                            <?php
                                            $size = (float) $size / 100;
                                            $IMC = (float) $weight / (float) $size ** 2;
                                            $volemiaM = 70 * (float) $weight;
                                            $volemiaF = 65 * (float) $weight;
                                            ?>
                                            @section('imc')
                                                {{ round($IMC, 2) }}
                                            @endsection
                                            @section('volemia')
                                                {{ @round($volemiaM) }}
                                            @endsection
                                            @section('hematocrito')
                                                {{ (float) $hemoglobin * 3 }}
                                            @endsection
                                        @endif
                                    @endcomponent
                                @endif
                            @endif
                        @elseif (isset($sihevinextdate[1]))
                            <x-gender></x-gender>
                            @if ($gender == 'F')
                                @if (strtotime(date($sihevinextdate[1])) > strtotime($today))
                                    <h3 style="text-align:center;">Outside the donation range</h3>
                                @else
                                    @component('components.insert-patient')
                                        @if ($size != null and $weight != null)
                                            <?php
                                            $size = (float) $size / 100;
                                            $IMC = (float) $weight / (float) $size ** 2;
                                            $volemiaM = 70 * (float) $weight;
                                            $volemiaF = 65 * (float) $weight;
                                            ?>
                                            @section('imc')
                                                {{ round($IMC, 2) }}
                                            @endsection
                                            @section('volemia')
                                                {{ @round($volemiaF) }}
                                            @endsection
                                            @section('hematocrito')
                                                {{ (float) $hemoglobin * 3 }}
                                            @endsection
                                        @endif
                                    @endcomponent
                                @endif
                            @elseif ($gender == 'M')
                                @if (strtotime($sihevinextdate[0]) > strtotime($today))
                                    <h3 style="text-align:center;">Outside the donation range</h3>
                                @else
                                    @component('components.insert-patient')
                                        @if ($size != null and $weight != null)
                                            <?php
                                            $size = (float) $size / 100;
                                            $IMC = (float) $weight / (float) $size ** 2;
                                            $volemiaM = 70 * (float) $weight;
                                            $volemiaF = 65 * (float) $weight;
                                            ?>
                                            @section('imc')
                                                {{ round($IMC, 2) }}
                                            @endsection
                                            @section('volemia')
                                                {{ @round($volemiaM) }}
                                            @endsection
                                            @section('hematocrito')
                                                {{ (float) $hemoglobin * 3 }}
                                            @endsection
                                        @endif
                                    @endcomponent
                                @endif
                            @endif
                        @elseif ($nextdonationdate != null)
                            @if ($localDataDonor['COD_GENDER'] == 'F')
                                @if (strtotime($nextdonationdate) > strtotime($today))
                                    <h3 style="text-align:center;">Outside the donation range</h3>
                                @else
                                    @component('components.insert-patient')
                                        @if ($size != null and $weight != null)
                                            <?php
                                            $size = (float) $size / 100;
                                            $IMC = (float) $weight / (float) $size ** 2;
                                            $volemiaM = 70 * (float) $weight;
                                            $volemiaF = 65 * (float) $weight;
                                            ?>
                                            @section('imc')
                                                {{ round($IMC, 2) }}
                                            @endsection
                                            @section('volemia')
                                                {{ @round($volemiaF) }}
                                            @endsection
                                            @section('hematocrito')
                                                {{ (float) $hemoglobin * 3 }}
                                            @endsection
                                        @endif
                                    @endcomponent
                                @endif
                            @elseif ($localDataDonor['COD_GENDER'] == 'M')
                                @if (strtotime($nextdonationdate) > strtotime($today))
                                    <h3 style="text-align:center;">Outside the donation range</h3>
                                @else
                                    @component('components.insert-patient')
                                        @if ($size != null and $weight != null)
                                            <?php
                                            $size = (float) $size / 100;
                                            $IMC = (float) $weight / (float) $size ** 2;
                                            $volemiaM = 70 * (float) $weight;
                                            $volemiaF = 65 * (float) $weight;
                                            ?>
                                            @section('imc')
                                                {{ round($IMC, 2) }}
                                            @endsection
                                            @section('volemia')
                                                {{ @round($volemiaM) }}
                                            @endsection
                                            @section('hematocrito')
                                                {{ (float) $hemoglobin * 3 }}
                                            @endsection
                                        @endif
                                    @endcomponent
                                @endif
                            @endif
                        @else
                            <center>
                                <h2>{{ $nextdonationdate }}</h2>
                                <?php $open = 'si'; ?>
                            </center>
                        @endif
                    @endif
                    @if ($open == 'si')
                        @component('components.insert-patient')
                            @if ($size != null and $weight != null)
                                <?php
                                $size = (float) $size / 100;
                                $IMC = (float) $weight / (float) $size ** 2;
                                $volemiaM = 70 * (float) $weight;
                                $volemiaF = 65 * (float) $weight;
                                ?>
                                @section('imc')
                                    {{ round($IMC, 2) }}
                                @endsection
                                @section('volemia')
                                    @if ($gender == 'M')
                                        {{ @round($volemiaM) }}
                                    @elseif ($gender == 'F')
                                        {{ @round($volemiaF) }}
                                    @endif
                                @endsection
                                @section('hematocrito')
                                    {{ (float) $hemoglobin * 3 }}
                                @endsection
                            @endif
                        @endcomponent
                    @endif
                @elseif ($status[0] == 'Rechazado')
                    <div class="alert alert-warning" role="alert">
                        <label>Por favor remitir al banco de sangre</label>
                    </div>
                @endif
            @endif

        </div>
        <div class=" container-fluid border border-info rounded mt-3 col-md-6 mb-3">
            <div class="card-header text-center fs-3 text-info shadow-lg p-3 mb-3 mt-2 bg-white rounded border-8 ">
                <h2 class="text-info ">VERIFICATION OF TELEPHONE NUMBER</h2>
            </div>
            <div class="form-group row mt-3 col-md-8  ml-3">
                <label for="phone_number"
                    class="col-md-4 col-form-label text-md-left">{{ __('Phone Number') }}</label>
                <div class="form-group col-md-8">
                    <form method="POST" action="{{ route('whatsapp') }}">
                        @csrf
                        <div class="input-group">

                            <input name="phonenumber" type="text"
                                class="form-control  @error('phone_number') is-invalid @enderror">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-outline-success"><i
                                            class="fab fa-whatsapp"></i>
                                        Verify phone
                                    </button>
                                </span>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
