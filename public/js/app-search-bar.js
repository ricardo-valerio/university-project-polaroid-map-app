
$(document).ready(function () {

    $(".tihidSearchBar").on("keyup", function (e) {
        var textQ = $(this).val();
        console.log(textQ);
        // Search results dropdown
        $("#tihidOutput").fadeIn("fast");
        // Show Loading
        $(".hide").show();
        if (textQ != "") {

            $.getJSON("/polaroid-map-app/ajax/searchBar" , { q: textQ} )
                .done(function (data) {

                    responseJson = data;

                    var htmlContent = "";
                    if (responseJson.polaroids !== undefined)
                    {
                         htmlContent += '<h4 class="ajax-search-bar-title-results text-center">Polaroids</h4>';
                        for (var i = 0; i < responseJson.polaroids.length ; i++)
                        {
                            htmlContent += '<li class="li1"><a href="/polaroid-map-app/polaroid/'+ responseJson.polaroids[i].id + '/'+ responseJson.polaroids[i].title_friendly + '" class="a1"><span class="span1"><img class="img1" src="' + responseJson.polaroids[i].hash_photo_location + '"><span class="span2"><span class="span3"><span class="span4">' + responseJson.polaroids[i].title + '</span><span class="span5"><span class="span7">' + responseJson.polaroids[i].country + '</span></span></span></span></span></a></li>';

                        }
                    }

                    if (responseJson.routes !== undefined)
                    {
                         htmlContent += '<h4 class="ajax-search-bar-title-results text-center">Routes</h4>';
                        for (var j = 0; j < responseJson.routes.length; j++)
                        {
                            htmlContent += '<li class="li1"><a href="/polaroid-map-app/route/' + responseJson.routes[j].id + '/' + responseJson.routes[j].title_friendly + '" class="a1"><span class="span1"><img class="img1" src="' + responseJson.routes[j].icon + '"><span class="span2"><span class="span3"><span class="span4">' + responseJson.routes[j].title + '</span><span class="span5"><span class="span7"></span></span></span></span></span></a></li>';
                        }

                    }

                    if (responseJson.users !== undefined)
                    {
                         htmlContent += '<h4 class="ajax-search-bar-title-results text-center">Users</h4>';
                        for (var k = 0; k < responseJson.users.length; k++)
                        {
                            htmlContent += '<li class="li1"><a href="/polaroid-map-app/user/' + responseJson.users[k].id + '/' + responseJson.users[k].username + '" class="a1"><span class="span1"><img class="img1" src="' + responseJson.users[k].avatar + '"><span class="span2"><span class="span3"><span class="span4">' + responseJson.users[k].username + '</span><span class="span5"><span class="span7">' + responseJson.users[k].country + '</span></span></span></span></span></a></li>';
                        }

                    }

                    $(".liResults").html(htmlContent);
                    $("#findMoreLink").attr("href", "/polaroid-map-app/find/all/" + responseJson.search_query);
                    //        // Hide Loading
                    $(".hide").hide();

                    //        // See more results div but only if there are results
                    if (htmlContent.length == 0) {
                        // não existem resultados
                        $(".liSeeMore").show().find(".div11").html('There are no results dude!');
                    } else {
                        // existem resultados
                        $(".liSeeMore").show().find(".div11").html('Find more results for <span class="info">"' + responseJson.search_query + '"</span>');
                    }


                });


        } else {
            $("#tihidOutput").fadeOut("fast");
        }
        e.preventDefault();
    });

    // Clicking the document window fades out the output div
    $(document).click(function (e) {
        var clicked = $(e.target);
        if (!clicked.hasClass(".tihidOutput")
                // estava a tentar inventar aqui
            || !clicked.hasClass(".li1")
            || !clicked.hasClass(".a1")) {
            $("#tihidOutput").fadeOut("fast");
        }
    });

    // redefinir o tamanho do comprimento da caixa de resultados
    // a cada resize feito à window do browser
    $(window).resize(function () {
        $("#tihidOutput").width($("#tihidSearchBar").width());
    });
    $(window).trigger('resize');

});
