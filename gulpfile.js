var gulp         = require('gulp')
var gulpif       = require('gulp-if')
var argv         = require('yargs').argv
var del          = require('del')
var sourcemaps   = require('gulp-sourcemaps')
var sequence     = require('run-sequence')
var eventStream  = require('event-stream')
var postMortem   = require('gulp-postmortem')
var file         = require('gulp-file')
var insert       = require('gulp-insert')
// css
var sass         = require('gulp-sass')
var autoprefixer = require('gulp-autoprefixer')
var cleancss     = require('gulp-clean-css')
// iconfont
var iconfont     = require('gulp-iconfont')
var iconfontCss  = require('gulp-iconfont-css')
// server
var browserSync  = require('browser-sync')
var mamp         = require('gulp-mamp')
// js
var concat       = require('gulp-concat')
var jshint       = require('gulp-jshint')
var uglify       = require('gulp-uglify')

// Check for --production flag
var isProduction = !!(argv.production)

// Check for module var
var moduleName = null
if (argv.mn) {
  moduleName = argv.mn
}

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['> 0.1%', 'last 4 versions', 'ie >= 9']

// Port to use for the development server.
var PORT = 3005

// File paths
var PATHS = {
  wordpress: 'wordpress',
  themeDest: 'wordpress/wp-content/themes/thomasblei',
  assets: [
    'src/**/*', // select all, doesn't select hidden files
    '!src/js',
    '!src/js/**/*',
    '!src/php',
    '!src/php/**/*',
    '!src/scss',
    '!src/scss/**/*',
    '!src/icons',
    '!src/icons/**/*'
  ],
  jsSrc: ['src/js/**/*', '!src/js/vendor/**/*'],
  jsVendorSrc: 'src/js/vendor/**/*',
  phpSrc: 'src/php/**/*.php',
  stylesSrc: 'src/scss/**/*.scss',
  iconFontSrc: 'src/icons/**/*.svg',
}

// MAMP Options
var mampOptions = {
  user: 'matthiasmartin',
  port: 8888,
  site_path: '/Users/matthiasmartin/Github/ThomasBlei/wordpress'
}

// Delete themeDest
gulp.task('clean', function () {
  return del([PATHS.themeDest, 'wordpress/.htaccess'])
})

// Copy files out of the assets folder
// This task skips over php and scss folders, which are parsed separately
gulp.task('copy', function () {
  var htaccessSrc = isProduction ? 'src/.htaccess' : 'src/dev/.htaccess'
  gulp.src(PATHS.assets)
    .pipe(gulp.dest(PATHS.themeDest))
  gulp.src(htaccessSrc)
    .pipe(gulp.dest(PATHS.wordpress))
  return;
})


// Copy php files out of the assets folder
gulp.task('copyPHP', function () {
  return gulp.src(PATHS.phpSrc)
    .pipe(gulp.dest(PATHS.themeDest))
})


// Combines, prefixes and cleans SCSS files to one CSS
gulp.task('styles', function () {
  var tempStyleSrc = PATHS.stylesSrc
  return gulp.src(tempStyleSrc)
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(autoprefixer({browsers: COMPATIBILITY}))
    .pipe(cleancss())
    .pipe(gulpif(!isProduction, sourcemaps.write()))
    .pipe(gulp.dest(PATHS.themeDest))
    .pipe(browserSync.stream())
})

// Combine and minify (in production) JavaScript
gulp.task('scripts', function () {
  var uglifyRun = gulpif(isProduction, uglify()
    .on('error', function (e) {
      console.log(e)
    }))

  var appFiles = gulp.src(PATHS.jsSrc)
    .pipe(jshint({}))
    .pipe(jshint.reporter('default'))

  var vendorFiles = gulp.src(PATHS.jsVendorSrc)

  return eventStream.concat(vendorFiles, appFiles)
    .pipe(sourcemaps.init())
    .pipe(concat('script.js'))
    .pipe(uglifyRun)
    .pipe(gulpif(!isProduction, sourcemaps.write()))
    .pipe(gulp.dest(PATHS.themeDest + '/js'))
})

// create server for live reload after build is completed
gulp.task('server', ['build'], function (cb) {
  if (!isProduction) {
    gulp.src('').pipe(postMortem({gulp: gulp, tasks: ['stop']}))
    mamp(mampOptions, 'start', cb)

    browserSync.init({
      proxy: 'localhost:8888',
      port: PORT,
      notify: false
    })

    // watch and reload
    gulp.watch(PATHS.stylesSrc, ['styles'])
    gulp.watch([PATHS.assets, PATHS.phpSrc, PATHS.jsSrc], ['reload'])
  }
})

// reload
gulp.task('reload', ['build'], function (done) {
  browserSync.reload()
  done()
})

gulp.task('stop', function (cb) {
  mamp(mampOptions, 'stop', cb)
})


// Build the "dist" folder by running all of the above tasks
gulp.task('build', function (done) {
  sequence('clean', ['copy', 'copyPHP', 'scripts', 'styles'], done)
})

// build and create server
gulp.task('default', ['server'])

gulp.task('set-mamp', function(cb) {
  mamp(mampOptions, 'config', cb);
})

// Icon Font Generation
gulp.task('iconfont', function () {
  gulp.src([PATHS.iconFontSrc])
    .pipe(iconfontCss({
      fontName: 'iconfont',
      path: 'src/scss/vendor/_icons.scss',
      targetPath: '../scss/vendor/_iconfont.scss',
      fontPath: 'fonts/'
    }))
    .pipe(iconfont({
      fontName: 'iconfont', // required
      prependUnicode: true,
      formats: ['ttf', 'eot', 'woff', 'woff2', 'svg'], // default, 'woff2' and 'svg' are available
      normalize: true
    }))
    .pipe(gulp.dest('src/fonts'))
})

// create Module
gulp.task('module', function() {
  if (moduleName) {
    file('_' + moduleName + '.scss', '.' + moduleName + ' {\n\n\n\n}', {src: true})
      .pipe(gulp.dest('src/scss/modules/'))
      
    file(moduleName + '.php', '<div class="' + moduleName + '">\n\n\n\n</div>', {src: true})
      .pipe(gulp.dest('src/php/modules/'))
      
    return gulp.src('src/scss/style.scss')
      .pipe(insert.append("@import 'modules/" + moduleName + "';\n"))
      .pipe(gulp.dest('src/scss/'))
  }
});


