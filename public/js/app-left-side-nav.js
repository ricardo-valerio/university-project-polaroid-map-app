$(document).ready(function () {

    /**
     * Last Places - move o mapa
     */
    $('.ajax-change-last-place').on('click', function (event) {
        event.preventDefault();

            window.map.panTo(new google.maps.LatLng($(this).attr("data-lat"),
                $(this).attr("data-lon")
            ));
            window.map.setZoom(14);

    });

    /*********************************************************/



    (function () {
        setInterval(function () {

            (function pullServerForLastPlaces() {

                console.log('PLACES - pullServerForLastPlaces');


                //polaroid-map-app/api?country=USA

                $.getJSON("http://localhost:8080/polaroid-map-app/api/places" /*, { country: "USA"} */)
                    .done(function (data) {

                        $.each(data, function (i, item) {

                            $(".ajax-change-last-place").eq(i).attr({
                                "data-lat": data[i].lat,
                                "data-lon": data[i].lon
                            });

                            $(".ajax-change-last-place > a").eq(i).text(data[i].place);

                        });
                    });

                // .fail(function( jqxhr, textStatus, error ) {
                //   var err = textStatus + ", " + error;
                //   console.log( "Request Failed: " + err );
                // });
                setTimeout(pullServerForLastPlaces, 60000);
            }());


            (function pullServerForLastRoutes() {

                console.log('ROUTES - pullServerForLastRoutes');

                $.getJSON("http://localhost:8080/polaroid-map-app/api/routes")
                    .done(function (data) {

                        $.each(data, function (i, item) {

                            $(".ajax-change-last-route > a").eq(i)
                                .attr('href', "/polaroid-map-app/route/show/" + data[i].id)
                                .text(data[i].route);

                        });
                    });

                // .fail(function( jqxhr, textStatus, error ) {
                //   var err = textStatus + ", " + error;
                //   console.log( "Request Failed: " + err );
                // });
                setTimeout(pullServerForLastRoutes, 60000);
            }());


            (function pullServerForLastRoutes() {

                console.log('LIKES - pullServerForLastLikes');

                $.getJSON("http://localhost:8080/polaroid-map-app/api/likes")
                    .done(function (data) {

                        $.each(data, function (i, item) {

                            $(".ajax-change-last-like > a").eq(i)
                                .attr('href', "/polaroid-map-app/polaroid/show/" + data[i].id)
                                .html(data[i].polaroid
                                     + '<span data-tooltip="" aria-haspopup="true"'
                                     +' title="' + data[i].number_of_likes
                                     + ' likes" class="right secondary round label has-tip">'
                                     + data[i].number_of_likes + '</span>');

                        });
                    });

                // .fail(function( jqxhr, textStatus, error ) {
                //   var err = textStatus + ", " + error;
                //   console.log( "Request Failed: " + err );
                // });
                setTimeout(pullServerForLastRoutes, 60000);
            }());


        }, 10000);
    })();

}); // fim do ready
