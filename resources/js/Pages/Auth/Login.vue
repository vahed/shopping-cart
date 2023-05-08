<script setup>
import { computed } from 'vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
    loginRequestUrl: String
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
    loginRequestUrl: ''
});

const submit = (url) => {

    form.loginRequestUrl = url

    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <Head title="Log in" />
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>
    <GuestLayout>


        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit(loginRequestUrl)">
            <div>
                <InputLabel for="email" value="ایمیل" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="رمز ورود" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex justify-start">
                    <Checkbox name="remember" v-model:checked="form.remember" class="ml-1"/>
                    <span class="ml-2 text-sm text-gray-600">رمز را نگهدار</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="ml-2 underline text-sm text-gray-600 hover:text-gray-900">
                    رمز عبور را فرامش کردید؟
                </Link>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ورود
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

