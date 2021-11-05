<template>
    <app-layout title="Home">
        <div class="w-full ">
            <div class="h-8 py-12">
                <div class="h-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <Head title="Headlines"/>
                    </div>
                </div>
            </div>
            <div class=" py-12 pt-20">
                <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden ">
                        <Headlines/>
                    </div>
                </div>
            </div>
            <div class=" py-12">
                <div class="h-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <Head title="Updates"/>
                    </div>
                </div>
            </div>
            <div class="pt-10 pb-30  ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-whitesmoke overflow-hidden ">
                        <Updates/>
                    </div>
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
    import Updates from '@/components/static3.vue'

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Headlines,
            Updates,
        },
    })
</script>
