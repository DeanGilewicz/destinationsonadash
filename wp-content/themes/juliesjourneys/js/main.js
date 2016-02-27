// need to wrap jQuery in a no conflict wrapper - wp can work with many js libraries and $ signs
jQuery(document).ready(function($) {

	console.log('ready to go');

	// uncomment if using foundation js
	// $(document).foundation();

	// fastclick - removes 300ms firing of click event when tap on mobile
	FastClick.attach(document.body);


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

	}

	


});