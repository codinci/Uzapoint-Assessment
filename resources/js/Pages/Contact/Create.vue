<script setup>
import { reactive } from 'vue'
import { Head, Link, router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({ groups: Object })


const form = reactive({
  first_name: null,
  last_name: null,
  phone_no: null,
})


function submit() {
  router.post('/dashboard/store', form)
}

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Contact</h2>
        </template>
        <div class="mt-4">
            <form @submit.prevent="submit" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                    <input id="first_name" v-model="form.first_name" type="text" placeholder="Enter your first name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                    <input id="last_name" v-model="form.last_name" type="text" placeholder="Enter your last name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="phone_no" class="block text-gray-700 text-sm font-bold mb-2">Phone No:</label>
                    <input id="phone_no" v-model="form.phone_no" type="text" placeholder="Enter your phone number" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="group" class="block text-gray-700 text-sm font-bold mb-2">Group:</label>
                    <div class="relative">
                        <select id="group" v-model="form.group" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" disabled selected>Select your group</option>
                            <option v-for="group in groups" :value="group.group_id">{{ group.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 11l4-4H7z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
        
    </AuthenticatedLayout>
  </template>
  
 