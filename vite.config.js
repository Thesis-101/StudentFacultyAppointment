import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/vacant.js',
                'resources/js/student-side.js',
                'resources/js/request-list.js',
                'resources/js/appointment-list.js',
                'resources/js/notifications.js',
                'resources/js/history.js',
                'resources/js/admin.js',
                'resources/js/profileUpdate.js',
                'resources/js/jquery.table2excel.js',
                'resources/js/reports.js',
            ],
            refresh: true,
        }),
    ],
});
