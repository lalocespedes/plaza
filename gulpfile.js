var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

gulp.task('styles', function(){

	return gulp.src([
		'./assets/styles/app.scss'
	])
	.pipe(sass({
		includePaths:[
			'./bower_components/foundation/scss'
		]
	}))
	.pipe(concat('app.css'))
	.pipe(gulp.dest('./public/css'));

});

gulp.task('scripts', function() {

	gulp.src([
		'./bower_components/jquery/dist/jquery.js',
		'./bower_components/foundation/js/foundation.js',
		'./bower_components/foundation/js/foundation.alert.js',
		'./assets/scripts/app.js'
	])
	.pipe(concat('app.js'))
	.pipe(gulp.dest('./public/js'));

	return gulp.src('./bower_components/modernizr/modernizr.js')
		.pipe(gulp.dest('./public/js'));

});

gulp.task('watch', function(){
	gulp.wath('./assets/styles/**/*.scss', ['styles']);
	gulp.wath('./assets/scripts/**/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);