
var gulp         = require('gulp');
var del          = require('del');
var browsersync  = require('browser-sync').create();
var autoprefixer = require('gulp-autoprefixer');
var sass         = require('gulp-sass');
var cleancss     = require('gulp-clean-css');
var sourcemaps   = require('gulp-sourcemaps');
var uglify       = require('gulp-uglify');
var concat       = require('gulp-concat');
var jshint       = require('gulp-jshint');
var runsequence  = require('run-sequence');

var paths = {
  src: {
    css: 'assets/css/main.scss',
    js: [
      'node_modules/material-design-lite/material.js',
      'assets/js/main.js'
    ],
    img: 'assets/img/**/*.{svg,png,gif,jpg,jpeg}'
  },
  watch: {
    css: 'assets/css/**/*.scss',
    js: 'assets/js/main.js',
    img: 'assets/img/**/*.{svg,png,gif,jpg,jpeg}'
  },
  dist: {
    css: 'dist/css/',
    js: 'dist/js/',
    img: 'dist/img/'
  }
};

gulp.task('css', function() {
  return gulp.src(paths.src.css)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 versions']
    }))
    .pipe(cleancss())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.dist.css));
});

gulp.task('js', ['lint'], function() {
  return gulp.src(paths.src.js)
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.dist.js));
});

gulp.task('lint', function() {
  return gulp.src(paths.watch.js)
    .pipe(jshint({ lookup: false }))
    .pipe(jshint.reporter('default'));
});

gulp.task('img', function() {
  return gulp.src(paths.src.img)
    .pipe(gulp.dest(paths.dist.img));
});

gulp.task('serve', function() {
  browsersync.init({
    ui: {
      port: 1337
    },
    open: true,
    notify: true,
    files: [
      '*.html',
      'dist/**/*'
    ],
    server: {
      baseDir: './'
    }
  });
});

gulp.task('clean', function() {
  return del('dist');
});

gulp.task('watch', function() {
  gulp.watch(paths.watch.css, ['css']);
  gulp.watch(paths.watch.js, ['js']);
  gulp.watch(paths.watch.img, ['img']);
});

gulp.task('build', ['clean'], function(callback) {
  runsequence(['css', 'js', 'img'], callback);
});

gulp.task('default', ['build'], function() {
  runsequence('serve', 'watch');
});
