'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
            this.windowHeight();
            this.preLoad();
            this.parallax();


        },
        setUpListeners: function () {
            $('form').on('submit', app.submitForm);
            $(window).resize(this.windowHeight());
            $('#portfolio_show').mixItUp();
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            $(".menu a[href*='#'],.header__scroll,.up").mPageScroll2id();
            //animate

            $(".section__title").animated("fadeInUp", "fadeOutDown");
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
        parallax: function(){

            var parallaxObj= $("#home");
            $(window).on('scroll', function(){
                var parallaxSpeead= parallaxObj.attr("data-speed"),
                    yPos= -( $(window).scrollTop() / parallaxSpeead),
                    coords="50%"+yPos+"px";
                parallaxObj.css({
                    "background-position": coords
                });
            })
        },
        submitForm:function(e){
            e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "mail.php",
                    data: $(this).serialize()
                }).done(function() {
                    $(this).find("input").val("");
                    alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
                    $("#form").trigger("reset");
                });


        }

    };
    app.initialize();
}());
