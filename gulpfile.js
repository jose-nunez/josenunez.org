var gulp = require('gulp');

/*
	COMPILING & PROCESSING ______________________________________________________________________
*/

var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var htmlmin = require('gulp-htmlmin');
var imagemin = require('gulp-imagemin');


gulp.task('image_min', function(){
	gulp.src('src/img/*')
		.pipe(imagemin())
		.pipe(gulp.dest('dist/img'))
	;
});

gulp.task('sass_compile',function(){
	gulp.src('src/sass/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 3 versions','safari 5', 'ie 6', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'],
			cascade: false
		}))
		.pipe(cleanCSS({compatibility: 'ie9'}))
		.pipe(gulp.dest('dist/css'))
	;
});

gulp.task('html_min',function(){
	gulp.src('src/*.html')
		.pipe(htmlmin({collapseWhitespace: true}))
		.pipe(gulp.dest('dist'))
	;
});

gulp.task('copyfonts', function() {
   gulp.src('src/fonts/**')
   .pipe(gulp.dest('dist/fonts'));
});

gulp.task('compile_once',['copyfonts','sass_compile','html_min','image_min']);
gulp.task('compile_watch',function() {
	gulp.watch('src/fonts/**',['copyfonts']);
	gulp.watch('src/sass/*.scss',['sass_compile']);
	gulp.watch('src/*.html',['html_min']);
	gulp.watch('src/img/*',['image_min']);
});


/*
	VERSIONING & RELASES ______________________________________________________________________
*/

// var git = require('gulp-git');