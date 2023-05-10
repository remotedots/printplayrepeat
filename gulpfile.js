import gulp from "gulp";
import gulpSass from "gulp-sass";
import nodeSass from "node-sass";
import babel from "gulp-babel";
import concat from "gulp-concat";
import cleanCSS from "gulp-clean-css";
import uglify from "gulp-uglify";
import rename from "gulp-rename";
import connect from "gulp-connect-php";
import { deleteAsync } from "del";
import webpack from "webpack-stream";
import { webpackConfig } from "./webpack.config.js";
import browserSync from "browser-sync";

const sass = gulpSass(nodeSass);

function css() {
  return gulp
    .src("scss/**/*.scss")
    .pipe(sass())
    .pipe(concat("style.css"))
    .pipe(cleanCSS({ compatibility: "ie8" }))
    .pipe(gulp.dest("css"));
}

function js() {
  // return gulp.src("src/js/*.js").pipe(webpack(webpackConfig)).pipe(uglify()).pipe(gulp.dest("dist/js"));
}

function clean() {
  return deleteAsync("css/");
}

function watchdev() {
  browserSync({
    proxy: "printplayrepeat.localhost",
    port: 8080,
    open: true,
    notify: true
  });

  gulp.watch("*/**/*.html").on("change", gulp.series(browserSync.reload));
  gulp.watch("*/**/*.php").on("change", gulp.series(browserSync.reload));
  gulp.watch("scss/**/*.scss").on("change", gulp.series("css", browserSync.reload));
  gulp.watch("js/*.js").on("change", gulp.series("js", browserSync.reload));
}

const build = gulp.series(clean, gulp.parallel(css, js));

export { clean, css, js, watchdev, build };
