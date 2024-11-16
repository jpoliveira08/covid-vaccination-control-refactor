import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/vaccine/index.js',
                'resources/js/employee/index.js',
                'resources/js/employee/edit.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~fontawesome': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
            '~toastr': path.resolve(__dirname, 'node_modules/toastr'),
        }
    }
});
