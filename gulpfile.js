const gulp = require('gulp');
const connect = require('gulp-connect-php');
const sync = require('browser-sync');

gulp.task('connect-sync', () => {
    connect.server({}, () => {
        sync({
            proxy: '127.0.0.1:8000'
        });
    });
    gulp.watch('**/*.php').on('change', () => {
        sync.reload();
    });
});

gulp.task('default', ['connect']);