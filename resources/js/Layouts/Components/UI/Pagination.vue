<template>
    <div class="flex gap-1">
        <template v-for="(link, index) in links" :key="index">
            <!-- Disabled pagination link -->
            <span
                v-if="!link.url"
                class="py-2 px-4 rounded-md text-gray-400 cursor-not-allowed"
                v-html="link.label"
            />
            <!-- Active or navigable pagination link -->
            <Link
                v-else
                :href="link.url"
                class="py-2 px-4 rounded-md"
                :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active}"
                v-html="link.label"
                preserve-scroll
            />
        </template>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({links: Array})
</script>
