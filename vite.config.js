import { defineConfig, loadEnv } from 'vite';
import vue from '@vitejs/plugin-vue';
import fs from 'node:fs';
import path from 'node:path';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    return {
        base: process.env.NETLIFY ? '/' : '/build/',
        publicDir: 'frontend/static',
        plugins: [vue(), {
            name: 'icare-spa-redirects',
            closeBundle() {
                fs.writeFileSync('public/build/_redirects', '/templates/* /templates/:splat 200\n/* /index.html 200\n');
            },
        }],
        build: { outDir: 'public/build', emptyOutDir: true, sourcemap: true, manifest: 'manifest.json' },
        server: { proxy: { '/api': { target: env.APP_URL || 'http://localhost:8080', changeOrigin: true } } },
        resolve: { alias: { '@': path.resolve('resources/js') } },
    };
});
