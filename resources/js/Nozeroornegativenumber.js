function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return ((key >= 48 && key <= 57) || (key == 8))
}

function pierdeFoco(e) {
    var valor = e.value.replace(/^0*/, '');
    e.value = valor;
}

alert("HOla");