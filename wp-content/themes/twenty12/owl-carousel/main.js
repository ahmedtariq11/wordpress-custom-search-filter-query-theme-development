(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {


            $('.brand-active-one').owlCarousel({
                items: 5,
                margin: 120,
                smartSpeed: 1000,
                autoplay: true,
                loop: true,
                center: true,
                responsive: {
                    992: {
                        items: 5
                    },
                    768: {
                        items: 4
                    },
                    320: {
                        items: 1,
                        center: true,
                    }
                }
            });

            //Widget Reviews Slider Activated
            $('.reviews-slide-wrap').owlCarousel({
                items: 1,
                smartSpeed: 1000,
                autoplay: true
            });


            // Dropdown Menu Start
            var windoWidth = $(window).width();
            if (windoWidth < 768) {
                $('.upx-dropdown').hide();
                $('.upx-drop-parent > a').on('click', function (e) {
                    e.preventDefault();
                    $(this).closest('.upx-drop-parent').toggleClass('menu-close');
                    $(this).siblings('.upx-dropdown').slideToggle(500);
                });
            }

        $('.search-trigger').on('click', function () {
            $('.search-box').toggleClass('show-search-box');
        })

    });

    $(window).load(function () {
        if ($.fn.isotope) {

            $(".work-item-wrap").isotope({
                filter: '*',
                layoutMode: 'packery',
                itemSelector: '.sin-work-item'
            });

            $('.work-item-menu li').on('click', function () {
                $(".work-item-menu li").removeClass("active");
                $(this).addClass("active");

                var selector = $(this).attr('data-filter');
                $(".work-item-wrap").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });
                return false;
            });
        }

        if ($.fn.owlCarousel) {

            //Clients Reviws Slider Activated
            var slider = $('.client-reviews-wrap, .hero-slide-active-one');
            slider.owlCarousel({
                items: 1,
                autoplay: true,
                nav: true,
                loop: true,
                dots:false,
                navText: ['<i class="icofont icofont-thin-left"></i>', '<i class="icofont icofont-thin-right"></i>']
            });

            //Hero Area Slider Activated
            slider.owlCarousel({
                items: 1,
                smartSpeed: 1000,
                autoplay: true,
                mouseDrag: false,
                loop: true
            });

            slider.on('translate.owl.carousel', function () {
                $(this).find('.owl-item .sin-client-reviews > .client-photo').removeClass('bounceInRight animated').css('opacity', '0');
                $(this).find('.owl-item .sin-client-reviews > .client-quote').removeClass('fadeInUp animated').css('opacity', '0');
                $(this).find('.owl-item .item .slider-text h1').removeClass('slideInRight animated').css('opacity', '0');
                $(this).find('.owl-item .item .slider-text p').delay(1500).removeClass('slideInLeft animated').css('opacity', '0');
                $(this).find('.owl-item .item .slider-text a').delay(2000).removeClass('fadeInUp animated').css('opacity', '0');
            });

            slider.on('translated.owl.carousel', function () {
                $(this).find('.owl-item.active .sin-client-reviews  > .client-photo').addClass('bounceInRight animated').css('opacity', '1');
                $(this).find('.owl-item.active .sin-client-reviews  > .client-quote').addClass('fadeInUp animated').css('opacity', '1');
                $(this).find('.owl-item.active .item .slider-text h1').addClass('slideInRight animated').css('opacity', '1');
                $(this).find('.owl-item.active .item .slider-text p').delay(1500).addClass('slideInLeft animated').css('opacity', '1');
                $(this).find('.owl-item.active .item .slider-text a').delay(2000).addClass('fadeInUp animated').css('opacity', '1');
            });
        }


    });


}(jQuery));