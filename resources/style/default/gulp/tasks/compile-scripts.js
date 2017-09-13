module.exports = function(config, gulp, plugins) {
  return function() {
    console.log('---------- Compiling ' + config.instance + ' JavaScript files...');

    var stream = gulp.src(config.src)
      .pipe(plugins.concat(config.concatFilename))
      .pipe(gulp.dest(config.dest))
      .pipe(gulp.dest(config.destAssets));

    return stream;
  };
};
