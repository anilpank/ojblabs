var gulp = require('gulp');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');


var DESTJS = 'js/gen';
var DESTCSS = 'css/gen';


process.stdin.setMaxListeners(0);

gulp.task('build', ['copy-external-dependencies-js', 'minify-and-copy-js', 'minify-and-copy-css', 'copy-html']);

gulp.task('default', ['build', 'watch']);

gulp.task('somenew', ['minify-and-copy-js', 'minify-and-copy-css', 'copy-html']);

gulp.task('copy-external-dependencies-js', ['copy-angular-js','copy-angular-route']);

gulp.task('copy-angular-js', function() {
  return gulp.src('bower_components/angular/angular.min.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-x2js', function() {
	  return gulp.src('bower_components/x2js/xml2json.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-angular-x2js', function() {
	  return gulp.src('bower_components/angular-x2js/src/x2js.js').pipe(gulp.dest(DESTJS));
});


gulp.task('copy-ngFileUpload', function() {
	return gulp.src('bower_components/ng-file-upload/ng-file-upload.min.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-angular-route', function() {
	return gulp.src('bower_components/angular-route/angular-route.min.js').pipe(gulp.dest(DESTJS));
});


gulp.task('copy-angular-resource', function() {
	return gulp.src('bower_components/angular-resource/angular-resource.min.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-angular-busy', function() {
	return gulp.src('bower_components/angular-busy/dist/angular-busy.min.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-bootstrap-js', function() {
	return gulp.src('bower_components/bootstrap/dist/js/bootstrap.min.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-modal-service', function() {
	return gulp.src('bower_components/angular-modal-service/dst/angular-modal-service.min.js').pipe(gulp.dest(DESTJS));
});


gulp.task('copy-moment-js', function() {
	return gulp.src('bower_components/moment/min/moment.min.js').pipe(gulp.dest(DESTJS));
});


gulp.task('copy-bootstrap-datepicker-js', function() {
	return gulp.src('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js').pipe(gulp.dest(DESTJS));
});


gulp.task('copy-underscore.string', function() {
	return gulp.src('bower_components/underscore.string/dist/underscore.string.min.js').pipe(gulp.dest(DESTJS));
});

gulp.task('copy-bootstrap-fonts', function() {
	return gulp.src('bower_components/bootstrap/dist/fonts/*.*').pipe(gulp.dest(DESTFONTS));
});

gulp.task('copy-bootstrap-css', function() {
	return gulp.src('bower_components/bootstrap/dist/css/*.min.css').pipe(gulp.dest(DESTCSS));
});


gulp.task('copy-bootstrap-datepicker-css', function() {
	return gulp.src('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css').pipe(gulp.dest(DESTCSS));
});


gulp.task('copy-angular-busy-css', function() {
	return gulp.src('bower_components/angular-busy/dist/angular-busy.min.css').pipe(gulp.dest(DESTCSS));
});

gulp.task('copy-bootstrap-map', function() {
	return gulp.src('bower_components/bootstrap/dist/css/*.map').pipe(gulp.dest(DESTCSS));
});

gulp.task('copy-jquery-js', function() {
  return gulp.src('bower_components/jquery/dist/jquery.min.js').pipe(gulp.dest(DESTJS));
});



gulp.task('watch', function() {
    var watchFiles = [
        'ui/js/**/*.js',
        'ui/css/**/*.css',
		'ui/js/**/*.html'
    ];    
    gulp.watch(watchFiles, ['somenew']);    
});


gulp.task('copy-html', function() {
  return gulp.src('ui/js/**/*.html').pipe(gulp.dest(DESTJS));
});


gulp.task('minify-and-copy-js', function() {
  return gulp.src('ui/js/**/*.js')   
	.pipe(concat('e2mc.js'))
	//.pipe(uglify()) // This will minify js
    .pipe(gulp.dest(DESTJS));	
});

gulp.task('minify-and-copy-css', function() {
	return gulp.src('ui/css/**/*.css')
	//.pipe(minifyCss()) // This will minify css
	.pipe(rename({ extname: '.min.css' })) //adds min.css in the end
	.pipe(gulp.dest(DESTCSS));
});
