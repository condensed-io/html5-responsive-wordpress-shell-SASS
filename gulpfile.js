// gulpfile.js
var gulp = require('gulp');

gulp.task('default', function () {
  
    // start up the svg sprite generator
    
    var gulp = require('gulp'),
    svgSprite = require('gulp-svg-sprite'),

    // Basic configuration example
    config                  = {
    mode                : {
        symbol          : true      // Activate the «symbol» mode
    }
    };

    gulp.src('**/*.svg', {cwd: ''})
    .pipe(svgSprite(config))
    .pipe(gulp.dest('img/sprite'));
    
});