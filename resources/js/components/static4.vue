<template>
    <div class="antialiased bg-gray-200 text-gray-900 font-sans p-6">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div v-for="entertain in db" :key="entertain.id" class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                    <div v-if="entertain.category == 2">
                        <div  class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden h-full">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="entertain.image" alt="">
                            </div>
                            <div class="p-4">
                                <h2 class="mt-2 mb-2  font-bold">{{entertain.title}}</h2>
                                <p class=" pt-3 text-sm">{{entertain.description.substring(0,180)+'...'}}</p>
                            </div>
                            <div class="pt-6">
                                <Link href="/blog" :data="{id: entertain.id}">
                                    <p class=" rounded-t-none w-full whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                        Read more
                                    </p>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';
    import { db } from '@/components/staticdb.vue'

    export default defineComponent({
        components:{
            Link,
        },
        setup(){
            return {
                db,
            }
        }
    })
</script>

