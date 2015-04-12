
$(function () {

    $(".tihidSearchBar").on("keyup", function (e) {
        var textQ = $(this).val();
        // Search results dropdown
        $("#tihidOutput").fadeIn("fast");
        // Show Loading
        $(".hide").show();
        if (textQ != "") {
            $.ajax({
                type: "POST",
                url: "/polaroid-map-app/ajax/searchBar",
                data: {q: textQ},
                cache: false,
                success: function (tihidResponse) {
                    $(".liResults").html(tihidResponse);
                    // Hide Loading
                    $(".hide").hide();
                    // See more results div

                    console.log(tihidResponse);

                    $(".liSeeMore").show().find(".info").html('"' + tihidResponse["advert"] + '"');
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

});
