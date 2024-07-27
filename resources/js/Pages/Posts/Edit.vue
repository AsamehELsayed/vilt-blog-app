<template>
    <Userlayout>
        <div class="max-w-6xl mx-auto w-full py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0 flex w-full flex-col">
                <h1 class="text-2xl font-semibold text-gray-900">New Post</h1>
                <form
                    class="mt-6 flex flex-col w-full sm:gap-x-8"
                    @submit.prevent="update"
                >
                    <div>
                        <label
                            for="title"
                            class="block text-sm font-medium text-gray-700"
                            >Title</label
                        >
                        <input
                            type="text"
                            name="title"
                            
                            id="title"
                            v-model="form.title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label
                            for="content"
                            class="block text-sm font-medium text-gray-700"
                            >Content</label
                        >
                        <textarea
                            name="content"
                            id="content"
                            v-model="form.content"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            rows="4"
                        ></textarea>
                    </div>
                    <div>
                        <label
                            for="image"
                            class="block text-sm font-medium text-gray-700"
                            >Image</label
                        >
                        <input
                            type="file"
                            name="image"
                            id="image"
                            @input="form.image = $event.target.files[0]"
                            class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        />
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center my-6 px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                        >
                            udpate Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Userlayout>
</template>

<script setup>
import Userlayout from "@/Layouts/UserLayout.vue";
import {  useForm } from "@inertiajs/vue3";

const props = defineProps({
    post: Object,
})
const form = useForm({
    title: props.post.title,
    content : props.post.content,
    image: props.post.image,
    _method: "put",
});

function update() {
    form.post(route("posts.update", props.post.id));
}
</script>
