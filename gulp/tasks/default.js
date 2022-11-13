// import gulp from 'gulp'
const gulp = require('gulp');

gulp.task('default', gulp.parallel('css', 'compressJs', 'compressImg'));