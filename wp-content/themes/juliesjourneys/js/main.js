// need to wrap jQuery in a no conflict wrapper - wp can work with many js libraries and $ signs
jQuery(document).ready(function($) {

	console.log('ready to go');

	// uncomment if using foundation js
	// $(document).foundation();

	// fastclick - removes 300ms firing of click event when tap on mobile
	FastClick.attach(document.body);

});