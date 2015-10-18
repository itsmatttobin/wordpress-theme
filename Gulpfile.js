var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');

// SASS
gulp.task('sass', function() {
	gulp.src('scss/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest(''));
});

// Minify CSS
gulp.task('minify-css', function() {
	return gulp.src('style.css')
		.pipe(minifyCss())
		.pipe(rename('style.min.css'))
		.pipe(gulp.dest('css'));
});


gulp.task('default', function() {
	gulp.watch('scss/*.scss', ['sass']);
	gulp.watch('style.css', ['minify-css']);
});