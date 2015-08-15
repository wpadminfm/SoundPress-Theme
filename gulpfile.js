var gulp          = require('gulp');
var sass          = require('gulp-sass');
var concat        = require('gulp-concat');
var uglify        = require('gulp-uglify');
var minifyCss     = require('gulp-minify-css');
var sourcemaps    = require('gulp-sourcemaps');
var rename        = require("gulp-rename");
var order         = require("gulp-order");
var autoprefixer  = require("gulp-autoprefixer");

gulp.task('scripts', function() {
  return gulp.src('./src/js/**/*.js')
  .pipe(order([
    "app/*.js",
    "main.js"
  ]))
  .pipe(concat('scripts.js'))
  .pipe(uglify())
  .pipe(rename({
    extname: '.min.js'
  }))
  .pipe(gulp.dest('./dist/js/'));
});

gulp.task('styles', function() {
  gulp.src('src/scss/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(autoprefixer())
  .pipe(sourcemaps.init())
  .pipe(minifyCss({compatibility: 'ie8'}))
  .pipe(rename({
    extname: '.min.css'
  }))
  .pipe(sourcemaps.write('/maps'))
  .pipe(gulp.dest('./dist/css/'));
});

//Watch task
gulp.task('default',function() {
  gulp.watch('src/scss/**/*.scss',['styles']);
  gulp.watch('src/js/*.js',['scripts']);
});
