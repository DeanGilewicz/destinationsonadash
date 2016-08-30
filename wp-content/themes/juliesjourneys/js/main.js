// need to wrap jQuery in a no conflict wrapper - wp can work with many js libraries and $ signs
jQuery(document).ready(function($) {

	console.log('ready to go');

	// uncomment if using foundation js
	// $(document).foundation();

	// fastclick - removes 300ms firing of click event when tap on mobile
	FastClick.attach(document.body);

	// GLOBAL HEADER

	// search input field functionality

	$('#header-search-icon').on('click', function() {
		var searchInput = $('#header-search-field');
		$(searchInput).toggleClass('active');
		if( searchInput.hasClass('active') ) {
			$(searchInput).focus();
		}
	});


	// GLOBAL NAV
	// small device
	if( $(window).width() <= 640 ) {
		$('.header-continents li').on('click', function(e) {
			if( $(this).find('span').hasClass('active') ) {
				return true;
			} else {
				e.preventDefault();
				$('.header-continents li span').removeClass('active');
				$(this).find('span').addClass('active');
			}

		});
	}
	

	// HOME PAGE

	if ($('body').hasClass('home') || $('body').hasClass('search')) {

		// hero slider

		// var timer = setInterval(transitionHero, 4000);

		var currentSlide = $('.slide-1');

		// var transitionHero = function () {

		// 	currentSlide.removeClass('active');
			
		// 	var index = 1;

		// 	if (currentSlide.next().length) {

		// 		currentSlide.next().addClass('active');

		// 		index = currentSlide.next().index();

		// 		currentSlide = currentSlide.next();

		// 	} else {

		// 		$('.slide-1').addClass('active');

		// 		index = 0;

		// 		currentSlide = $('.slide-1');
		// 	}

		// 	$('.progress-of-slides .progress-btn').removeClass('active');

		// 	$('.progress-of-slides .progress-btn').eq(index).addClass('active');

		// };

		// progress buttons on slider

		$('.progress-of-slides .progress-btn').on('click', function() {

			// clearInterval(timer);

			// timer = setInterval(transitionHero, 4000);

			var index = $(this).index();

			currentSlide.removeClass('active');

			currentSlide = $('.slides > div').eq(index);

			currentSlide.addClass('active');

			$('.progress-of-slides .progress-btn').removeClass('active');

			$(this).addClass('active');

		});

		// slide navigation buttons to go back and forward

		var currentSearchSlide = $('.search-slide-1');
		var indexSearchSlide = 0;

		$('.container-nav .nav').on('click', function() {
			var slideDirection = $(this).attr('data-nav-direction');
			var totalNumOfSlides = $('[class^="search-slide"]').length-1;
			
			// console.log('prev index', indexSearchSlide);

			if(slideDirection === 'back' && indexSearchSlide === 0) {
				indexSearchSlide = totalNumOfSlides; // go to last slide
			
			} else if (slideDirection === 'forward' && indexSearchSlide === totalNumOfSlides) {
				indexSearchSlide = 0; // go to first slide
			
			} else if (slideDirection === 'back') {
				indexSearchSlide = indexSearchSlide - 1;
			
			} else if (slideDirection === 'forward') {
				indexSearchSlide = indexSearchSlide + 1;
			}

			// console.log('current index', indexSearchSlide);
			
			currentSearchSlide.removeClass('active');
			currentSearchSlide = $('.slides > div').eq(indexSearchSlide);
			currentSearchSlide.addClass('active');

		});
		// mobile handling of block categories
		
		if( $(window).width() <= 640 ) {
			$('.block-1 .item a').on('click', function(e) {
				// console.log('clicked');
				if( $(this).hasClass('active') ) {
					return true;
				} else {
					e.preventDefault();
					$('.block-1 .item a').removeClass('active');
					$('.block-1 .item a .mobile-go').removeClass('active');
					$(this).addClass('active');
					$(this).find('.mobile-go').addClass('active');
				}
			});
		}


	}

	// if using lightbox then uncomment
	
		// START LIGHTBOX

		var updateButtonNav = function () {
			// hide button nav buttons
			$('.lightbox-content .previous, .lightbox-content .next').addClass('button-hidden');
			// if there are images in the array
			if (lightboxImages.length > 0) {
				// set index to be the same as the lightbox data index value
				var index = $('.lightbox-content img').data('index');
				// when img data index value above 0 show prev button nav
				if (index > 0) {
					$('.lightbox-content .previous').removeClass('button-hidden');
				}
				// when img data index value below the last index of array show next button nav
				if (index < lightboxImages.length-1) {
					$('.lightbox-content .next').removeClass('button-hidden');
				}
			}
		};

		// set empty array to collect all images inside of container-lightbox-content
		var lightboxImages = [];

		// when a gallery img clicked
		$('.gallery-image').on('click', function(e) {
			e.preventDefault();
			// store src for clicked image
			var source = $(this).children('img').attr('src');
			// store alt for clicked image
			var alt = $(this).children('img').attr('alt');

			// iterate through each img in gallery
			$(this).parents('.gallery-images').find('.gallery-image img').each(function(index, el) {
				// if the clicked image src is equal to the image source then set the data index value to be that number
				if ($(this).attr('src') === source) {
					$('.lightbox-content img').data('index', index);
				}
				// push all image srcs into lightboxImages array
				// lightboxImages.push({imageSrc: $(this).parents('.gallery-image').attr('data-lb-img'), imageAlt: $(this).attr('alt')});
				lightboxImages.push({imageSrc: $(this).parents('.gallery-image').attr('data-lb-img'), imageCaption: $(this).siblings('.caption').text()});
			});

			// update button nav UI
			updateButtonNav();
			// // set lightbox img src
			// $('.lightbox-content img').attr("src",source);
			$('.lightbox-content img').attr("src",$(this).attr('data-lb-img'));
			// // set image comment
			// $('.lightbox-content .image-comment').text(alt);
			$('.lightbox-content .image-comment').text($(this).children('.caption').text());
			// // animate lightbox box open
			$('.lightbox').addClass('lightbox-open').removeClass('lightbox-close');
		});

		// when click next button nav
		$('.lightbox-content .next').on('click', function() {
			// get the current data index value of the lightbox image
			var index = $('.lightbox-content img').data('index');
			// set image comment to be next alt source value in array
			$('.lightbox-content .image-comment').text(lightboxImages[index+1].imageCaption);
			// set img source and data index to be next value in array
			$('.lightbox-content img').attr('src', lightboxImages[index+1].imageSrc).data('index', index+1);
			// update button nav UI
			updateButtonNav();
		});

		// when click prev button nav
		$('.lightbox-content .previous').on('click', function() {
			// get the current data index value of the lightbox image
			var index = $('.lightbox-content img').data('index');
			// set image comment to be previous alt source value in array
			$('.lightbox-content .image-comment').text(lightboxImages[index-1].imageCaption);
			// set img source and data index to be previous value in array
			$('.lightbox-content img').attr('src', lightboxImages[index-1].imageSrc).data('index', index-1);
			// update button nav UI
			updateButtonNav();
		});

		$('.lightbox-x-close').on('click', function() {
			// reset lightboxImages array
			lightboxImages = []; 
			// animate lightbox box close
			$(this).parents('.lightbox').removeClass('lightbox-open').addClass('lightbox-close');
		});



	// MAP PAGE

	if ($('body').hasClass('page-map')) {

		$('.accordion h4').on('click', function() {
			$(this).next('.accordion-content').toggleClass('active');
		});
	}

});