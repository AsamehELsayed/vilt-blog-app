<template>
  <Userlayout>
    <div class="container mx-auto pt-10 flex flex-col">
        
        <Link :href="route('posts.create')"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-40 text-center mx-auto" >Create post</Link>
      <h1 class="text-5xl font-bold mb-6">Posts</h1>
      <div class="grid md:grid-cols-3 sm:grid-cols-1 ">
        <div
          v-for="post in posts"
          :key="post.id"
          class="max-w-sm bg-white border mt-10 border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700"
        >
          <Link :href="route('posts.show', post.id)">
            <img class="rounded-t-lg" :src="post.image" alt="" />
          </Link>
          <div class="p-5">
            <Link :href="route('posts.show', post.id)">
              <h5
                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
              >
                {{ post.title }}
              </h5>
            </Link>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
              {{ post.content }}
            </p>
            <Link
              :href="route('posts.show', post.id)"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Read more
              <svg
                class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9"
                />
              </svg>
            </Link>

            <Link
              :href="route('posts.destroy', post.id)"
              v-if="user.id === post.user_id"
              method="delete"
              class="inline-flex items-center mx-3 px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              delete
              <svg
                class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9"
                />
              </svg>
            </Link>
          </div>
        </div>
      </div>
    </div>
  </Userlayout>
</template>

<script setup>
import Userlayout from "@/Layouts/UserLayout.vue";
import { ref } from "vue";

import { Link , usePage} from "@inertiajs/vue3";
defineProps({ posts: Object });
const user = ref(usePage().props.auth.user);

</script>

<style>
</style>
