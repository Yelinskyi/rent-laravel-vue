import '../css/app.css';

import {createInertiaApp} from '@inertiajs/vue3'
import MainLayout from "./Layouts/MainLayout.vue";
import {createApp, h} from 'vue'
import {ZiggyVue} from "ziggy-js";

createInertiaApp(
    // Set a default persistent layout
    {
        resolve: (name) => {
            const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
            let page = pages[`./Pages/${name}.vue`]
            page.default.layout = page.default.layout || MainLayout
            return page
        },

        setup({el, App, props, plugin}) {
            createApp({render: () => h(App, props)})
                .use(plugin)
                .use(ZiggyVue)
                .mount(el)
        },
    }
)
