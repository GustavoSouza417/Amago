var geocoder;
var map;

function initialize(){
	geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    
    var mapOptions = {
      zoom: 8,
      center: latlng
    }

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

function confirmarLocalizacao(){
	var address = ""

	var endC = {
		estado: "São Paulo",
		cidade: document.querySelector("#cidade").value,
		rua: document.querySelector("#rua").value,
		bairro: document.querySelector("#bairro").value,
		numero: document.querySelector("#numero").value
	}

	if(endC.rua    == "" || endC.rua    == undefined || endC.rua    == null ||
	   endC.numero == "" || endC.numero == undefined || endC.numero == null ||
	   endC.bairro == "" || endC.bairro == undefined || endC.bairro == null ||
	   endC.cidade == "" || endC.cidade == undefined || endC.cidade == null ||
	   endC.estado == "" || endC.estado == undefined || endC.estado == null
	){
		console.log("Todos os campos devem ser preenchidos")
		return
	}

	address = endC.rua + ", " + endC.numero + ", " + endC.bairro + ", " + endC.cidade + ", " + endC.estado
	addressE = endC.rua + " - " + endC.numero + " - " + endC.bairro + " - " + endC.cidade

	document.querySelector("#address").value = address
	document.querySelector("#addressE").value = addressE
	document.querySelector("#boleano").value = "true"

	geocoder.geocode({"address": address}, function(results, status){
		if(status == 'OK') {
      document.querySelector("#latitude").value = results[0].geometry.location.lat()
      document.querySelector("#longitude").value = results[0].geometry.location.lng()
    } 
    else{
      console.log("Ocorreu um erro durante o processo de geocodificação do endereço.")
 		}
	})
}