module.exports = function(path, gulp, plugins) {

  /*-------------------------------------------------------------------------------------------------
    CONFIG
  -------------------------------------------------------------------------------------------------*/
  var config = {
    instanceName: 'App',
    alias: 'app',
    
    scriptSrc: [
      
      // Theme scripts
      // path.scripts + 'app/main/theme/jquery.min.js',
      
      // Plugin scripts
      // path.npm     + 'dropzone/dist/dropzone.js',
      
      // Custom scripts
      path.scripts + 'app/main/**/*.js'
    ],
    
    cssSrc: [
      
      // Main Css files
      path.css + 'app/app.css'
      
    ]
  };

  
  /*-------------------------------------------------------------------------------------------------
    COMPILE CSS
  -------------------------------------------------------------------------------------------------*/
  gulp.task('compile-css-'+config.alias, require(path.tasks + 'compile-css')({
    instance: config.instanceName,
    includePaths: [
      path.scss + config.alias + '/',
      path.npm
    ],
    src: path.scss + config.alias + '/**/*.scss',
    dest: path.css + config.alias + '/'
  }, gulp, plugins));


  /*-------------------------------------------------------------------------------------------------
    CONCATENATE CSS
  -------------------------------------------------------------------------------------------------*/
  gulp.task('concatenate-css-'+config.alias, ['compile-css-'+config.alias], require(path.tasks + 'concatenate-css')({
    instance: config.instanceName,
    src: config.cssSrc,
    concatFilename: 'main.css',
    dest: path.css,
    destAssets: path.cssAssets
  }, gulp, plugins));
  

  /*-------------------------------------------------------------------------------------------------
    COMPILE SCRIPTS
  -------------------------------------------------------------------------------------------------*/
  gulp.task('compile-scripts-'+config.alias, require(path.tasks + 'compile-scripts')({
    instance: config.instanceName,
    src: config.scriptSrc,
    concatFilename: 'main.js',
    dest: path.scripts + config.alias + '/build/',
    destAssets: path.scriptsAssets
  }, gulp, plugins));
  

  /*-------------------------------------------------------------------------------------------------
    FINAL BUILD TASK
  -------------------------------------------------------------------------------------------------*/
  gulp.task('build-'+config.alias, [
    'compile-css-'+config.alias,
    'concatenate-css-'+config.alias,
    'compile-scripts-'+config.alias
  ]);

  
  /*-------------------------------------------------------------------------------------------------
    WATCH
  -------------------------------------------------------------------------------------------------*/
  gulp.task('watch-'+config.alias, function(){
    console.log('---------- Watching for ' + config.instanceName + ' changes...');

    // scss, script
    gulp.watch([
      path.scss + config.alias + '/**/*.scss',
      path.scripts + config.alias + '/main/*.js',
      '!' + path.scripts + config.alias + '/build/'
    ], ['build-'+config.alias]);

  });


  /*-------------------------------------------------------------------------------------------------
    WORK TASK
  -------------------------------------------------------------------------------------------------*/
  gulp.task(config.alias, [
    'build-'+config.alias,
    'watch-'+config.alias
  ]);

};
