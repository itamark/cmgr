// Install deps:
// npm install -g gulp bower less
// npm install


var gulp = require('gulp');
var gutil = require('gulp-util');
var plugins = require("gulp-load-plugins")({lazy: false});
var gconf = require('./gulpconfig.json');

/**
 * Minify and copy all scripts to build path.
 *
 * @return {[type]} [description]
 */
gulp.task('scripts', function() {
    // Minify and copy all JavaScript (except vendor script)
    for (var outputFile in gconf.scripts) {
        console.log('creating '+outputFile+'...');

        gulp.src(gconf.scripts[outputFile].files)
        .pipe(plugins.concat(outputFile))
        // .pipe(plugins.uglify())
        .pipe(gulp.dest(gconf.build_path+gconf.scripts[outputFile].output_path));
    }
    return;
});

gulp.task('styles', function() {
    // Minify and copy all Styles

    for (var outputFile in gconf.stylesheets) {
        console.log('creating '+outputFile+'...');

        gulp.src(gconf.stylesheets[outputFile].files)
        .pipe(plugins.cached(outputFile))
        .pipe(plugins.less({   
            gconf: ".",
            sourceMap: false, // turned off for speed
            compress: false
        }).on('error', gutil.log))
        // .pipe(plugins.minifyCss())
        .pipe(plugins.concat(outputFile))
        .pipe(gulp.dest(gconf.build_path+gconf.stylesheets[outputFile].output_path))
        .pipe(plugins.connect.reload());
    }

    return;
});

// Optimize and copy all static images
gulp.task('images', function() {

    for (var outputPath in gconf.images) {
        console.log('compressing images to '+outputPath+'...');

        gulp.src(gconf.images[outputPath].files)
        .pipe(plugins.imagemin(gconf.images[outputPath].options))
        .pipe(gulp.dest(gconf.build_path+outputPath))
        .pipe(plugins.connect.reload());
    }

    return;
});

// Copy any other static files
gulp.task('dupe', function() {

    for (var outputPath in gconf.duplicate) {
        console.log('copying '+outputPath+' directory...');

        gulp.src(gconf.duplicate[outputPath].files)
        .pipe(gulp.dest(gconf.build_path+outputPath));
    }

    return;
});

/* gulp.task('server', function() {
    plugins.connect.server({
        root: gconf.build_path,
        port: '8080',
        livereload: true
    });
}); */

// Rerun the task when a file changes
gulp.task('watch', ['default'], function () {
    try {
        require.resolve("gulp-cached");
    } catch(e) {
        console.error("Some NPM modules are not installed. Please make sure to run `npm update` to install them.");
        process.exit(e.code);
    }

    gulp.watch("app/webroot/src/js/**/*", ['scripts']);
    gulp.watch("app/webroot/src/less/**/*", ['styles']);
    gulp.watch("app/webroot/src/img/**/*", ['images']); 
});



// The default task (called when you run `gulp` from cli)
gulp.task('default', [
    'scripts',
    'styles',
    'images',
    'dupe'
    //'views'
]);
