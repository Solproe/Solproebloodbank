const { defaultsDeep } = require("lodash");

function getDate(e)
{

  var date = moment(e.value);
  console.log(e.value);
  console.log(date.format("DD/MM/YYYY"));
}
