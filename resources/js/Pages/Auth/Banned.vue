<template>
  <userlayout title="Banned">
    <v-container>
      <v-alert type="error">
        You are banned from this platform. Please report to admin.
      </v-alert>
      <v-form @submit.prevent="submit">
        <v-card>
          <v-card-title>
            Report to admin
          </v-card-title>
          <v-card-text>
            <v-text-field v-model="form.message" label="Message" outlined />
          </v-card-text>
          <v-card-actions>
            <v-btn type="submit" color="primary" :loading="form.processing">Submit</v-btn>
          </v-card-actions>
        </v-card>
      </v-form>
    </v-container>
  </userlayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import userlayout from '@/Layouts/UserLayout.vue';

const form = useForm({
  message: '',
});

function submit() {
  form.post(route('report.store'));
}
</script>

<style lang="scss" scoped></style>
