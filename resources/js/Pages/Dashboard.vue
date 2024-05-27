<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({ contacts: Object, groups: Object })


const getGroupName = (groupId) => {
    const group = props.groups.find(group => group.id === groupId);
    return group ? group.name : '';
};

const contactsWithGroupNames = computed(() => {
    return props.contacts.map(contact => ({
        ...contact,
        groupName: getGroupName(contact.group_id)
    }));
});

//product deletion
const confirmingContactDeletion = ref(false);
const contactToDelete = ref(null);
const form = useForm({});
const confirmContactDeletion = (contact) => {
    confirmingContactDeletion.value = true;
    contactToDelete.value = contact;
};
const closeModal = () => {
    confirmingContactDeletion.value = false;
};

const deleteContact = (id) => {
    form.delete(route('contact.destroy', { id: id }), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => 'Something went wrong',
        onFinish: () => form.reset(),
    });
};

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
                                v-for="contact in contactsWithGroupNames"
                                :key="contact.id"
                                class="even:bg-gray-100"
                            >
                                <td class="border-b py-2 px-4">{{ contact.first_name }}</td>
                                <td class="border-b py-2 px-4">{{ contact.last_name }}</td>
                                <td class="border-b py-2 px-4">{{ contact.phone_no }}</td>
                                <td class="border-b py-2 px-4">{{ contact.groupName }}</td>
                                <td class="border-b py-2 px-4">
                                    <Link
                                        :href="route('contact.edit', { id: contact.id })"
                                        class="text-yellow-500 hover:underline"
                                    >
                                        Edit
                                    </Link>
                                    |
                                    <button
                                       @click="confirmContactDeletion(contact)"
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
          <Modal :show="confirmingContactDeletion" @close="closeModal">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        Are you sure you want to delete ?
                    </h2>

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                        <DangerButton
                            class="ms-3"
                            @click="deleteContact(contactToDelete.id)"
                        >
                            Delete Contact
                        </DangerButton>
                    </div>
                </div>
            </Modal>
    </AuthenticatedLayout>
</template>
