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
		var searchForm = $('#header-search-form');
		$(this).toggleClass('active');
		$(searchForm).toggleClass('active');
		if( searchForm.hasClass('active') ) {
			$('#header-search-field').focus();
		}
	});

	// HOME PAGE

	if ($('body').hasClass('home')) {

		// hero slider

		// var timer = setInterval(transitionHero, 4000);

		var currentSlide = $('.slide-1');

		var transitionHero = function () {

			currentSlide.removeClass('active');
			
			var index = 1;

			if (currentSlide.next().length) {

				currentSlide.next().addClass('active');

				index = currentSlide.next().index();

				currentSlide = currentSlide.next();

			} else {

				$('.slide-1').addClass('active');

				index = 0;

				currentSlide = $('.slide-1');
			}

			$('.progress-of-slides .progress-btn').removeClass('active');

			$('.progress-of-slides .progress-btn').eq(index).addClass('active');

		};

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


		// mobile handling of block categories

		$('.block-1 .item a').on('click', function(e) {
			if( $(this).hasClass('active') ) {
				return true;
			} else {
				$('.block-1 .item a').removeClass('active');
				e.preventDefault();
				$(this).addClass('active');
			}
		});



	}

	// if using lightbox then uncomment

	/*
	
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

		// small / medium device - when gallery image clicked

		if( $(window).width() < 1024 ) {

			// when a gallery img clicked
			$('.container-gallery img').on('click', function() {
				// store src for clicked image
				var source = $(this).attr('src');
				// store alt for clicked image
				var alt = $(this).attr('alt');
				// iterate through each img in gallery
				$(this).parents('.container-gallery').find('img').each(function(index) {
					// if the clicked image src is equal to the image source then set the data index value to be that number
					if ($(this).attr('src') == source) {
						$('.lightbox-content img').data('index', index);
					}
					// push all image srcs into lightboxImages array
					lightboxImages.push({imageSrc: $(this).attr('src'), imageAlt: $(this).attr('alt')});
				});

				// update button nav UI
				updateButtonNav();
				// set lightbox img src
				$('.lightbox-content img').attr("src",source);
				// set image comment
				$('.lightbox-content .image-comment').text(alt);
				// animate lightbox box open
				$('.lightbox').addClass('lightbox-open').removeClass('lightbox-close');
			});
		}

		// large device - when gallery image hovered on

		if( $(window).width() >= 1024 ) {

			$('.container-gallery img').on('mouseenter', function() {
				// store src for clicked image
				var source = $(this).attr('src');
				// store alt for clicked image
				var alt = $(this).attr('alt');
				// iterate through each img in gallery
				$(this).parents('.container-gallery').find('img').each(function(index) {
					// if the clicked image src is equal to the image source then set the data index value to be that number
					if ($(this).attr('src') == source) {
						$('.lightbox-content img').data('index', index);
					}
					// push all image srcs into lightboxImages array
					lightboxImages.push({imageSrc: $(this).attr('src'), imageAlt: $(this).attr('alt')});
				});

				// update button nav UI
				updateButtonNav();
				// set lightbox img src
				$('.lightbox-content img').attr("src",source);
				// set image comment
				$('.lightbox-content .image-comment').text(alt);
				// animate lightbox box open
				$('.lightbox').addClass('lightbox-open').removeClass('lightbox-close');
			});

		}

		// when click next button nav
		$('.lightbox-content .next').on('click', function() {
			// get the current data index value of the lightbox image
			var index = $('.lightbox-content img').data('index');
			// set image comment to be next alt source value in array
			$('.lightbox-content .image-comment').text(lightboxImages[index+1].imageAlt);
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
			$('.lightbox-content .image-comment').text(lightboxImages[index-1].imageAlt);
			// set img source and data index to be previous value in array
			$('.lightbox-content img').attr('src', lightboxImages[index-1].imageSrc).data('index', index-1);
			// update button nav UI
			updateButtonNav();
		});

		// when click anywhere in the overlay
		// $('.lightbox-overlay').on('click', function() {
		// 	// reset lightboxImages array
		// 	lightboxImages = []; 
		// 	// animate lightbox box close
		// 	$('.lightbox-open').removeClass('lightbox-open').addClass('lightbox-close');
		// });

		$('.lightbox-x-close').on('click', function() {
			// reset lightboxImages array
			lightboxImages = []; 
			// animate lightbox box close
			$(this).parents('.lightbox').removeClass('lightbox-open').addClass('lightbox-close');
		});

	*/


});