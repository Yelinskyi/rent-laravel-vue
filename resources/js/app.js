import {createInertiaApp} from '@inertiajs/vue3'
import MainLayout from "./Layouts/MainLayout.vue";

createInertiaApp(
    // Set a default persistent layout
    {
        resolve: (name) => {
            const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
            let page = pages[`./Pages/${name}.vue`]
            page.default.layout = page.default.layout || MainLayout
            return page
        },
    }
)
