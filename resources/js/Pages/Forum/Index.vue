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
            <div class="post-container">
                <div v-for="post in posts" :key="post.id">
                    <div class="post-card flex">
                        <div class="upvote flex flex-col justify-between items-center">
                            <a class="up" href="javacript:void(0)">+</a>
                            <span class="mt-1">0</span>
                            <a class="down" href="javacript:void(0)">-</a>
                        </div>
                        <div class="content w-7/8 ml-6 w-full">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center justify-start">
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
                    <div class="replies ml-10 pl-10">
                        <div v-if="post.replies" v-for="reply in post.replies" :key="reply.id">
                            <div class="post-card flex">
                                <div class="upvote flex flex-col justify-between items-center">
                                    <a class="up" href="javacript:void(0)">+</a>
                                    <span class="mt-1">0</span>
                                    <a class="down" href="javacript:void(0)">-</a>
                                </div>
                                <div class="content w-7/8 ml-6 w-full">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center justify-start">
                                            <img class="avatar avatar-top w-1/5" :src="reply.user.profile_photo_url"
                                                alt="avatar" />
                                            <a class="w-3/8 flex-grow ml-3" href="#">
                                                {{ reply.user.name }}
                                            </a>
                                        </div>
                                        <a href="#" class="ml-3">Reply</a>
                                    </div>
                                    <p class="mb-4">
                                        {{ reply.reply }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-reply">
                        <div class="flex flex-row">
                            <div class="w-1/6">
                                <img class="avatar avatar-top" :src="$page.props.auth.user[0].profile_photo_url"
                                    alt="avatar" />
                            </div>
                            <textarea class="resize-none rounded-md w-4/6 mr-4" name="reply" id="reply"></textarea>
                            <div class="w-1/6">
                                <button type="submit" class="post-button w-full">Send</button>
                            </div>
                        </div>
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
    border-radius: 5px;
    padding: 10px 20px;
    text-transform: uppercase;
    font-size: 14px;
    transition: 0.2s all;

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
    font-weight: 600;
    transition: 0.2s all;

    &:hover,
    &:focus {
        color: $primary_hover;
    }
}

.post-container {
    max-width: 650px;
    margin: 0 auto;
}

.avatar {
    border-radius: 50%;
    object-fit: cover;
}

.avatar-main {
    height: 50px;
    width: 50px;
}

.avatar-top {
    height: 40px;
    width: 40px;
}

.post-card {
    background-color: $white;
    padding: 20px;
    border-radius: 10px;
    margin: 10px 0;
}

.replies {
    border-left: 1px solid #ccc;
}

.add-reply {
    background-color: $white;
    padding: 20px;
    border-radius: 10px;
    margin: 10px 0;

    textarea {
        width: 100%;
        border-color: #ccc;
    }
}

.upvote {
    background-color: $bodyBg;
    border-radius: 10px;
    padding: 2px 10px;

    span {
        color: $primary;
        font-weight: 800;
    }

    .up,
    .down {
        color: $primary_hover;
        font-size: 22px;

        &:hover,
        &:focus {
            color: $primary;
        }
    }
}
</style>
