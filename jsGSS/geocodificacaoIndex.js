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

function faz(){
  var address = document.querySelector("#address").value

  address = address.trim()

  if(address == ""){
    console.log("O campo deve ser preenchido")
    return
  }

  geocoder.geocode({"address": address}, function(results, status){
    if(status == 'OK'){
      var latitude = results[0].geometry.location.lat()
      var longitude = results[0].geometry.location.lng()

      window.location.assign("../html/mapa.php?latitude=" + latitude + "&longitude=" + longitude)
    }
    else{
      console.log("Digite um endereço válido")
    }
  })
}