"use strict";

let burger_toggle = document.querySelector('.burger_toggle');
let menu_burger = document.querySelector('.menu_burger');
let j_close_menu_mobile = document.querySelector('.j-close-menu-mobile');
let menu_burger_drop = document.querySelector('.menu_burger__drop');
let menu_burger_main_list = document.querySelector('.menu_burger__main_list');
let menu_burger_backdrop = document.querySelector('.menu_burger__backdrop');


burger_toggle.addEventListener('click', function () {
    menu_burger.classList.add('menu_burger__active');
});

j_close_menu_mobile.addEventListener('click', function () {
    menu_burger.classList.remove('menu_burger__active');
});

menu_burger_backdrop.addEventListener('click', function () {
    menu_burger.classList.remove('menu_burger__active');
});

$(document).ready((function () {
    $(".js-tender-fence").on("click", (function () {
        var e = $(this).closest(".js-form");
        return $.ajax({
            url: "/ajax/ajax_tender.php",
            type: "post",
            cache: !1,
            data: e.serialize()
        })
         .done((function (n) {
            "ERROR" == n || ("error" == n ? e.find(".error-text").text("Вы не правильно заполнили поля!") : (console.log("lglggllg"),
            e[0].reset(),
            $(".error").removeClass("error"),
            alert("Спасибо за обращение, наш специалист свяжется с Вами.")))
        }))
        .fail((function () {
            alert("Ошибка, пожалуйста повторите")
        })), !1
    }))
}));

$(document).ready((function () {
    $(".js-order-fence").on("click", (function () {
        var e = $(this).closest(".js-form");
        return $.ajax({
            url: "/ajax/ajax_order.php",
            type: "post",
            cache: !1,
            data: e.serialize()
        })
            .done((function (n) {
                "ERROR" == n || ("error" == n ? e.find(".error-text").text("Вы не правильно заполнили поля!") : (console.log("lglggllg"),
                    e[0].reset(),
                    $(".error").removeClass("error"),
                    alert("Спасибо за обращение, наш специалист свяжется с Вами.")))
            }))
            .fail((function () {
                alert("Ошибка, пожалуйста повторите")
            })), !1
    }))
}));

$(document).ready(function(){
    $('.slick-showcase').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});



