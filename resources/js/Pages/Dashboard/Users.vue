<template>
  <DashboardLayout>
    <h1 class="text-4xl mb-9 font-bold text-gray-900">Users</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
      >
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
        >
          <tr>
            <th scope="col" class="px-6 py-3">User name</th>
            <th scope="col" class="px-6 py-3">Email</th>
            <th scope="col" class="px-6 py-3">Role</th>
            <th scope="col" class="px-6 py-3">Is banned</th>
            <th scope="col" class="px-6 py-3">actions</th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
            v-for="user in users.data"
            :key="user?.id"
          >
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
            >
              {{ user?.name }}
            </th>
            <td class="px-6 py-4">{{ user?.email }}</td>
            <td class="px-6 py-4">{{ user?.role }}</td>
            <td class="px-6 py-4" v-if="user?.is_banned == 1">true</td>
            <td class="px-6 py-4" v-if="user?.is_banned == 0">false</td>
            <td class="px-6 py-4" v-if="user?.is_banned == 0">
              <button
                @click="banUser(user?.id)"
                class="bg-red-500 text-white p-2 rounded"
              >
                Ban User
              </button>
            </td>
            <td class="px-6 py-4" v-if="user?.is_banned == 1">
              <button
                @click="banUser(user?.id)"
                class="bg-blue-500 text-white p-2 rounded"
              >
                Unban User
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="mt-4">
      <div class="flex justify-center">
        <div class="mt-4">
          <ul class="flex gap-1">
            <li v-for="user in users.links" :key="user.label">
              <Link
                v-if="user.url"
                class="px-4 py-2 bg-slate-100 hover:bg-slate-700 hover:text-white rounded"
                :href="user.url"
                :class="{ 'bg-slate-700 text-white': user.active }"
              >
            
              {{ user.label == '&laquo; Previous' ? '←' : user.label == 'Next &raquo;' ? '→' : user.label }}
            
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
import { useForm ,Link} from "@inertiajs/vue3";
import { defineProps } from "vue";
defineProps({
  users: Object,
});
const form = useForm({
  _method: "post",
});
const banUser = (id) => {
  form.post(route("users.ban", id));
};

</script>

<style>
</style>
