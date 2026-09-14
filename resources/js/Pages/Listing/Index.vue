<template>
    <div v-for="listing in listings"
         :key="listing.id"
    >
        <div>
            <Link :href="route('listing.show', {listing: listing.id})">
                <ListingAddress :listing="listing"/>
            </Link>
            <div>
                <Link :href="route('listing.edit', {listing: listing.id})" as="button">Edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', {listing: listing.id})" method="delete" as="button">Delete</Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import ListingAddress from "../../Layouts/Components/ListingAddress.vue";

defineProps({
    listings: Array,
})
</script>
