"use strict";

/* main modules are stored here: */
const modulesPath = "./node_modules/";

/** Uses the following libraries
    autoprefixer      : "6.7.7"
    browser-sync      : "2.18.8"
    gulp              : "3.9.1"
    gulp-sass         : "3.1.0"
    gulp-util         : "3.0.8"
    gulp-postcss      : "6.4.0"
    gulp-jshint       : "2.0.4"
    jshint-stylish    : "2.2.1"
    gulp-imagemin     : "3.2.0"
    gulp-newer        : "1.3.0"
*/

// Gulp and plugins
const gulp = require("gulp"), // still have to run npm install for gulp
    gutil = require("gulp-util"),
    params = require("yargs").argv,
    sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    browserSync = require("browser-sync").create(),
    jshint = require("gulp-jshint"),
    imagemin = require("gulp-imagemin"),
    newer = require("gulp-newer");


/* src paths */
const _src_ = {
    js: "js/scripts.js",
    sass: "sass/**/*.scss",
    images: "images/*",
};


/* Image Minification */

gulp.task("imagemin", function() {
    gulp.src('images/*')
        .pipe(imagemin(
            [
                imagemin.gifsicle({interlaced: true}),
                imagemin.mozjpeg({quality: 90, progressive: true}),
                imagemin.optipng({optimizationLevel: 5}),
                imagemin.svgo({
                    plugins: [
                        {removeViewBox: true},
                        {cleanupIDs: false}
                    ]
                })
            ]))
        .pipe(gulp.dest('images/optimized'))
});


/* BrowserSync */
gulp.task("browser-sync", function () {
    browserSync.init({
        ui: false,
        // port        : myPort,
        files: ["*.php", "**/*.js"],
        // files: ['**/*.php', '**/*.js'],
        
        host: "http://stevenbyersdds.local/",
        open: false,
        notify: false,
        ghostMode: false,
        // socket: {
        //     domain: myHost +":"+ myPort
        // }
    });
});

/* JS Hint */
gulp.task("jshint", function () {
    return gulp
        .src(_src_.js)
        .pipe(jshint())
        .pipe(jshint.reporter("jshint-stylish"))
        .pipe(browserSync.reload({ stream: true }));
});

/* Styling */
gulp.task("sass", function () {
    return gulp
        .src(_src_.sass)
        .pipe(sass({ outputStyle: "expanded" }).on("error", sass.logError))
        .pipe(
            postcss([
                autoprefixer(
                    "last 2 version",
                    "safari 5",
                    "ie 8",
                    "ie 9",
                    "opera 12.1"
                ),
            ])
        )
        .pipe(gulp.dest("./"))
        .pipe(browserSync.reload({ stream: true }));
});

/* Watch */
gulp.task("watch", ["browser-sync", "sass"], function () {
    gulp.watch(_src_.sass, ["sass"]).on("change", function (event) {
        console.log(
            "File " + event.path + " was " + event.type + ", running tasks..."
        );
    });
    gulp.watch(_src_.js, ["jshint"]).on("change", function (event) {
        console.log(
            "File " + event.path + " was " + event.type + ", running tasks...");
    });
});
