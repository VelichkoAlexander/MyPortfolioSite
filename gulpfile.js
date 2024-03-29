'use strict';
var gulp = require('gulp'),
  rename = require("gulp-rename"),
  cache = require('gulp-cache'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  sass = require('gulp-sass'),                      // Компиляция SCSS
  wiredep = require('wiredep').stream,
  minifyCSS = require('gulp-minify-css'),
  concatCss = require('gulp-concat-css'),
  browserSync = require('browser-sync').create(),   //лайв-релоад
  reload = browserSync.reload,                      //упрощение обращения к релоаду
  plumber = require('gulp-plumber'),
  notify = require("gulp-notify"),
  autoprefixer = require('gulp-autoprefixer'),
  jade = require('gulp-jade'),                      // Компиляция Jade
  svgstore = require('gulp-svgstore');              //Генерация svg иконок

//===================================LIVERELOAD===================================


// Static server
gulp.task('browser-sync', function () {
    browserSync.init({
        server: {
            baseDir: "./app"
        }
    });

});

//===================================END LIVERELOAD===================================


// SVG ICONS
gulp.task('generate-svg', function () {
  return gulp
    .src('app/svg/*.svg', { base: 'src/icon' })
    .pipe(rename({prefix: 'icon-'}))
    .pipe(svgstore())
    .pipe(gulp.dest('app/images/svg'));
});




//===================================HTML===================================

//Собираем Jade
gulp.task('jade', function () {
    gulp.src(['app/jade/*.jade', '!app/jade/_*.jade'])	// Указываем какие файлы нужны
      .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
      .pipe(jade({									// Вызываем Jade
          pretty: true								// Делаем красиво и богато, пока что.
      }))
      .pipe(gulp.dest('./app/'))						// Директория куда скидываются готовые файлы
        // .pipe(notify("Jade ready!"))
      .pipe(reload({stream: true}));				// Сервер перезапускаем

});
//html - при верстке без джейд
gulp.task('html', function () {
    gulp.src('app/*.html')
      .pipe(notify("Html Complete!"))
      .pipe(reload({stream: true}));
});

//===================================END HTML===================================

//===================================CSS===================================


//css

gulp.task('css', function () {
    gulp.src('app/css/styles.css')
      .pipe(autoprefixer({
          browsers: ['last 2 versions'],
          cascade: true
      }))
      .pipe(gulp.dest('built/css/'))
      .pipe(notify("Css ready!"))
      .pipe(reload({stream: true}));
});

//concatCss
gulp.task('concatCss', function () {
    gulp.src('./app/css/*.css')
      .pipe(concatCss("bundle.css"))
      .pipe(minifyCSS())
      .pipe(gulp.dest('out/css'));
});

//minify
gulp.task('minify-css', function () {
    return gulp.src('./app/css/*.css')
      .pipe(minifyCss({compatibility: 'ie8'}))
      .pipe(gulp.dest('dist'));
});

//Собираем SCSS
gulp.task('sass', function () {
    gulp.src('app/scss/*.scss')
      .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
      .pipe(sass({
          errLogToConsole: true,						// показывать ошибки в консоле
          sync: true									// для обработки больших файлов
      }))
      .pipe(rename({suffix: '.min', prefix : ''}))
      .pipe(autoprefixer({
          browsers: ['last 15 versions'],
          cascade: false
      }))
      .pipe(minifyCSS())
      .pipe(gulp.dest('app/css/'))					// Директория куда скидываются готовые файлы
      // .pipe(notify("Scss Complete!"))				//Нотификация
      .pipe(reload({stream: true}));					// Сервер перезапускаем
});

//===================================END CSS===================================

//===================================JS===================================


//reload Js
gulp.task('js', function () {
    gulp.src('./app/js/*.js')
        // .pipe(notify("Js Complete!"))
      .pipe(reload({stream: true}));
});

gulp.task('minify-js', function () {
    gulp.src('./app/js/libs/**.js')
      .pipe(uglify())
      .pipe(concat('libs.js'))
      .pipe(gulp.dest('out/js/libs'));
});

//===================================END JS===================================

//===================================BOWER===================================


//wiredep
gulp.task('wiredep', function () {
    gulp.src('app/jade/index.jade')
      .pipe(wiredep({
          directory: 'app/components',
          exclude: 'app/components/jquery'           //Исключаем ненужную папку
      }))
      .pipe(gulp.dest('app/jade/'))
      .pipe(notify("wiredep include done!"))
});

//===================================END BOWER===================================


//watcher
gulp.task('watch', function () {
    //gulp.watch('app/css/styles.css', ['css']);
    gulp.watch('app/js/*.js', ['js']);
    //gulp.watch('app/*.html', ['html']);
    gulp.watch('app/jade/**/*.jade', ['jade']);
    gulp.watch('app/scss/**/_*.scss', ['sass']);
    gulp.watch('bower.json', ['wiredep']);

});

//default
gulp.task('[dev]', ['browser-sync', 'watch']);

gulp.task('[prod]', ['build']);


gulp.task('build', function () {
    gulp.src('./app/css/*.css')
      .pipe(concatCss("bundle.css"))
      .pipe(minifyCSS())
      .pipe(gulp.dest('out/css'));
    gulp.src('./app/js/*.js')
      .pipe(uglify())
      .pipe(concat('main.js'))
      .pipe(gulp.dest('out/js'));
    gulp.src('./app/*.html')
      .pipe(gulp.dest('out/'));
    gulp.src('./app/*.php')
      .pipe(gulp.dest('out/'));
    gulp.src('./app/fonts/**/*/')
      .pipe(gulp.dest('out/fonts'));
    gulp.src('./app/images/**/*/')
      .pipe(gulp.dest('out/images'));
    gulp.src('./app/js/libs/**/*/')
      .pipe(gulp.dest('out/js/libs'));
});

