import './bootstrap';
import '../css/app.css';
import './main';

import { createApp, h, reactive } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { i18n } from './Plugins/i18n';
import { TOASTIFYOPTIONS } from './Plugins/toastify';
import VueSweetalert2 from 'vue-sweetalert2';
import Vue3Toastify from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import 'sweetalert2/dist/sweetalert2.min.css';

const appName = import.meta.env.VITE_APP_NAME || 'Practice App';

const global = reactive({
    isLoading: false
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Vue3Toastify, TOASTIFYOPTIONS)
            .use(VueSweetalert2)
            .use(i18n)
            .provide('globalVar', global) // Global var for all vue components
            .mount(el);
    },
    progress: {
        delay: 250,
        color: '#4B5563',
        includeCSS: true,
        showSpinner: true,
    },
});