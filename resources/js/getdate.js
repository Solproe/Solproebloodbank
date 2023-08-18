function getdate(e)
{

  var date = moment(e.value);
  console.log("Fecha original:" + e.value);
  console.log("Fecha formateada es: " + date.format("d-m-Y"));
}
