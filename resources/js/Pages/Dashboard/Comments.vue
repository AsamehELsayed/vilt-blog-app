<template>
    <DashboardLayout>
      <h1 class="text-4xl mb-9 font-bold text-gray-900">comments</h1>
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
              <th scope="col" class="px-6 py-3">Post</th>
              <th scope="col" class="px-6 py-3">Comment</th>
              <th scope="col" class="px-6 py-3">Action</th>
              
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
              v-for="comment in comments.data"
              :key="comment?.id"
            >
              <td class="px-6 py-4">{{ comment?.id }}</td>
              <td class="px-6 py-4">{{ comment?.user?.name }}</td>
  
              <td class="px-6 py-4">{{ comment?.post?.title }}</td>
              <td class="px-6 py-4">{{ comment?.comment }}</td>
              
              <Link
                class="px-6 py-4 bg-red-600 text-white cursor-pointer"
                as="th"
                :href="route('comments.destroy', comment.id)"
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
              <li v-for="comment in comments.links" :key="comment.label">
                <Link
                  v-if="comment.url"
                  class="px-4 py-2 bg-slate-100 hover:bg-slate-700 hover:text-white rounded"
                  :href="comment.url"
                  :class="{ 'bg-slate-700 text-white': comment.active }"
                >
                  {{
                    comment.label == "&laquo; Previous"
                      ? "←"
                      : comment.label == "Next &raquo;"
                      ? "→"
                      : comment.label
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
  import {  Link } from "@inertiajs/vue3";
  import { defineProps } from "vue";
  defineProps({
    comments: Object,
  });

 
  </script>
    
    <style>
  </style>
    