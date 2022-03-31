'use strict';

var nameFolderTheme = 'wpcore';
var gulp = require('gulp');
var destFolder = 'src/wp-content/themes/' + nameFolderTheme + '/assets/main';

//SCSS minify
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
var sassFolder = [
    'src/wp-content/themes/' + nameFolderTheme + '/assets/css/**/*.css',
    'src/wp-content/themes/' + nameFolderTheme + '/assets/scss/**/*.scss',
];

gulp.task('sass', function () {
    // 1. where is my scss file
    return gulp.src(sassFolder)
        // 2. pass that file through sass compiler
        .pipe(sass({ outputStyle: "compressed" }).on('error', sass.logError))
        .pipe(concat('main.css'))
        .pipe(sass({ outputStyle: "compressed" }).on('error', sass.logError))
        // 3. Autoprefix css for cross browser compatibility
        .pipe(autoprefixer())
        // 4. where do I save the compiled css
        .pipe(gulp.dest(destFolder))
});


//JS minify
var order = require("gulp-order");
var sourcemaps = require("gulp-sourcemaps");
var babel = require("gulp-babel");
var uglify = require('gulp-uglify');
var remember = require('gulp-remember');
var cached = require('gulp-cached');
var jsFolder = [
    'src/wp-content/themes/' + nameFolderTheme + '/assets/lib/**/*.js',
    'src/wp-content/themes/' + nameFolderTheme + '/assets/js/**/*.js',
];

gulp.task('js', function () {
    return gulp.src(jsFolder)
        .pipe(order([
            "jquery/jquery.min.js",
            "gsap/*.js",
            "barba/*.js",
            "bootstrap/*.js",
            "splide/*.js",
            "**/*.js"
        ]))
        .pipe(cached('babel is fun'))
        .pipe(babel())
        .pipe(remember('babel is fun'))
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(destFolder))
});

gulp.task('watch', gulp.series(function () {
    gulp.watch(sassFolder, gulp.series('sass'));
    gulp.watch(jsFolder, gulp.series('js'));
}));

gulp.task('default', gulp.series('watch'));