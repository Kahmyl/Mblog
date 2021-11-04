<template>
    <app-layout title="Home">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Head/>
                    <Headlines />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/Layout.vue'
    import Head from '@/components/static1.vue'
    import Headlines from '@/components/static2.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Headlines,
        },
    })
</script>
