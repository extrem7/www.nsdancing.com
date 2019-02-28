const MobileMenu = {
    toggleMenuMobile() {
        $('.mobile-btn').toggleClass('open');
        $('.menu-container, body').toggleClass('open-menu');
    },
    controller() {
        $("#mobile-menu").click(() => {
            this.toggleMenuMobile();
        });
    }
};

function mail() {
    $('.wpcf7-form input[type=submit]').click(function (e) {
        if (!$(this).closest('form')[0].reportValidity()) e.preventDefault();
    });
    $(".wpcf7").on('wpcf7:mailsent', function (event) {
        $('#thanks').modal('show');
        setTimeout(() => {
            $('#thanks').modal('hide');
        },6000);
    });
}

$(() => {

    let navText = [
        "<img src='/wp-content/themes/nsdancing/assets/img/icons/arrow_l.svg'>",
        "<img src='/wp-content/themes/nsdancing/assets/img/icons/arrow_r.svg'>"];
    $('.owl-testimonials').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        navText: navText,
        items: 1,
        dots: false,
    });

    $('.owl-video').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: navText,
        items: 3,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            636: {
                items: 2
            },
            768: {
                items: 2
            }
        }
    });

    /*$("#show-form").click(() => {
        $('.banner').find('.decorative-border').slideToggle();
    });*/

    $(window).on('load resize scroll', () => {
        if ($(this).scrollTop() > 100 && window.innerWidth > 992) {
            $(".header").addClass('sticky-header');
        } else {
            $(".header").removeClass('sticky-header');
        }
    });

    $(".book-btn").click(function () {
        let offset = $(".book-form").offset().top;
        $('html, body').animate({
            scrollTop: offset
        }, Math.abs(offset - $(document).scrollTop()));
    });
    MobileMenu.controller();
    mail();
    $('input[type=tel]').inputmask("mask", {"mask": "(999) 999 9999", "clearIncomplete": true});
});

$(window).on('load', () => {
    if (location.hash) {
        let offset = $(location.hash).offset().top - 85;
        history.pushState("", document.title, window.location.pathname + window.location.search);
        $('html, body').animate({
            scrollTop: offset
        }, 1500);
    }
    setTimeout(() => {
        const attrs = ['src', 'srcset', 'style'];
        attrs.forEach((attr) => {
            $(`*[data-${attr}]`).each(function () {
                $(this).attr(attr, $(this).attr(`data-${attr}`));
                $(this).on('load', function () {
                    $(this).removeAttr(`data-${attr}`);
                });
            })
        });
    }, 1500);
});

WebFontConfig = {
    google: {families: ['Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic']}
};
(function () {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
})();