<<<<<<< HEAD
function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 49.267, lng: -123.2},
          mapTypeId: 'roadmap'
        });

        var flightPlanCoordinates = [
            {lat: 49.27323, lng: -123.23983},
            {lat: 49.26902, lng: -123.21162},
            {lat: 49.26875, lng: -123.19778},
            {lat: 49.26857, lng: -123.18539},
            {lat: 49.26834, lng: -123.16793},
            {lat: 49.2682, lng: -123.15737},
            {lat: 49.26794, lng: -123.14525},
            {lat: 49.2673, lng: -123.14029},  
            {lat: 49.26614, lng: -123.13451},
            {lat: 49.26645, lng: -123.11506}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
=======
/* 
function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
*/
        
$(document).ready(function(){
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru,
        console.log('map');
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
    map();
}
>>>>>>> e4ad6c9f0566381f6cf45191ff188c6ce420aea0
