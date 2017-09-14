/*-------------------------------------------------------------------------------------------------
 Global requirements
 -------------------------------------------------------------------------------------------------*/
var gulp = require('gulp'),
  sourcemaps = require('gulp-sourcemaps'),
  concat = require('gulp-concat'),
  plugins = require('gulp-load-plugins')({lazy:false});




/*-------------------------------------------------------------------------------------------------
 Paths
 -------------------------------------------------------------------------------------------------*/
var path = { root: __dirname + '/' };
path.instances = path.root + 'gulp/instances/';
path.tasks = path.root + 'gulp/tasks/';
path.scss = path.root + 'scss/';
path.css = path.root + 'css/';
path.cssAssets = path.root + '../../../app/media/css/';
path.media = path.root + 'media/';
path.scripts = path.root + 'scripts/';
path.scriptsAssets = path.root + '../../../app/media/js/';
path.npm = path.root + 'node_modules/';




/*-------------------------------------------------------------------------------------------------
 Import instances
 -------------------------------------------------------------------------------------------------*/
require(path.instances + 'app.js')(path, gulp, plugins); // APP




/*-------------------------------------------------------------------------------------------------
 Default task
 -------------------------------------------------------------------------------------------------*/
gulp.task('default', function(){
    console.log('------- !! Please run a single instance such as "gulp app" !!');
});

