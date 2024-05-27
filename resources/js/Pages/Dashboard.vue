<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
defineProps({ contacts: Object })
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end mx-4">
                        <Link class="m-4 p-2 bg-blue-400 rounded-md" as="button" href="/dashboard/create">
                           Create Contact
                        </Link>
                        <Link class="m-4 p-2 bg-blue-400 rounded-md" as="button" href="/group">
                           Create Group
                        </Link>
                    </div>
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b py-2 px-4">First Name</th>
                                <th class="border-b py-2 px-4">Last Name</th>
                                <th class="border-b py-2 px-4">Phone No</th>
                                <th class="border-b py-2 px-4">Group</th>
                                <th class="border-b py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="contact in contacts"
                                :key="contact.id"
                                class="even:bg-gray-100"
                            >
                                <td class="border-b py-2 px-4">{{ contact.first_name }}</td>
                                <td class="border-b py-2 px-4">{{ contact.last_name }}</td>
                                <td class="border-b py-2 px-4">{{ contact.phone_no }}</td>
                                <td class="border-b py-2 px-4">
                                    {{ contact.group ? contact.group.name : '' }}
                                </td>
                                <td class="border-b py-2 px-4">
                                    <button
                                        @click="viewContact(contact)"
                                        class="text-blue-500 hover:underline"
                                    >
                                        View
                                    </button>
                                    |
                                    <button
                                        @click="editContact(contact)"
                                        class="text-yellow-500 hover:underline"
                                    >
                                        Edit
                                    </button>
                                    |
                                    <button
                                        @click="deleteContact(contact)"
                                        class="text-red-500 hover:underline"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
