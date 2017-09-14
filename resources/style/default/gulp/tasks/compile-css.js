var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var cssnano = require('gulp-cssnano');

module.exports = function(config, gulp, plugins) {
  return function() {
    console.log('---------- Compiling ' + config.instance + ' CSS files...');


    var sassSettings = {
      style: 'expanded',
      sync: true,
      errLogToConsole: true,
      includePaths: config.includePaths
    };


    var prefixSettings = [
      'last 3 versions',
      'Explorer >= 9',
      'Android >= 4.0',
      'iOS >= 5',
      'last 5 ChromeAndroid versions',
      'last 3 BlackBerry versions',
      'last 3 FirefoxAndroid versions',
      'last 3 OperaMobile versions',
      'last 3 OperaMini versions'
    ];


    var stream = gulp.src(config.src)
      .pipe(plumber({
        errorHandler: function(err) {
          notify.onError({
            title:    "SASS Syntax Error",
            message:  "<%= error.message %>",
            sound:    "Purr"
          })(err);
          this.emit('end');
        }
      }))
      .pipe(plugins.sourcemaps.init())
      .pipe(sass(sassSettings))
      .pipe(autoprefixer(prefixSettings))
      .pipe(cssnano())
      .pipe(plugins.sourcemaps.write('./maps'))
      .pipe(gulp.dest(config.dest));
    
    return stream;
    
  };
};
