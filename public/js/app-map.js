function initialize() {

    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(38.691584, -9.215977),
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_LEFT
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


    /**
     *  é importante que esta variável (map) seja global, isto é, que esteja
     * definida sem a palvra reservada "var" para permitir mudar
     * a posição do mapa programaticamente com uma simples chamada
     * a um dos métodos da API:
     *
     * map.setCenter(new google.maps.LatLng(-25.363882,131.044922));
     *
     * ou ainda:
     *
     * map.panTo(new google.maps.LatLng(-25.363882,131.044922));
     *
     * sendo que a ultima das duas faz a meu ver uma pequena animação
     * no momento da transição para o ponto
     *
     * foi ainda alterada para ter o prefixo "window"
     * http://stackoverflow.com/questions/4862193/javascript-global-variables
     *
     * @type {google.maps.Map}
     */
    window.map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    setMarkers(map, places);
}

// substituir este objecto por uma chamada JSON ao Apicontroller
var places = [
    ['Torre de Belém',
        38.691584,
        -9.215977,
        "torre-belem.jpg",
        "blue.png",
        4,
        "Texto da torre de belém"]
    ,
    ['Mosteiro dos Jerónimos',
        38.697891,
        -9.206704,
        "mosteiro-dos-jeronimos.jpg",
        "pink.png",
        5,
        "texto do mosteiro dos jerónimos"]
    ,
    ['Ponte 25 de Abril',
        38.689633,
        -9.17711,
        "ponte-25-abril.jpg",
        "white.png",
        3,
        "texto da ponte 25 de abril"]
    ,
    ['Palácio da Pena',
        38.7862887,
        -9.3920681,
        "palacio-da-pena.jpg",
        "yellow.png",
        2,
        "texto do palácio da pena"]
];

console.log(places);

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
            '<img src="/polaroid-map-app/public/img/places/' + place[3] + '" alt="' + place[0]
            + '" height="100" width="100"/>' +
            '<div id="bodyContent">' + place[6] + '</div>' +
            '</div>';

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: {
                url: "/polaroid-map-app/public/img/markers/" + place[4],
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

