# include gulp
gulp           = require("gulp")

# include our plugins
sass           = require("gulp-sass")
shell          = require("gulp-shell")
plumber        = require("gulp-plumber")
notify         = require("gulp-notify")
minifycss      = require("gulp-minify-css")
autoprefixer   = require("gulp-autoprefixer")
concat         = require("gulp-concat")
rename         = require("gulp-rename")
uglify         = require("gulp-uglify")
coffee         = require("gulp-coffee")
clean          = require("gulp-clean")
gulpStripDebug = require("gulp-strip-debug")
lr             = require("tiny-lr")
livereload     = require("gulp-livereload")
server         = lr()

# paths
src          = "src"
dest         = "../public/assets"

#
#	 gulp tasks
#	 ==========================================================================


# clean
gulp.task "clean", ->
	gulp.src [
		dest + "/scripts/*.*"
		dest + "/styles/*.*"
		dest + "/images/*.*"
		dest + "*.html"
	]
	.pipe clean()

# copy vendor scripts
gulp.task "copy", ->
	gulp.src [
		"bower_components/jquery/dist/jquery.js"
		"bower_components/modernizr/modernizr.js"
		"bower_components/detectizr/dist/detectizr.js"
	]
	.pipe uglify()
	.pipe gulp.dest dest + "/scripts"

# coffee
gulp.task "coffee", ->
	gulp.src src + "/scripts/**/*.coffee"
	.pipe coffee
		bare: true
	.pipe concat("scripts.js")
	.pipe gulp.dest dest + "/scripts"
	.pipe livereload(server)

# scripts
gulp.task "scripts",["coffee"], ->
	gulp.src [
		"bower_components/datatables/media/js/jquery.dataTables.js"
		"bower_components/datatables-tabletools/js/dataTables.tableTools.js"
		dest + "/scripts/scripts.js"
	]
	.pipe concat "scripts.js"
	.pipe gulp.dest dest + "/scripts"

# scripts-dist
gulp.task "scripts-dist",["coffee"], ->
	gulp.src [
		dest + "/scripts/scripts.js"
	]
	.pipe concat "scripts.js"
	.pipe gulpStripDebug()
	.pipe uglify()
	.pipe gulp.dest dest + "/scripts"

# styles
gulp.task "styles", ->
	gulp.src src + "/styles/styles.scss"
	.pipe plumber()
	.pipe sass
		sourceComments: "normal"
		errLogToConsole: false
		onError: (err) -> notify().write(err)
	.pipe autoprefixer("last 15 version")
	.pipe gulp.dest dest + "/styles"
	.pipe livereload(server)

# styles-dist
gulp.task "styles-dist",  ->
	gulp.src src + "/styles/styles.scss"
	.pipe plumber()
	.pipe sass()
	.on "error", notify.onError()
	.on "error", (err) ->
		console.log "Error:", err
	.pipe autoprefixer("last 15 version")
	.pipe minifycss
		keepSpecialComments: 0
	.pipe gulp.dest dest + "/styles"

gulp.task 'watch', ->
	gulp.watch [src + '/scripts/**/*.coffee'], ['scripts']
	gulp.watch [src + '/styles/**/*.scss'], ['styles']
	# gulp.watch [src + '/templates/**/*.hbs'], ['assemble']
	# gulp.watch [src + "/vendor/scripts/plugins/*.js"], ['scripts']

#
#  main tasks
#	 ==========================================================================

# default task
gulp.task 'default', [
	"copy"
	"styles"
	"scripts"
	"watch"
]

# build task
gulp.task 'dist', [

]


