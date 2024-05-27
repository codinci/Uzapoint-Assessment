<script setup>
import { reactive } from 'vue'
import {  router } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';



const form = reactive({
  group_name: null,
})


function submit() {
  router.post('/dashboard/store', form)
}

</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Group</h2>
        </template>
        <div class="mt-4">
            <form @submit.prevent="submit" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="group_name" class="block text-gray-700 text-sm font-bold mb-2">Group Name:</label>
                    <input id="group_name" v-model="form.group_name" type="text" placeholder="Enter your group name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>        
    </AuthenticatedLayout>
</template>