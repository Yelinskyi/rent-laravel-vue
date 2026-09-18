<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
        <Box v-for="listing in listings"
             :key="listing.id"
        >
            <div>
                <Link :href="route('listing.show', {listing: listing.id})">
                    <Price :price="listing.price" class="text-2xl font-bold"></Price>
                    <ListingSpace :listing="listing" class="text-lg"/>
                    <ListingAddress :listing="listing" class="text-gray-500"/>
                </Link>
                <div>
                    <Link :href="route('listing.edit', {listing: listing.id})" as="button">Edit</Link>
                </div>
                <div>
                    <Link :href="route('listing.destroy', {listing: listing.id})" method="delete" as="button">Delete
                    </Link>
                </div>
            </div>
        </Box>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import ListingAddress from "../../Layouts/Components/ListingAddress.vue";
import Box from "../../Layouts/Components/UI/Box.vue";
import ListingSpace from "../../Layouts/Components/ListingSpace.vue";
import Price from "../../Layouts/Components/Price.vue";

defineProps({
    listings: Array,
})
</script>
