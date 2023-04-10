<!-- component -->
<div style="height: 295px;;">
    <div class="container-fluid d-flex  flex-row fixed-width">
        <form>
            @csrf
            <div class="form-group row">
                <div class="mb-2">
                    <div class="input-info">
                        <input wire:model="size" type="text" placeholder="size">
                        <label class="info-label">IMC:</label> @yield('imc')
                    </div>

                    <div>
                        <input wire:model="weight" type="text" placeholder="weight">
                        <label class="info-label">VOLEMIA :</label> @yield('volemia')
                    </div>

                    <div>
                        <input wire:model="hemoglobin" type="text" placeholder="Hemoglobin">
                        <label class="info-label">HTO:</label> @yield('hematocrito')
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- <style>
        button,
        h1 {
            color: black;
        }
    </style> --}}
</div>