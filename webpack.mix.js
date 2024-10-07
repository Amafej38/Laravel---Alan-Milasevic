const mix = require('laravel-mix');

// Компилируем JS
mix.js('resources/js/app.js', 'public/js')

// Копируем и обрабатываем CSS
.css('resources/css/app.css', 'public/css')

// Копируем Bootstrap и jQuery файлы
.copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css')
.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js')
.copy('node_modules/jquery/dist/jquery.js', 'public/js');