// import gulp from 'gulp'

const gulp = require('gulp');

gulp.task('watch', function() {
  gulp.watch("src/styles/**/*.+(scss|sass)", gulp.parallel('css'));
  gulp.watch("src/js/**/*.js", gulp.parallel('compressJs'));
  gulp.watch("src/img/**/*+(png|svg|jpg)", gulp.parallel('compressImg'));
  // gulp.watch("src/html/*.html", gulp.parallel('html'),browserSync.reload);
});