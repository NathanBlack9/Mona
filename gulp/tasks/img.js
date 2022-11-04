// import gulp from 'gulp'
// import imagemin from 'gulp-imagemin'

const gulp = require('gulp');
const imagemin = require('gulp-imagemin');

gulp.task('compressImg', async function() {
  var img_src = 'src/img/**/*', 
      mg_dest = 'build/img';

  gulp.src(img_src)
  .pipe(imagemin())
  .pipe(gulp.dest(mg_dest));
});