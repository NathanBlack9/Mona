// import gulp from 'gulp'
// import imagemin from 'gulp-imagemin'

const gulp = require('gulp');
const imagemin = require('gulp-imagemin');

gulp.task('compressImg', function() {
  gulp.src('src/img/**/*')
  .pipe(imagemin())
  .pipe(gulp.dest('build/img'));
});