/*
	INCLUDES ______________________________________________________________________
*/
var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var jshint = require('gulp-jshint');
var jshintstylish = require('jshint-stylish');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var htmlmin = require('gulp-htmlmin');
var imagemin = require('gulp-imagemin');
// var inject = require('gulp-inject');
// var print = require('gulp-print');
// var phpMinify = require('@cedx/gulp-php-minify');
/*
	DIRECTORIES ______________________________________________________________________

	ALWAYS FINISH DIRECTORIES WITH SLASH '/'
*/

var lib_dir = 'node_modules/';
var src_dir = "src/";
var build_dir = "E:/Dropbox/DESARROLLO/josenunez.org/TEST/wp-content/themes/josenunez/";

var script_src = src_dir+'js/*.js';
var script_concat='main.js';
var script_build = build_dir+'js/';

var html_src = src_dir+'*.html';
var html_build = build_dir;
var php_src = src_dir+'*.php';
var php_build = build_dir;

var lib_src = [
	// lib_dir+'leaflet/dist/leaflet.js',
	// lib_dir+'leaflet-providers/leaflet-providers.js',
];
var lib_css_src = [
	lib_dir+'font-awesome/css/font-awesome.min.css',
];
var lib_other_src = [
	lib_dir+'font-awesome/fonts/*',
];
var lib_build = build_dir+'lib/';

var scss_src = src_dir+'*.scss';
var scss_build = build_dir+'';

var image_src = src_dir+'img/**';
var image_build = build_dir+'img/';
var image_screenshoot_src = src_dir+'img/screenshot.png';
var image_screenshoot_build = build_dir+'/';

var fonts_src = src_dir+'fonts/*';
var fonts_build = build_dir+'fonts/';

var data_src = src_dir+'data/*';
var data_build = build_dir+'data/';

/*
	TASKS ______________________________________________________________________
*/
var tasks = {
	once: [],
	watch: [],
};

/* JAVASCRIPT ____________________________________________________________________________*/
gulp.task('script_err', function() {
	gulp.src(script_src)
		.pipe(jshint())
		.pipe(jshint.reporter(jshintstylish));
});

gulp.task('script', function() {
	gulp.src(script_src)
		.pipe(concat(script_concat))
			.pipe(gulp.dest(script_build))
		.pipe(rename({suffix:'.min'}))
		.pipe(uglify())
			.pipe(gulp.dest(script_build))
	;
});
gulp.task('script_w', function(){gulp.watch(script_src,['script']);});
gulp.task('script_watch',['script','script_w']);
tasks.once.push('script');
tasks.watch.push('script_w');


/* JS LIBRARIES ____________________________________________________________________________*/
gulp.task('lib', function() {
	gulp.src(lib_src,{base:lib_dir})
		.pipe(uglify())
		.pipe(gulp.dest(lib_build))

	gulp.src(lib_css_src,{base:lib_dir})
		.pipe(cleanCSS({compatibility: 'ie9'}))
		.pipe(gulp.dest(lib_build))

	gulp.src(lib_other_src,{base:lib_dir})
		.pipe(gulp.dest(lib_build))
});
tasks.once.push('lib');

/* PHP ____________________________________________________________________________*/

gulp.task('php',function() {
	gulp.src(php_src,{base:src_dir})
	// gulp.src(php_src,{base:src_dir,read:false})
		// .pipe(phpMinify({binary: 'C:/xampp/php/php.exe'}))
		.pipe(gulp.dest(php_build));
});

gulp.task('php_w', function() { gulp.watch(php_src,['php']);});
gulp.task('php_watch',['php','php_w']);
tasks.once.push('php');
tasks.watch.push('php_w');

/* HTML ____________________________________________________________________________*/
gulp.task('html',function(){
	gulp.src(html_src)
		.pipe(htmlmin({collapseWhitespace: true}))
		.pipe(gulp.dest(html_build))
	;
});
gulp.task('html_w',function(){gulp.watch(html_src,['html']);});
gulp.task('html_watch',['html','html_w']);
tasks.once.push('html');
tasks.watch.push('html_w');

/* SCSS ____________________________________________________________________________*/
gulp.task('scss',function(){
	gulp.src(scss_src)
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 3 versions','safari 5', 'ie 6', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'],
			cascade: false
		}))
		.pipe(cleanCSS({compatibility: 'ie9'}))
		.pipe(gulp.dest(scss_build))
	;
});
gulp.task('scss_w',function(){gulp.watch(scss_src,['scss']);});
gulp.task('scss_watch',['scss','scss_w']);
tasks.once.push('scss');
tasks.watch.push('scss_w');

/* IMAGES ____________________________________________________________________________*/

gulp.task('image_min', function(){
	var img = [
		'!'+image_screenshoot_src,
		image_src,
	];

	gulp.src(img)
		.pipe(imagemin())
		.pipe(gulp.dest(image_build))
	;

	gulp.src(image_screenshoot_src)
		.pipe(imagemin())
		.pipe(gulp.dest(image_screenshoot_build))
	;
});
gulp.task('image_min_w', function(){gulp.watch(image_src,['image_min']);});
gulp.task('image_min_watch',['image_min','image_min_w']);
tasks.once.push('image_min');
// tasks.watch.push('image_min_w');

/* FONTS ____________________________________________________________________________*/
gulp.task('fonts', function() {
   gulp.src(fonts_src)
   .pipe(gulp.dest(fonts_build));
});
gulp.task('fonts_w', function() { gulp.watch(fonts_src,['fonts']);});
gulp.task('fonts_watch',['fonts','fonts_w']);
tasks.once.push('fonts');
// tasks.watch.push('fonts_w');

/* GENERAL ____________________________________________________________________________*/
gulp.task('once',tasks.once);
gulp.task('watch',tasks.watch);
gulp.task('default',['once','watch']);

/*
	VERSIONING & RELASES ______________________________________________________________________
*/

// var git = require('gulp-git');