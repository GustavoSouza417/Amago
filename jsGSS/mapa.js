function initialize(){
  var url = window.location.href
  var pegarVariaveis = url.split("=")

  var latitudeUsuario = pegarVariaveis[1].substring(0, pegarVariaveis[1].length - 10)
  var longitudeUsuario = pegarVariaveis[2]

  var mapOptions = {
    center: new google.maps.LatLng(latitudeUsuario, longitudeUsuario),
    zoom: 18,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions)

  $.getJSON('../php/mapa/pontos.json', function(pontos){
    $.each(pontos, function(index, ponto){

      const contentString = 
        "<div>" +
        "" +
        "  <div>" +
        "    <h3>" + ponto[1] + "</h3>" +
        "  </div>" +
        "" +
        "   <div>" +
        "      <a href='../html/apresentacaoPc.php?idPc=" + ponto[0] + "&latitudePc=" + ponto[6] + "&longitudePc=" + ponto[7] + "&latitudeUsuario=" + latitudeUsuario + "&longitudeUsuario=" + longitudeUsuario + "'>Saber mais</a>" +
        "   </div>" +
        "</div>"

      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(ponto[6], ponto[7]),
        title: ponto[1],
        map: map
      })

      var infowindow = new google.maps.InfoWindow({
        content: contentString
      })

      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map
        })
      })
    })
  })
}