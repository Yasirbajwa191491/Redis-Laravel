import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        // Include Font Awesome CSS file
        preprocessorOptions: {
            scss: {
                additionalData: `@import "@fortawesome/fontawesome-free/css/all.css";`
            }
        }
    }
});
