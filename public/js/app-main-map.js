$(document).ready(function () {

    var mapOptions = {
        zoom: 3,
        center: new google.maps.LatLng(38.691584, -9.215977),
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.LEFT_TOP
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.LEFT_TOP
        },
        scaleControl: true,
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
        }
    };

    window.map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);


    $.getJSON("/polaroid-map-app/api/map")
        .done(function (data) {

            var places = data;
            //console.log(places);

            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: 'poly'
            };

            for (var i = 0; i < places.length; i++) {
                var place = places[i];
                var myLatLng = new google.maps.LatLng(place.geo_info.lat, place.geo_info.lon);


                var contentString = "";

                for (var j = 0; j < place.polaroids.length; j++) {

                    contentString +=
                        '<div id="content">'
                        + '<h1 id="firstHeading" class="firstHeading">'
                        + place.polaroids[j].title
                        + '</h1>'+ '<img src="/polaroid-map-app/img/polaroids/'+ place.polaroids[j].polaroid_image
                        +'" alt="'+ place.polaroids[j].title
                        +'" height="100" width="100"/>'
                        + '<div id="bodyContent">'+ place.polaroids[j].polaroid_description
                        + '</div>'
                        +'</div>';

                }


                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: window.map,
                    icon: {
                        url: "/polaroid-map-app/public/img/markers/pink.png",
                        size: new google.maps.Size(30, 30),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 30)
                    },
                    shape: shape,
                    // title: place.polaroids[0].title,
                    zIndex: 4,
                    html: contentString
                });

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 300
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.setContent(this.html);
                    infowindow.open(window.map, this);
                });

            }

        }) // fim do done
        .fail(function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });

}); // fim ready
