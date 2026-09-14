<template>
    <Link :href="route('listing.index')">Listings</Link>&nbsp;
    <Link :href="route('listing.create')">New Listing</Link>
    <!--    <div>The page with time {{ timer }}</div>-->
    <div v-if="flashSuccess"
         class="success"
    >
        {{ flashSuccess }}
    </div>
    <slot>Default value</slot>
</template>

<script setup>
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/vue3";

//page.props.flash.success
const page = usePage()
const flashSuccess = computed(
    () => page.props.flash.success
)
// import {ref} from 'vue'
// const timer = ref(0)
// setInterval(() => timer.value++, 1000)
</script>

<style scoped>
.success {
    background-color: green;
    color: white
}
</style>
