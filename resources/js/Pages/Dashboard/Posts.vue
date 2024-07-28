<template>
  <DashboardLayout>
    <h1 class="text-4xl mb-9 font-bold text-gray-900">posts</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">User</th>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Content</th>
            <th scope="col" class="px-6 py-3">Image</th>
            <th scope="col" class="px-6 py-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
            v-for="post in posts.data"
            :key="post?.id"
          >
            <td class="px-6 py-4">{{ post?.id }}</td>
            <td class="px-6 py-4">{{ post?.user?.name }}</td>

            <td class="px-6 py-4">{{ post?.title }}</td>
            <td class="px-6 py-4">{{ post?.content }}</td>
            <td class="px-6 py-4">
                
            <a target="_blank" :href="post?.image" class="px-6 py-4 bg-blue-600 text-white cursor-pointer" >view</a>
            </td>
            
            <Link
              class="px-6 py-4 bg-red-600 text-white cursor-pointer"
              as="th"
              :href="route('posts.destroy', post.id)"
              method="delete"
            >
              Delete</Link
            >
          </tr>
        </tbody>
      </table>
    </div>
    <div class="mt-4">
      <div class="flex justify-center">
        <div class="mt-4">
          <ul class="flex gap-1">
            <li v-for="post in posts.links" :key="post.label">
              <Link
                v-if="post.url"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-700 hover:text-white rounded"
                :href="post.url"
                :class="{ 'bg-slate-700 text-white': post.active }"
              >
                {{
                  post.label == "&laquo; Previous"
                    ? "←"
                    : post.label == "Next &raquo;"
                    ? "→"
                    : post.label
                }}
              </Link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
  
  <script setup>
import DashboardLayout from "@/Layouts/DashboardLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { defineProps } from "vue";
defineProps({
  posts: Object,
});
const form = useForm({
  _method: "post",
});
const banpost = (id) => {
  form.post(route("posts.ban", id));
};
</script>
  
  <style>
</style>
  