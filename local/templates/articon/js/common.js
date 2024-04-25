// $('body').hide()


$("body").on('click', '[href*="#section-feedback"]', function (e) {
	var fixed_offset = 0;
	$('html,body').stop().animate({ scrollTop: $(this.hash).offset().top - fixed_offset }, 0);
	e.preventDefault();
});

$("body").on("click", ".mobile-panel-btn", function (e) {
	e.preventDefault();
});
$("body").on("click", function (e) {
	var mobilePanel = $(".mobile-panel-block");
	var mobilePanelLink = $(".mobile-panel-btn");
	if (mobilePanelLink.is(e.target)) {
		if ($(".mobile-panel-btn").is(".active")) {
			mobilePanelLink.removeClass("active")
			mobilePanel.removeClass("active")
			$('.shadow-bg').removeClass("active")
		}
		else {
			mobilePanelLink.addClass("active")
			mobilePanel.addClass("active")
			$('.shadow-bg').addClass("active")
		}
	} else {
		if (!mobilePanel.is(e.target) && mobilePanel.has(e.target).length === 0) {
			if ($(".mobile-panel-btn").is(".active")) {
				$(".mobile-panel-btn").removeClass("active")
				mobilePanel.removeClass("active")
				$('.shadow-bg').removeClass("active")
			} else {
			}
		}
	}
});
$("body").on("click", ".mobile-panel-close-btn", function (e) {
	e.preventDefault();
	$(".mobile-panel-btn").removeClass("active")
	$(".mobile-panel-block").removeClass("active")
	$('.shadow-bg').removeClass("active")
});



const mpOneSlider = new Swiper('.mp-one-slider .swiper', {
	// direction: 'horizontal',
	slidesPerView: 1,
	// loop: true,

	pagination: {
		el: '.mp-one-slider .swiper-pagination',
		clickable: true,
	},

	navigation: {
		nextEl: '.mp-one-slider .swiper-button-next',
		prevEl: '.mp-one-slider .swiper-button-prev',
	},

	breakpoints: {
		320: {
		},
		480: {
		},
		640: {
		}
	}
});



// const mpCalendarTopSlider = new Swiper('.mp-calendar-top-slider .swiper', {
// 	// direction: 'horizontal',
// 	slidesPerView: 1,
// 	// loop: true,
//
//
// 	navigation: {
// 		nextEl: '.mp-calendar-top-slider .swiper-button-next',
// 		prevEl: '.mp-calendar-top-slider .swiper-button-prev',
// 	},
//
// 	breakpoints: {
// 		320: {
// 			slidesPerView: 1,
// 		},
// 		480: {
// 			slidesPerView: 1,
// 		},
// 		640: {
// 			slidesPerView: 1,
// 		}
// 	}
// });

$('.modal-btn').fancybox({
	btnTpl: {
		smallBtn:
			'<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
			"</button>"
	},
	touch: false,
	afterShow: function(instance, content) {
		let trigger = $(instance.$trigger[0]),
			swiper = null,
			index, contentHtml;

		if (trigger.data('index') !== undefined) {
			index = trigger.data('index');
			contentHtml = $(content.$content[0]);
			swiper = contentHtml.find('.swiper')[0].swiper;

			if (swiper !== null)
				swiper.slideTo(index);
		}
	},
});

$('.modal-gallery-btn').fancybox({
	btnTpl: {
		smallBtn:
			'<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
			"</button>"
	},
	touch: false,
});

document.querySelectorAll('.modal-photo-thumb-slider .swiper').forEach(function (elem) {
	new Swiper(elem, {
		slidesPerView: 1,
		pagination: {
			el: elem.nextElementSibling,
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 4,
			},
			768: {
				slidesPerView: 4,
			},
			992: {
				slidesPerView: 4,
			},
			1200: {
				slidesPerView: 5,
			}
		}
	});
});

document.querySelectorAll('.modal-photo-slider .swiper').forEach(function (elem) {
	new Swiper(elem, {
		autoHeight: true,
		slidesPerView: 1,
		navigation: {
			nextEl: elem.nextElementSibling.nextElementSibling,
			prevEl: elem.nextElementSibling,
		},
		thumbs: {
			swiper: {
				el: elem.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild,
				pagination: {
					el: elem.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling,
					clickable: true,
				},
				breakpoints: {
					320: {
						slidesPerView: 4,
					},
					768: {
						slidesPerView: 4,
					},
					992: {
						slidesPerView: 4,
					},
					1200: {
						slidesPerView: 5,
					}
				}
			}
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
		},
		on: {
			beforeSlideChangeStart: function(swiper) {
				let YTVideo = $(swiper.$el).find('.swiper-slide-active .modal-photo-slide-video iframe');

				if (YTVideo.length) {
					let videoURL = YTVideo.prop('src')

					videoURL = videoURL.replace('&autoplay=1', '');
					YTVideo.prop('src','');
					YTVideo.prop('src', videoURL);
				}
			}
		}
	});
});



// const modalPhotoThumbSliderCourse = new Swiper('.modal-photo-thumb-slider--course .swiper', {
// 	// direction: 'horizontal',
// 	// loop: true,
// 	slidesPerView: 1,
// 	pagination: {
// 		el: '.modal-photo-thumb-slider--course .swiper-pagination',
// 		clickable: true,
// 	},

// 	breakpoints: {
// 		320: {
// 			slidesPerView: 1,
// 		},
// 		768: {
// 			slidesPerView: 2,
// 		},
// 		992: {
// 			slidesPerView: 3,
// 		},
// 		1200: {
// 			slidesPerView: 5,
// 		}
// 	}
// });

