var gulp = require('gulp');
var sass = require('gulp-sass');


// SASS task
gulp.task('styles', function() {
	gulp.src('scss/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest(''));
});

// Watch task
gulp.task('default', function() {
	gulp.watch('scss/*.scss', ['styles']);
});