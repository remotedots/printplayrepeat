var gulp = require('gulp'),
		cleancss = require('gulp-clean-css'),
		concat = require('gulp-concat'),
		uglify = require('gulp-uglify'),
		watch = require('gulp-watch'),
		browserSync = require('browser-sync').create();

gulp.task('minify-css', function() {
	return gulp.src('css/*.css')
		.pipe(cleancss({compatibility: 'ie8'}))
		.pipe(gulp.dest('dist'))
		.pipe(browserSync.stream());
});

gulp.task('minify-js', function() {
	return gulp.src('js/*.js')
		.pipe(concat('script.js'))
		.pipe(uglify())
		.pipe(gulp.dest('dist'))
		.pipe(browserSync.stream());
});

gulp.task('browserSync', function() {
	browserSync.init({
		open:'external',
		proxy: 'http://printplayrepeat.localhost',
		port: 8080,
	});
});

gulp.task('watch', function() {
	gulp.watch('css/*.css', gulp.series('minify-css'));
	gulp.watch('js/*.js', gulp.series('minify-js'));
	gulp.watch('*.html').on('change', browserSync.reload);
});

gulp.task('default', gulp.parallel('browserSync', 'watch'));
