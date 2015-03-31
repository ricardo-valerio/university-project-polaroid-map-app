function initialize() {

    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(38.691584, -9.215977),
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.LEFT_BOTTOM
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

    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    setMarkers(map, places);
}


var places = [
    ['Torre de Belém',
        38.691584,
        -9.215977,
        "../img/places/torre-belem.jpg",
        "../img/markers/blue.png",
        4,
        "Texto da torre de belém"]
    ,
    ['Mosteiro dos Jerónimos',
        38.697891,
        -9.206704,
        "../img/places/mosteiro-dos-jeronimos.jpg",
        "../img/markers/pink.png",
        5,
        "texto do mosteiro dos jerónimos"]
    ,
    ['Ponte 25 de Abril',
        38.689633,
        -9.17711,
        "../img/places/ponte-25-abril.jpg",
        "../img/markers/white.png",
        3,
        "texto da ponte 25 de abril"]
    ,
    ['Palácio da Pena',
        38.7862887,
        -9.3920681,
        "../img/places/palacio-da-pena.jpg",
        "../img/markers/yellow.png",
        2,
        "texto do palácio da pena"]
];

function setMarkers(map, locations) {
    var shape = {
        coords: [1, 1, 1, 20, 18, 20, 18, 1],
        type: 'poly'
    };
    for (var i = 0; i < locations.length; i++) {
        var place = locations[i];
        var myLatLng = new google.maps.LatLng(place[1], place[2]);


        var contentString =
            '<div id="content">' +
            '<div id="siteNotice">' + '</div>' +
            '<h1 id="firstHeading" class="firstHeading">' + place[0] + '</h1>' +
            '<img src="' + place[3] + '" alt="' + place[0]
            + '" height="100" width="100"/>' +
            '<div id="bodyContent">' + place[6] + '</div>' +
            '</div>';

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: {
                url: place[4],
                size: new google.maps.Size(30, 30),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 30)
            },
            shape: shape,
            title: place[0],
            zIndex: place[5],
            html: contentString
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300
        });

        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(this.html);
            infowindow.open(map, this);
        });

    }

}

google.maps.event.addDomListener(window, 'load', initialize);

