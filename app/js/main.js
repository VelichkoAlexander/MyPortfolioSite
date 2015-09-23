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
            $(window).resize(this.windowHeight());
            $('#portfolio_show').mixItUp();
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            $('.help-block  li').animated('fadeIn');
            $('form').on('submit', app.submitForm);
            $(".menu a[href*='#'],.header__scroll,.up").mPageScroll2id();
            $(".popup_content").magnificPopup({
                type: 'inline',
                midClick: true,
                showCloseBtn: true
            });
            $('#about').waypoint(function (direction) {
                if (direction == 'up') {

                    $('.up').css({'opacity': '0'}).fadeOut('slow');
                }
                else {
                    $('.up').css({'opacity': '1'}).fadeIn('slow');
                }
            }, {offset: '93%'});
            //animate

            $(".section__title, .header__intro-inner h2, .header__intro-inner p").animated("fadeInUp", "fadeOutDown");
            $(".header__intro-inner h2").animated("fadeInDown");
            $(".header__intro-inner p").animated("fadeInUp");




            //video on first screen
            $(".player").YTPlayer();

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
        parallax: function () {

            var parallaxObj = $("#home");
            $(window).on('scroll', function () {
                var parallaxSpeead = parallaxObj.attr("data-speed"),
                    yPos = -( $(window).scrollTop() / parallaxSpeead),
                    coords = "50%" + yPos + "px";
                parallaxObj.css({
                    "background-position": coords
                });
            })
        },
        submitForm: function (e) {

            e.preventDefault();
            console.log($('.help-block li').length);
            if (!($('.help-block  li').length)) {

                $.ajax({
                    type: "POST",
                    url: "mail.php",
                    data: $(this).serialize()
                }).done(function () {
                    $(this).find("input").val("");
                    alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
                    $("#form").trigger("reset");
                });
            }


        }

    };
    app.initialize();


}());
