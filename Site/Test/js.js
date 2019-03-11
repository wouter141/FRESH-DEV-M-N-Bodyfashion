var car20 = $("#car20").attr('data-latlng').split(",");
var car21 = $("#car21").attr('data-latlng').split(",");
var car22 = $("#car22").attr('data-latlng').split(",");
//var car23 = $("#car23").attr('data-latlng').split(",");
var car24 = $("#car24").attr('data-latlng').split(",");
var car25 = $("#car25").attr('data-latlng').split(",");
var car26 = $("#car26").attr('data-latlng').split(",");
var car27 = $("#car27").attr('data-latlng').split(",");
var car28 = $("#car28").attr('data-latlng').split(",");
var car29 = $("#car29").attr('data-latlng').split(",");
var car30 = $("#car30").attr('data-latlng').split(",");

var locations = [
      ['car20', Number(car20[0]),Number(car20[1]), 1],
			['car21', Number(car21[0]),Number(car21[1]), 1],
			['car22', Number(car22[0]),Number(car22[1]), 1],
			['car24', Number(car24[0]),Number(car24[1]), 1],
			['car25', Number(car25[0]),Number(car25[1]), 1],
			['car26', Number(car26[0]),Number(car26[1]), 1],
			['car27', Number(car27[0]),Number(car27[1]), 1],
			['car28', Number(car28[0]),Number(car28[1]), 1],
			['car29', Number(car29[0]),Number(car29[1]), 1],
			['car30', Number(car30[0]),Number(car30[1]), 1]
    ];

//locations.push(car20);

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(34.0639683, -118.3121431),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();


    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));

			google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
				infowindow.open(map, marker[i]);
				//infoWindow.open(map,marker);
			});

			console.log(locations);
			//console.log(locations[i][2]);



    }
