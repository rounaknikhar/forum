<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
defineProps({ posts: Object });
</script>
<template>
    <AppLayout title="Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>
        <!-- session message -->
        <p v-if="$page.props.flash.message">
            {{ $page.props.flash.message }}
        </p>

        <div class="main">
            <!-- <pre>
            {{ posts }}
        </pre> -->
            <div class="post-container">
                <div v-for="post in posts" :key="post.id">
                    <div class="post-card flex">
                        <div class="upvote">
                            + 1 -
                        </div>
                        <div class="content w-7/8 ml-5 w-full">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center justify-start mb-4">
                                    <img class="avatar avatar-top w-1/5" :src="post.user.profile_photo_url" alt="avatar" />
                                    <a class="w-3/8 flex-grow ml-3" href="#">
                                        {{ post.user.name }}
                                    </a>
                                </div>
                                <a href="#" class="ml-3">Reply</a>
                            </div>
                            <p class="mb-4">
                                {{ post.post }}
                            </p>
                        </div>
                    </div>
                    <div class="add-reply">
                        <textarea name="reply" id="reply" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style lang="scss" scoped>
$primary : #5358b6;
$primary_hover : #c4c6ef;
$bodyBg : #f5f6fa;
$titleText : #474e54;
$white : #ffffff;
$text : #696f76;

.main {
    background-color: $bodyBg;
}

.post-button {
    background-color: $primary;
    color: $white;
    border-radius: 20px;
    padding: 20px 10px;
    transition: 0.3s all;

    &:hover,
    &:focus {
        background-color: $primary_hover;
    }
}

p {
    color: $text;
}

a {
    color: $primary;
    text-decoration: none;
    transition: 0.3s all;

    &:hover,
    &:focus {
        color: $primary_hover;
    }
}

.post-container {
    max-width: 650px;
    margin: 0 auto;

    .content {
        .avatar {
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-main {
            height: 50px;
            width: 50px;
        }

        .avatar-top {
            height: 30px;
            width: 30px;
        }
    }
}

.post-card {
    background-color: $white;
    padding: 20px;
    border-radius: 10px;
    margin: 10px 0;
}
</style>