let mix = require('laravel-mix');
const globImporter = require('node-sass-glob-importer');

mix
  .sass('resources/assets/css/main.scss', 'dist/css', {
    sassOptions: {
      importer: globImporter()
    }
  })
  .js('resources/assets/js/main.js', 'dist/js');


