// Initialize the map
function initMap() {
    var location = {lat: 51.505, lng: -0.09};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: location
    });
  
    // Add a marker to the map at a specific location
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
  