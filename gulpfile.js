var gulp = require('gulp');
var zip = require('gulp-zip');
var print = require('gulp-print');

gulp.task('default', function() {
  return gulp.src('wordpress/wp-content/plugins/squerb/*')
          .pipe(print())
          .pipe(zip('squerb-plugin.zip'))
          .pipe(gulp.dest('dist'));
});
