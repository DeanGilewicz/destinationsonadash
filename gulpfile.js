// chosen to comment out wp_enqueue_scripts in function php
// direct hook up to dist folder to get assets
// using MAMP so no need for express server

var gulp = require('gulp'),
	autoprefixer = require('autoprefixer'),
	cssnano = require('cssnano'),
	jshint = require('gulp-jshint'),
	livereload = require('gulp-livereload'),
	postcss = require('gulp-postcss'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	uglify = require('gulp-uglify');

// JAVASCRIPT

// catch mistakes in custom js file
gulp.task('jshint', function() {
	return gulp.src('wp-content/themes/juliesjourneys/js/main.js')
		.pipe(jshint())
		.pipe(jshint.reporter('jshint-stylish'));
});

// minify custom js script and place in dist folder
gulp.task('scripts', function() {
	return gulp.src('wp-content/themes/juliesjourneys/js/main.js')
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(rename('main.min.js'))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('wp-content/themes/juliesjourneys/dist/js/'))
		.pipe(livereload());
});

// vendor scripts - place into dist folder - js/vendor/[filename]
gulp.task('scripts-vendor', function() {
	return gulp.src(['bower_components/modernizr/modernizr.js',
  					'bower_components/fastclick/lib/fastclick.js',
  					'bower_components/jquery/dist/jquery.min.js'
  					])
    	.pipe(sourcemaps.write())
    	.pipe(gulp.dest('wp-content/themes/juliesjourneys/dist/js/vendor'));
});


// SASS / CSS

// gulp.task('styles', function() {
// 	return 
// 		.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
// 		.pipe(sourcemaps.init())
// 		.pipe(minifycss())
// 		.pipe(sourcemaps.write('./'))
// 		.pipe(gulp.dest('wp-content/themes/juliesjourneys/dist/css'))
// });

// compile sass into one css file, minify and place in dist folder
gulp.task('styles', function() {
	var processors = [
		autoprefixer({browsers: ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']}),
		cssnano
	];
	return gulp.src('wp-content/themes/juliesjourneys/sass/main.scss')
		.pipe(sass({ outputStyle: 'expanded' }))
		.pipe(sourcemaps.init())
		.pipe(postcss(processors))
		.pipe(rename('main.min.css'))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('wp-content/themes/juliesjourneys/dist/css'))
		.pipe(livereload());
});


// vendor css - place into dist folder - css/vendor/[filename]
gulp.task('styles-vendor', function() {
	return gulp.src(['bower_components/foundation/css/foundation.min.css',
					'bower_components/foundation/css/normalize.min.css'])
		.pipe(gulp.dest('wp-content/themes/juliesjourneys/dist/css/vendor'));
});


// COMMANDS

// currently each task is independent so each type of file will need to be saved once to perform actions
gulp.task('watch', function() {
	livereload.listen({ quiet: true }); // disable console log of reloaded files
	gulp.watch('wp-content/themes/juliesjourneys/sass/**', ['styles']);
	gulp.watch('wp-content/themes/juliesjourneys/js/main.js', ['jshint', 'scripts']);
});


// register initial task for vendor css and js
gulp.task('initial', ['styles-vendor', 'scripts-vendor'], function() {
	console.log('vendor css and js placed into dist');
});

// register default tasks
gulp.task('default', ['watch'], function() {
	console.log('gulp is watching and will rebuild when changes are made...');
});

