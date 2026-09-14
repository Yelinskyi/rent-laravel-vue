<template>
    <div>
        <ListingAddress :listing="listing"/>
    </div>
</template>

<script setup>
import ListingAddress from "../../Layouts/Components/ListingAddress.vue";

defineProps({
    listing: Object
})
</script>
