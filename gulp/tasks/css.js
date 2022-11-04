// import gulp from 'gulp'
// import cleanCSS from 'gulp-clean-css'
// import autoprefixer from 'gulp-autoprefixer'
// import sass from 'gulp-sass'

const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass');

gulp.task('css', function () {
  return gulp.src("src/styles/**/*.+(scss|sass)")
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer({
      overrideBrowserslist: ['last 2 versions'],
      cascade: false
    }))
    .pipe(cleanCSS({ compatibility: 'ie8' }))
    .pipe(gulp.dest("./"))
  //   .pipe(browserSync.stream());
});