<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Navbar from "@/Shared/Navbar.vue";
import Search from "@/Layouts/Search.vue";
import Footer from '@/Layouts/Footer.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <div class="grid grid-cols-1 divide-y">
        <Navbar />
        <Search />
    </div>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-gray-600">
            آیا رمز ورود را فرامش کرده اید؟ اشکال ندارد۰ ایمیل خود را وارد کنید تا ما یک لینک برای انتخاب مجدّد رمز ورود شما برایتان ارسال کنیم۰
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="ایمیل" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    لینک جدید برای تجدید رمز
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>

    <Footer />
</template>
