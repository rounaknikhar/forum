<script setup>
defineProps({ data: Object });
</script>
<template>
    <div class="post-card flex">
        <!-- TODO <div class="upvote flex flex-col justify-between items-center">
            <a class="up" href="javacript:void(0)">+</a>
            <span class="mt-1">0</span>
            <a class="down" href="javacript:void(0)">-</a>
        </div>
        <div class="content w-7/8 ml-6 w-full">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center justify-start">
                    <img class="avatar avatar-top w-1/5" :src="data.profile_photo_url" alt="avatar" />
                    <a class="w-3/8 flex-grow ml-3" href="#">
                        {{ data.name }}
                    </a>
                </div>
                <a href="#" class="ml-3">Reply</a>
            </div>
            <p class="mb-4">
                {{ data.post }}
            </p>
        </div>

        <slot /> -->
    </div>
</template>