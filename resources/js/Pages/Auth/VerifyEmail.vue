<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            از ثبت نام شما متشکریم! قبل از شروع ، آیا می‌توانید آدرس ایمیل خود را با کلیک بر روی لینکی که برای شما از طریق ایمیل ارسال کردیم تایید کنید؟ اگر ایمیل را دریافت نکردید، ایمیل دیگری را برای شما ارسال خواهیم کرد.
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent" >
            یک لینک تایید جدید به ایمیلی که در هنگام ثبت نام وارد کرده بودید ارسال شد.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    ارسال دوباره ایمیل تایید
                </PrimaryButton>

                <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900 text-right">خروج</Link>
            </div>
        </form>
    </GuestLayout>

</template>
