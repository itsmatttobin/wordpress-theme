var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// SASS
gulp.task('sass', function() {
    return gulp.src('scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('css/src'));
});

// Minify CSS
gulp.task('minify-css', function() {
  return gulp.src('css/src/style.css')
    .pipe(cleanCSS())
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('css/dist'));
});

// Minify JS
gulp.task('minify-js', function() {
    return gulp.src('js/src/functions.js')
        .pipe(uglify())
        .pipe(rename('functions.min.js'))
        .pipe(gulp.dest('js/dist'));
});

// Default task
gulp.task('default', function() {
    gulp.watch('scss/*scss', ['sass']);
    gulp.watch('css/src/style.css', ['minify-css']);
    gulp.watch('js/src/functions.js', ['minify-js']);
});