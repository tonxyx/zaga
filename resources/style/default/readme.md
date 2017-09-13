## Installation

* run `nvm install` to change local Node version
* run `npm install` to install all dependencies


## Running application
* run `gulp app`

*If you receieve an error, it might be cause of node version change, simply run `nvm use`*


## Dependency assets
* directories like `fonts` and/or `img` are copied from `node_modules`, in this case they refer to LightGallery plugin, 
  so all media is loaded properly (images, icons etc)
  
## Possible Todo in future
* create a Gulp task that will copy Dependency assets automatically for all plugins used
* investigate should this assets be junked inside one specific directory with another task that should run  through 
  files and change it's path so assets are not located in multiple directories inside root directory
