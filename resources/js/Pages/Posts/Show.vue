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
                           
                            <div class="ml-3 flex justify-between w-full ">
                                <div>
                                <h3 class="text-base font-medium text-gray-900">
                                    {{ comment.comment}}
                                </h3>
                                <span class="text-sm text-gray-700">{{ comment.created_at }}</span>
                                </div>
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-green-400 hover:bg-green-700 h-fit text-white font-bold py-2 px-4 rounded text-center mt-1">
                                    edit
                                </button>
                                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Comment
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <input type="text" v-model="form.comment" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                </div>
                <button @click="update(id)" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Update
                </button>
            </form>
        </div>
    </div>
</div> 
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
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});

const user = ref(usePage().props.auth.user);
const props = defineProps({
    post: Object,
});


const form = useForm({
    comment: "",
    post_id: props.post.id,
});
const updateForm = useForm({
    comment: "",
    _method: "put",
})
const store = () => {
    form.post(route("comments.store"), {
        preserveScroll: true,
        onSuccess: () => form.reset("comment"),
    });
};
const update = (id) => {
    updateForm.put(route("comments.update", id),{onSuccess: () => alert("comment updated")});
};
</script>

<style></style>
