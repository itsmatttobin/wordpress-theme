var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// SASS
gulp.task('sass', function() {
    return gulp.src('assets/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('assets/css/src'));
});

// Minify CSS
gulp.task('minify-css', function() {
  return gulp.src('assets/css/src/style.css')
    .pipe(cleanCSS())
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('assets/css/dist'));
});

// Minify JS
gulp.task('minify-js', function() {
    return gulp.src('assets/js/src/functions.js')
        .pipe(uglify())
        .pipe(rename('functions.min.js'))
        .pipe(gulp.dest('assets/js/dist'));
});

// Default task
gulp.task('default', function() {
    gulp.watch('assets/scss/**/*.scss', ['sass']);
    gulp.watch('assets/css/src/style.css', ['minify-css']);
    gulp.watch('assets/js/src/functions.js', ['minify-js']);
});