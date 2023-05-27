import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue"

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/css/custom.css', 'public/js/TestVue.js'], // 'resources/css/app.css', 'resources/js/app.js'
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler"
        }
    }
});
