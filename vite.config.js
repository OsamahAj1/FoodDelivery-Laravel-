import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'localhost',
        port: '8080',
        hmr: {
            host: 'localhost',
            port: '8080'
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                // javascript
                'resources/js/ClientApp.js',
                'resources/js/DeliveryApp.js',
                'resources/js/RestaurantApp.js',

                // styles
                'resources/css/ClientStyles.css',
                'resources/css/DeliveryStyles.css',
                'resources/css/RestaurantStyles.css'
            ],
            refresh: true,
        }),
    ],
});
