$(function () {
    const mpCalendarMonthsSlider = new Swiper('.mp-calendar-block.swiper', {
        slidesPerView: 1,
        autoHeight: true,
        allowTouchMove: false,
    });

    const mpCalendarTopSlider = new Swiper('.mp-calendar-top-slider .swiper', {
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
});
