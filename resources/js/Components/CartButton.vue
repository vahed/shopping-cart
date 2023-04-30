<template>
    <!--
      Pass the `isOpen` ref to the `open` prop, and use the `close` event
      to set the ref back to `false` when the user clicks outside of
      the dialog or presses the escape key.
    -->
    <button 
        @click="setIsOpen()"
        class="p-4 bg-black hover:bg-gray-800">
        Click
    </button>
    <TransitionRoot appear as="template" :show="isOpen">
        <Dialog 
            class="fixed inset-0 overflow-hidden z-10"
            :open="isOpen" 
            @close="setIsOpen">
            <TransitionChild 
                enter="transition-opacity ease-in-out duration-300"
                enter-from="opacity-0"
                enter-to="opactity-100"
                leave="transition-opacity duration-300"
                leave-from="opacity-100"
                leave-to="opacity-0"
                as="template">
                <DialogOverlay class="absolute inset-0 bg-black bg-capacity-40"/>
            </TransitionChild>
            <TransitionChild
                enter="transform ease-in-out transition-transform duration-300"
                enter-from="translate-x-full"
                enter-to="translate-x-0"
                leave="transform transition-transform duration-300"
                leave-from="translate-x-0"
                leave-to="translate-x-full" 
                as="template">
                <div class="bg-white fixed inset-y-0 right-0 w-full max-w-sm">
                    <DialogPanel>
                    <DialogTitle>Deactivate account</DialogTitle>
                    <DialogDescription>
                    This will permanently deactivate your account
                    </DialogDescription>
            
                    <p>
                    Are you sure you want to deactivate your account? All of your data will be
                    permanently removed. This action cannot be undone.
                    </p>
            
                    <!--
                    You can render additional buttons to dismiss your dialog by setting your
                    `isOpen` state to `false`.
                    -->
                    <button @click="setIsOpen(false)">Cancel</button>
                    <button @click="handleDeactivate">Deactivate</button>
                    </DialogPanel>
                </div>
            </TransitionChild>
        </Dialog>
    </TransitionRoot>
  </template>
  
  <script setup>
    import { ref } from 'vue'
    import {
      Dialog,
      DialogPanel,
      DialogTitle,
      DialogDescription,
      DialogOverlay,
      TransitionChild,
      TransitionRoot
    } from '@headlessui/vue'
  
    // The open/closed state lives outside of the Dialog and
    // is managed by you.
    const isOpen = ref(true)
  
    function setIsOpen(value) {
      isOpen.value = value
    }
  
    function handleDeactivate() {
      // ...
    }
  </script>
  