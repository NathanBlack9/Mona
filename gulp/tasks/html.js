import gulp from 'gulp'
import browserSync from 'browser-sync'
import htmlmin from 'gulp-htmlmin'


gulp.task('html', () => {
  return gulp.src('src/html/*.html')
    .pipe(htmlmin({ 
        removeComments: true  
    }))
    .pipe(gulp.dest('build'))
    .pipe(browserSync.stream());
});