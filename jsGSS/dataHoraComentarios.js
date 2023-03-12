var data = new Date()

var dia = data.getDate()
var mes = data.getMonth() + 1
var ano = data.getFullYear()

var hora = data.getHours()
var minutos = data.getMinutes()

var dataPublicacao = dia + "/" + mes + "/" + ano
var horario = hora + ":" + minutos

document.querySelector("#data").value = dataPublicacao
document.querySelector("#hora").value = horario