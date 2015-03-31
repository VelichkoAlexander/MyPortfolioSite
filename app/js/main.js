'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
            this.preLoad();
            this.windowHeight();

        },
        setUpListeners: function () {
            $(window).resize(this.windowHeight())
        },

        preLoad: function () {
            $(window).load(function () {
                $("#loaderInner").fadeOut();
                $("#loader").delay(400).fadeOut("slow");
            });
        },
        windowHeight: function () {
            $(".main_head").css("height", $(window).height());
        }

    };
    app.initialize();
}());
