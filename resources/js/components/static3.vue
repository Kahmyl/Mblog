<template>
    <div v-if="Blogs">
        <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
            <!-- card -->
            <div v-for="Blog in Blogs" :key="Blog.id" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">
                <!-- media -->
                <div class="h-64 w-auto md:w-1/2">
                    <img class="inset-0 h-full w-full object-cover object-center" :src="Blog.image" />
                </div>
                <!-- content -->
                <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                    <h3 class="font-semibold text-lg leading-tight truncate">{{ Blog.title }}</h3>
                    <p class="mt-2">
                      {{ Blog.body.substring(0,255)+".." }}
                    </p>
                    <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                      {{  }} &bull; {{ Blog.created_at }}
                    </p>
                </div>
            </div><!--/ card-->
        </div><!--/ flex-->
    </div>    
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },

        data: () => {
             return{
                 Blogs: []
             }
        },

        methods: {
            getBlogs(){
                axios.get("/blogs")
                .then ( response => {
                    this.Blogs = response.data
                })
                .catch (error =>{
                    console.log(error)
                })
            }
        },

        created() {
            this.getBlogs()
        }
    })
</script>
