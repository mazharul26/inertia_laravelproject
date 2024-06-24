<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head,Link,useForm, usePage } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    url: '',
    post_date: '',
    description: '',
});

const submit = () => {
    form.post(route('post.store'));
};


</script>
<template>
   <Head title="Post Information"></Head>
   <AuthenticatedLayout>
    <template #header>
            <Link :href="route('post.index')" class="font-semibold text-xl text-gray-800 leading-tight btn btn-success" >Back</Link>
        </template>
        <form @submit.prevent="submit">
        <div>
                <InputLabel for="Title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    required
                    autofocus
                    autocomplete="title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div>
                <InputLabel for="post_date" value="Post Date" />

                <TextInput
                    id="post_date"
                    type="date"
                    class="mt-1 block w-full"
                    v-model="form.post_date"
                    required
                    autofocus
                    autocomplete="post_date"
                />

                <InputError class="mt-2" :message="form.errors.post_date" />
            </div>
            <div class="mt-4">
                <InputLabel for="url" value="Url" />

                <TextInput
                    id="url"
                    type="url"
                    class="mt-1 block w-full"
                    v-model="form.url"
                    required
                    autocomplete="url"
                />

                <InputError class="mt-2" :message="form.errors.url" />
            </div>
            <div class="mt-4">
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="description"
                    class="mt-1 block w-full p-2"
                    v-model="form.description"
                    required
                    autocomplete="description"
                />

                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            <div class="flex items-center justify-end mt-4">
              

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Post Save
                </PrimaryButton>
            </div>
        </form>
   </AuthenticatedLayout>
</template>



<style>

</style>
