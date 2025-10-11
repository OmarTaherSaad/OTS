import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { readFileSync } from 'fs';
import { resolve } from 'path';

// Read Laravel's .env file to get APP_URL
function getLaravelAppUrl() {
    try {
        const envPath = resolve(process.cwd(), '.env');
        const envContent = readFileSync(envPath, 'utf8');
        const appUrlMatch = envContent.match(/^APP_URL=(.+)$/m);
        if (!appUrlMatch) {
            throw new Error('APP_URL not found in .env file');
        }
        return appUrlMatch[1].trim();
    } catch (error) {
        console.error('Could not read APP_URL from .env file:', error.message);
        process.exit(1);
    }
}

export default defineConfig(({ command }) => {
    // Read APP_URL from .env file - no hardcoded fallback
    const appUrl = getLaravelAppUrl();
    console.log('Using Laravel APP_URL:', appUrl);

    const url = new URL(appUrl);
    const host = url.hostname;
    const protocol = url.protocol === 'https:' ? 'https' : 'http';

    return {
        plugins: [
            laravel({
                input: [
                    'resources/sass/app.scss',
                    'resources/sass/splashscreen.scss',
                    'resources/sass/home.scss',
                    'resources/sass/forms.scss',
                    'resources/sass/about.scss',
                    'resources/sass/bootstrapAR.scss',
                    'resources/sass/sidebar.scss',
                    'resources/js/app.js',
                    'resources/js/home.js',
                    'resources/js/skills.js',
                    'resources/js/forms.js',
                    'resources/js/entrance-card-scanner.js',
                    'resources/js/about.js',
                    'resources/js/physicsClasses.js',
                ],
                refresh: true,
            }),
            vue(),
        ],
        resolve: {
            alias: {
                '~': '/node_modules'
            }
        },
        // No dev server configuration - build only
        build: {
            rollupOptions: {
                external: (id) => {
                    // Don't externalize these modules
                    return false;
                }
            }
        }
    };
});
