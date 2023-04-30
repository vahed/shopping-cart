<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";

defineProps({
    registerRequestUrl: String
});

const form = useForm({
    name: '',
    address: '',
    city: '',
    county: '',
    postcode: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
    registerRequestUrl: ''
});

const submit = (url) => {
    form.registerRequestUrl = url
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit(registerRequestUrl)">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="address" value="Address" />
                <TextInput id="address" type="text" class="mt-1 block w-full" v-model="form.address" required autofocus autocomplete="address" />
                <InputError class="mt-2" :message="form.errors.address" />
            </div>

            <div class="mt-4">
                <InputLabel for="city" value="City" />
                <TextInput id="city" type="text" class="mt-1 block w-full" v-model="form.city" required autocomplete="city" />
                <InputError class="mt-2" :message="form.errors.city" />
            </div>

            <div class="mt-4">
                <InputLabel for="county" value="County" />
                <TextInput id="county" type="text" class="mt-1 block w-full" v-model="form.county" required autocomplete="county" />
                <InputError class="mt-2" :message="form.errors.county" />
            </div>

            <div class="mt-4">
                <InputLabel for="postcode" value="Postcode" />
                <TextInput id="postcode" type="text" class="mt-1 block w-full" v-model="form.postcode" required autocomplete="postcode" />
                <InputError class="mt-2" :message="form.errors.postcode" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput id="email" type="text" class="mt-1 block w-full" v-model="form.email" required autocomplete="email" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
