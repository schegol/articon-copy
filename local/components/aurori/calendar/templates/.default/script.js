$(function () {
    const mpCalendarMonthsSlider = new Swiper('.mp-calendar-block.swiper', {
        slidesPerView: 1,
        autoHeight: true,
        allowTouchMove: false,
        observer: true,
        observeParents: true,
    });

    const mpCalendarTopSlider = new Swiper('.mp-calendar-top-slider .swiper', {
        observer: true,
        observeParents: true,
        slidesPerView: 1,
        navigation: {
            nextEl: '.mp-calendar-top-slider .swiper-button-next',
            prevEl: '.mp-calendar-top-slider .swiper-button-prev',
        },
        thumbs: {
            swiper: mpCalendarMonthsSlider,
        },
        on: {
            transitionEnd: function(swiper) {
                let yearDisplayBlock = $('#calendarYear'),
                    currentSlide = $('.mp-calendar-block .mp-calendar.swiper-slide-active'),
                    currentYear = currentSlide.data('year');

                yearDisplayBlock.text(currentYear + ' год');
            }
        }
    });

    $('[data-calendar-item]').fancybox({
        btnTpl: {
            smallBtn:
                '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
                '</button>'
        },
        touch: false,
    });
});
