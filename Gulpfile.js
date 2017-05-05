'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var plugins = require('gulp-load-plugins')();


gulp.task('less_dev', function () {
	gulp.src('www/styles/styles.less')
		.pipe(plugins.plumber())
		//.pipe(plugins.sourcemaps.init())
		.pipe(plugins.less())
		//.pipe(plugins.sourcemaps.write("./"))
		.on('error', gutil.log)
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest('www/styles'));
});

gulp.task('less_dev_print', function () {
	gulp.src('www/styles/print.less')
		.pipe(plugins.plumber())
		//.pipe(plugins.sourcemaps.init())
		.pipe(plugins.less())
		//.pipe(plugins.sourcemaps.write("./"))
		.on('error', gutil.log)
		.pipe(plugins.plumber.stop())
		.pipe(gulp.dest('www/styles'));
});

gulp.task('watch', function () {
	gulp.watch('www/styles/**/*.less', ['less_dev', 'less_dev_print']);
});

