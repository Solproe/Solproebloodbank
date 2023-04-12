<!-- component -->
<div >
    <h1 class="text-gray-200 text-center font-extrabold -mt-3 text-3xl">Parametros</h1>
    <div class="container py-5 max-w-md mx-auto">
        <form>
            @csrf
            <div class="mb-4">
                <input placeholder="Bajo Peso" name="bajoPeso" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
            </div>
            <div class="mb-4">
                <input placeholder="Normal Bajo" name="normalBajo" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
            </div>
            <div class="mb-6">
                <input placeholder="Normal Alto" name="normalAlto" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
            </div>
            <div class="mb-6">
                <input placeholder="Sobrepeso" name="sobrepeso" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text">
            </div>
            <button type="submit" style="color: white;" class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" aria-label="Default select example">Ingresar</button>
        </form>
    </div>
</div>