// const modalPhotoSliderCourse = new Swiper('.modal-photo-slider--course .swiper', {
// 	// direction: 'horizontal',
// 	// loop: true,
// 	slidesPerView: 1,


// 	navigation: {
// 		nextEl: '.modal-photo-slider--course .swiper-button-next',
// 		prevEl: '.modal-photo-slider--course .swiper-button-prev',
// 	},
// 	thumbs: {
// 		swiper: modalPhotoThumbSliderCourse,
// 	},

// 	breakpoints: {
// 		320: {
// 			slidesPerView: 1,
// 		},
// 	}
// });


$(".courses-tab").on('click', function () {
	if ($(this).hasClass('active'))
		return;

	$(this).parents(".courses-tabs").find(".courses-tab").removeClass("active").eq($(this).parent().index()).addClass("active");
	// $(this).parents(".courses-tabs-block").next().find(".courses-tab-content").hide().eq($(this).parent().index()).fadeIn()
});



document.querySelectorAll('.lecturer-course-slider .swiper').forEach(function (elem) {
	new Swiper(elem, {
		// direction: 'horizontal',
		// loop: true,
		slidesPerView: 1,

		pagination: {
			el: elem.nextElementSibling.nextElementSibling.nextElementSibling,
			clickable: true,
		},

		navigation: {
			nextEl: elem.nextElementSibling.nextElementSibling,
			prevEl: elem.nextElementSibling,
		},

		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			576: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 2,
			},
			1200: {
				// slidesPerView: 3,
				slidesPerView: 'auto',
			}
		}
	});
});


const rentSingleTopSlider = new Swiper('.rent-single-top-slider .swiper', {
	// direction: 'horizontal',
	slidesPerView: 1,
	// loop: true,

	pagination: {
		el: '.rent-single-top-slider .swiper-pagination',
		clickable: true,
	},

	navigation: {
		nextEl: '.rent-single-top-slider .swiper-button-next',
		prevEl: '.rent-single-top-slider .swiper-button-prev',
	},

	breakpoints: {
		320: {
		},
		480: {
		},
		640: {
		}
	}
});




document.querySelectorAll('.news-single-img-thumb-slider .swiper').forEach(function (elem) {
	new Swiper(elem, {
		// direction: 'horizontal',
		// loop: true,
		slidesPerView: 1,
		breakpoints: {
			320: {
				slidesPerView: 4,
			},
			768: {
				slidesPerView: 4,
			},
			992: {
				slidesPerView: 4,
			},
			1200: {
				slidesPerView: 6,
			}
		}
	});
});



document.querySelectorAll('.news-single-img-slider .swiper').forEach(function (elem) {

	new Swiper(elem, {
		// direction: 'horizontal',
		// loop: true,
		slidesPerView: 1,

		pagination: {
			el: elem.nextElementSibling,
			clickable: true,
		},
		navigation: {
			nextEl: elem.nextElementSibling.nextElementSibling.nextElementSibling,
			prevEl: elem.nextElementSibling.nextElementSibling,
		},
		thumbs: {
			swiper: {

				el: elem.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild,
				pagination: {
					el: elem.parentElement.parentElement.nextElementSibling.firstElementChild.firstElementChild.nextElementSibling,
					clickable: true,
				},
				breakpoints: {
					320: {
						slidesPerView: 4,
					},
					768: {
						slidesPerView: 4,
					},
					992: {
						slidesPerView: 4,
					},
					1200: {
						slidesPerView: 6,
					}
				}
			}
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
		}
	});
});






// ymaps.ready(init);
//
// function init() {
// 	if (document.getElementById('map-moscow') != null) {
//
// 		var myMap = new ymaps.Map("map-moscow", {
// 			center: [55.673321, 37.632583],
// 			zoom: 16,
// 			controls: []
// 		});
//
// 		var myGeoObjects = [];
//
// 		myGeoObjects = new ymaps.Placemark([55.673321, 37.632583], {
// 		}, {
// 			iconLayout: 'default#image',
// 			iconImageHref: 'images/svg/map-pin.svg',
// 			iconImageSize: [30, 30],
// 			iconImageOffset: [-15, -15]
// 		});
//
// 		var clusterer = new ymaps.Clusterer({
// 			clusterDisableClickZoom: false,
// 			clusterOpenBalloonOnClick: false,
// 		});
//
// 		clusterer.add(myGeoObjects);
// 		myMap.geoObjects.add(clusterer);
// 		myMap.behaviors.disable('scrollZoom');
// 	}
//
//
//
// 	if (document.getElementById('map-spb') != null) {
//
// 		var myMap = new ymaps.Map("map-spb", {
// 			center: [59.967712, 30.298998],
// 			zoom: 16,
// 			controls: []
// 		});
//
// 		var myGeoObjects = [];
//
// 		myGeoObjects = new ymaps.Placemark([59.967712, 30.298998], {
// 		}, {
// 			iconLayout: 'default#image',
// 			iconImageHref: 'images/svg/map-pin.svg',
// 			iconImageSize: [30, 30],
// 			iconImageOffset: [-15, -15]
// 		});
//
// 		var clusterer = new ymaps.Clusterer({
// 			clusterDisableClickZoom: false,
// 			clusterOpenBalloonOnClick: false,
// 		});
//
// 		clusterer.add(myGeoObjects);
// 		myMap.geoObjects.add(clusterer);
// 		myMap.behaviors.disable('scrollZoom');
// 	}
// }