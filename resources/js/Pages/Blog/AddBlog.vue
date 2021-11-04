<template>
    <app-layout title="Add Blog">
        <div class="w-full">
            <div class="h-8 py-12">
                <div class="h-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <Head title="Add new Blog"/>
                    </div>
                </div>
            </div>
            <div class=" py-12 pt-20">
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden ">
                        <AddForm/>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/Layout.vue'
    import AddForm from '@/components/form.vue'
    import Head from '@/components/static1.vue'

    export default defineComponent({
        components: {
            AppLayout,
            AddForm,
            Head,
        },
    })
</script>
