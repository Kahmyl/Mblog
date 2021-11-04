<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="font-bold text-lg mt-6 text-black-900">
                {{title}}
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        props: {
            title: String
        },
        components: {
            JetApplicationLogo,
        },
    })
</script>
