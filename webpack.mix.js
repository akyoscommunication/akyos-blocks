let mix = require('laravel-mix');

mix
  .sass('resources/assets/css/main.scss', 'dist/css')
  .js('resources/assets/js/main.js', 'dist/js');
