var gulp = require('gulp'),
    spritesmith = require('gulp-spritesmith');

gulp.task('sprite', function() {
    var spriteData = 
        gulp.src('img/*.png') 
            .pipe(spritesmith({
                imgName: 'sprite.png',
                cssName: 'sprite.css',
                engine: 'pngsmith'
            }));
    spriteData.pipe(gulp.dest('img/'));
    //spriteData.img.pipe(gulp.dest('img/')); 
    //spriteData.css.pipe(gulp.dest('css/')); 

});

gulp.task('watch', function() {
    gulp.watch('img/*.*', ['sprite'])
});
