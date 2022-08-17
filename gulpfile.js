const { watch, src, series , dest} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const replace = require('gulp-replace');
const sourcemaps = require('gulp-sourcemaps');
const zip = require('gulp-zip');
const gulp = require("gulp");
const yargs = require('yargs');
const cssbeautify = require('gulp-beautify');
const gulpif = require("gulp-if");
const cleanCSS = require("gulp-clean-css");
const PRODUCTION = yargs.argv.prod;
var rename = require("gulp-rename");

const paths = {
    styles: {
        src : ['assets/scss/**/*.scss', 'assets/scss/wpd-style.scss', 'assets/scss/shop.scss', 'assets/scss/responsive.scss',],
        dest: 'assets/css'
    },
    images: {
        src : 'assets/images/**/*.{jpg,jpeg,png,svg,gif}',
        dest: 'assets/images'
    },
    scripts: {
        src : ['assets/js/bundle.js', 'assets/js/admin.js', 'assets/js/customize-preview.js'],
        dest: 'assets/js'
    },
    package: {
        src : ['**/*', '!node_modules{,/**}', '!src{,/**}', '!packaged{,/**}'],
        dest: 'packaged'
    }
};

function compress () {
    return src(paths.package.src)
        .pipe(replace('saasland', 'saasland'))
        .pipe(replace('SAASLAND', 'SAASLAND'))
        .pipe(replace('Saasland', 'Saasland'))
        .pipe(zip(`saasland.zip`))
        .pipe(dest(paths.package.dest))
}

function buildStyles() {
    return gulp.src(paths.styles.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS()))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(gulp.dest(paths.styles.dest))
}

function buildStyles_pd() {
    return gulp.src(paths.styles.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS()))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(cleanCSS())
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest(paths.styles.dest));
}

exports.buildStyles = buildStyles;
exports.compress = compress;
exports.buildStyles_pd = buildStyles_pd;

function watchTask () {
    watch(paths.styles.src, buildStyles);
    watch(paths.styles.src, buildStyles_pd);
}
exports.default = series(buildStyles, buildStyles_pd, watchTask);