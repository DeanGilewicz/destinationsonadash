// need to wrap jQuery in a no conflict wrapper - wp can work with many js libraries and $ signs
jQuery(document).ready(function($) {

	"use strict";

	// console.log('ready to go');

	// uncomment if using foundation js
	// $(document).foundation();

	// fastclick - removes 300ms firing of click event when tap on mobile
	FastClick.attach(document.body);


	// GLOBAL HEADER

	// search input field functionality

	$('#js-header-search-icon').on('click', function() {
		var headerMiddle = $('.header_search');
		var searchInput = $('#header-search-field');
		$(headerMiddle).toggleClass('active');
		if( headerMiddle.hasClass('active') ) {
			$(searchInput).focus();
		}
	});

	// search input field functionality

	$('#js-hamburger').on('click', function() {
		var headerBottom = $('.header_bottom');
		$(headerBottom).toggleClass('active');
	});

	

	// HOME PAGE

	if( $('body').hasClass('home') || $('body').hasClass('search') ) {

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

			if( slideDirection === 'back' && indexSearchSlide === 0 ) {
				indexSearchSlide = totalNumOfSlides; // go to last slide
			
			} else if( slideDirection === 'forward' && indexSearchSlide === totalNumOfSlides ) {
				indexSearchSlide = 0; // go to first slide
			
			} else if( slideDirection === 'back' ) {
				indexSearchSlide = indexSearchSlide - 1;
			
			} else if( slideDirection === 'forward' ) {
				indexSearchSlide = indexSearchSlide + 1;
			}
			
			currentSearchSlide.removeClass('active');
			currentSearchSlide = $('.slides > div').eq(indexSearchSlide);
			currentSearchSlide.addClass('active');

		});

		// small device handling of block categories
		
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

	
	// LIGHTBOX

	// set empty array to collect all images inside of container-lightbox-content
	var lightboxImages = [];
	

	function updateButtonNav() {
		// hide button nav buttons
		$('.lightbox_content .previous, .lightbox_content .next').addClass('button_hidden');
		// if there are images in the array
		if (lightboxImages.length > 0) {
			// set index to be the same as the lightbox data index value
			var index = $('.lightbox_content img').data('index');
			// when img data index value above 0 show prev button nav
			if (index > 0) {
				$('.lightbox_content .previous').removeClass('button_hidden');
			}
			// when img data index value below the last index of array show next button nav
			if (index < lightboxImages.length-1) {
				$('.lightbox_content .next').removeClass('button_hidden');
			}
		}
	}

	$('.post-single .container_content img').on('click', function(e) {
		e.preventDefault();

		// store src for clicked image - medium-large size
		var clickedImgSource = $(this).attr('src');

		// store alt for clicked image
		var clickedImgAlt = $(this).attr('alt') || '';

		// store reference to initial image to be displayed in lightbox
		var firstLightboxImg;

		// iterate through each img loaded through content AND in ACF gallery
		$(this).parents('.content-area').find('[class^="wp-image"]').each(function(index) {

			var currentImgSource = '';
			var currentImgAtl = '';

			// get image src of each el - medium size
			if( $(this).attr('src') ) {
				currentImgSource = $(this).attr('src');
			} else {
				currentImgSource = $(this).data('src');
			}

			if( $(this).attr('alt') ) {
				currentImgAtl = $(this).attr('alt');
			} else {
				currentImgAtl = $(this).data('alt');
			}
 
			// if the clicked image src is equal to the current image source then set the data index value to be that number
			if (clickedImgSource === currentImgSource) {
				$('.lightbox_content img').data('index', index);
				// set initial image to be displayed in lightbox
				currentImgSource = $(this).attr('srcset').split(',')[1].replace(' 768w', '');
				firstLightboxImg = currentImgSource;
			}

			// format to use medium-large size
			if( $(this).attr('srcset') ) {
				currentImgSource = $(this).attr('srcset').split(',')[1].replace(' 768w', '');
			}

			// push all image srcs into lightboxImages array
			lightboxImages.push({imageSrc: currentImgSource, imageAlt: currentImgAtl});
		});

		// update button nav UI
		updateButtonNav();

		// set lightbox img src
		$('.lightbox_content img').attr("src",firstLightboxImg);
		// set image comment
		$('.lightbox_content .image_comment').text(clickedImgAlt);
		// animate lightbox box open
		$('.lightbox').removeClass('lightbox_close').addClass('lightbox_open');
	});

	// when click next button nav
	$('.lightbox_content .next').on('click', function() {
		// get the current data index value of the lightbox image
		var index = $('.lightbox_content img').data('index');
		// set image comment to be next alt source value in array
		$('.lightbox_content .image_comment').text(lightboxImages[index+1].imageAlt);
		// set img source and data index to be next value in array
		$('.lightbox_content img').attr('src', lightboxImages[index+1].imageSrc).data('index', index+1);
		// update button nav UI
		updateButtonNav();
	});

	// when click prev button nav
	$('.lightbox_content .previous').on('click', function() {
		// get the current data index value of the lightbox image
		var index = $('.lightbox_content img').data('index');
		// set image comment to be previous alt source value in array
		$('.lightbox_content .image_comment').text(lightboxImages[index-1].imageAlt);
		// set img source and data index to be previous value in array
		$('.lightbox_content img').attr('src', lightboxImages[index-1].imageSrc).data('index', index-1);
		// update button nav UI
		updateButtonNav();
	});

	$('.lightbox_x_close').on('click', function() {
		// reset lightboxImages array
		lightboxImages = []; 
		// animate lightbox box close
		$(this).parents('.lightbox').removeClass('lightbox_open').addClass('lightbox_close');
	});


	// MAP PAGE

	if( $('body').hasClass('page-map') ) {

		$('.accordion h4').on('click', function() {
			$(this).next('.accordion-content').toggleClass('active');
		});
	}

});