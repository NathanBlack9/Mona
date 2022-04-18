// import gulp from 'gulp'
// import browserSync from 'browser-sync'
// import terser from 'gulp-terser'
// import concat from 'gulp-concat'
// import cleanDest from 'gulp-clean-dest'
const gulp = require('gulp');
const terser = require('gulp-terser');
const concat = require('gulp-concat');
const cleanDest = require('gulp-clean-dest');


gulp.task('compressJs', function() {
  return gulp.src(['src/js/modules/*.js','src/js/*.js'])
    .pipe(cleanDest('build/js/'))  
    .pipe(concat('common-min.js'))
    .pipe(terser())
    .pipe(gulp.dest('build/js/'))
    // .pipe(browserSync.stream());
});