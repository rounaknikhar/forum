<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import { onMounted } from 'vue'
import { Collapse } from 'flowbite'

defineProps({ posts: Object });

const replyForm = useForm({
    reply: null,
    user_id: null,
    post_id: null,
})

onMounted(() => {
    // set the target element that will be collapsed or expanded (eg. navbar menu)
    const $targetEl = document.getElementById('targetEl');

    // optionally set a trigger element (eg. a button, hamburger icon)
    const $triggerEl = document.getElementById('triggerEl');

    // optional options with default values and callback functions
    const options = {
        onCollapse: () => {
            console.log('element has been collapsed')
        },
        onExpand: () => {
            console.log('element has been expanded')
        },
        onToggle: () => {
            console.log('element has been toggled')
        }
    };

    if ($targetEl) {
        /*
        * targetEl: required
        * options: optional
        */
        const collapse = new Collapse($targetEl, $triggerEl, options);

        // show the target element
        collapse.expand();
    }
})

</script>
<template>
    <AppLayout title="Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="main">
            <!-- session message -->
            <p v-if="$page.props.flash.message">
                {{ $page.props.flash.message }}
            </p>
            <div class="post-container">
                <div v-for="post in  posts " :key="post.id">
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
                                <a href="javascript:void(0)" id="triggerEl" aria-expanded="false" class="ml-3">Reply</a>
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
                    <form @submit.prevent="replyForm.post(route('replies.store'))" :id="'target-' + post.id" class="hidden">
                        <input type="hidden" name="user_id" :value="$page.props.auth.user[0].id">
                        <input type="hidden" name="post_id" :value="post.id">
                        <div class="add-reply">
                            <div class="flex flex-row">
                                <div class="w-1/6">
                                    <img class="avatar avatar-top" :src="$page.props.auth.user[0].profile_photo_url"
                                        alt="avatar" />
                                </div>
                                <div class="text-area-container w-4/6 mr-4">
                                    <textarea class="resize-none rounded-md" name="reply" id="reply"></textarea>
                                    <div v-if="replyForm.errors.reply" class="alert text-error alert-error alert-inline">
                                        <span class="error-text">{{ replyForm.errors.reply }}</span>
                                    </div>
                                </div>
                                <div class="w-1/6">
                                    <button type="submit" class="post-button w-full">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

.error-border {
    border-color: rgb(255, 75, 43);
}

.error-text {
    color: rgb(255, 75, 43);
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
