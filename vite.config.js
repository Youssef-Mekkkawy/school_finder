import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/login.css',
                'resources/js/app.js',
                'resources/js/api.js',
                'resources/js/login.js',
                'resources/js/helpers.js',
                'resources/js/bootstrap.js',
            ],
            refresh: true,
        }),
    ],
});
