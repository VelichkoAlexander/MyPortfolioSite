'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
            this.preLoad();
            this.windowHeight();


        },
        setUpListeners: function () {
            $(window).resize(this.windowHeight());
            $('#portfolio_show').mixItUp();
        },

        preLoad: function () {
            $(window).load(function () {
                $("#loaderInner").fadeOut();
                $("#loader").delay(400).fadeOut("slow");
            });
        },
        windowHeight: function () {
            $(".main_head").css("height", $(window).height());
        },
        parallaxEffect: function () {
            $(".main_head[data-type='background']").each(function () {
                var $bgObj = $(this);
                $(window).scroll(function () {
                    var yPos = ($(window).scrollTop() / $bgObj.data("speed")),
                        coords = "50%" + yPos + "px";
                    $bgObj.css("background-position", coords);
                });

            });
        }
    };
    app.initialize();
}());
