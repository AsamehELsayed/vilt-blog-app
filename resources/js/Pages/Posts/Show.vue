<template>
    <UserLayout>
        <div class="container mx-auto py-10 rounded-sm mb-5">
            <div
                class="card mx-auto max-w-2xl shadow-lg rounded-2xl border p-3"
            >
                <div class="card-body">
                    <div class="flex  justify-between w-full">
                        <div class="">
                        <h2 class="text-2xl font-bold">{{ post.title }}</h2>
                        <h3 class="mb-6">Author: {{ post.user.name }}</h3>
                        </div>
                        <Link v-if="user.id == post.user_id" :href="route('posts.edit', post.id)" class="bg-green-400 hover:bg-green-700 h-fit text-white font-bold py-2 px-4 rounded text-center"> edit post</Link>
                    </div>
                    <p class="mb-6 text-gray-700">{{ post.content }}</p>
                    
                    <img
                        :src="post.image"
                        alt="post image"
                        class="w-full mb-6 rounded-lg shadow-md"
                    />
                </div>
            </div>
            <div class="card mx-auto mt-10 max-w-2xl shadow-lg rounded-2xl p-3">
                <div class="card-header">
                    <h2 class="text-xl font-bold mb-6">Comments</h2>
                </div>
                <div class="card-body">
                    <div class="mb-6">
                        <div class="flex items-center mb-2" v-for="comment in post.comments" :key="comment.id">
                           
                            <div class="ml-3">
                                <h3 class="text-base font-medium text-gray-900">
                                    {{ comment.comment}}
                                </h3>
                                <span class="text-sm text-gray-700">{{ comment.created_at }}</span>
                            </div>
                        </div>
                        <p class="text-gray-700">
                           
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="card mx-auto mt-10 max-w-2xl shadow-lg rounded-2xl p-3 mb-5"
        >
            <div class="card-header">
                <h2 class="text-xl font-bold mb-6">Leave a Comment</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="store">
                    <div class="mb-6">
                        <label
                            for="content"
                            class="block text-sm font-medium text-gray-900"
                            >Comment</label
                        >
                        <textarea
                            v-model="form.comment"
                            name="comment"
                            id="comment"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            rows="4"
                        ></textarea>
                    </div>
                    <div class="mb-6">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                        >
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </UserLayout>
</template>

<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import {  useForm , usePage } from "@inertiajs/vue3";
const user = ref(usePage().props.auth.user);
const props = defineProps({
    post: Object,
});


const form = useForm({
    comment: "",
    post_id: props.post.id,
});
const store = () => {
    form.post(route("comments.store"), {
        preserveScroll: true,
        onSuccess: () => form.reset("comment"),
    });
};
</script>

<style></style>
