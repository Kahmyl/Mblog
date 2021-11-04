<template>
    <div class="antialiased bg-gray-100 text-gray-900 font-sans p-6">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div  v-for="head in db"  :key="head.id" class=" sm:w-1/2 md:w-1/2 xl:w-1/3 p-4 h-full">
                    <div v-if="head.category == 1" class=" max-h-full">
                        <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden  max-h-9/10">
                            <div class="relative pb-48 overflow-hidden">
                                <img class="absolute inset-0 h-full w-full object-cover" :src="head.image" alt="">
                            </div>
                            <div class="h-full p-4">
                                <h2 class="mt-2 mb-2  font-bold">{{head.title.substring(0,80)}}</h2>
                                <p class="pt-3 text-sm">{{head.description.substring(0,240)}}</p>
                            </div>
                            <div class="pt-6">
                                <Link href="/blog" :data="{id: head.id}">
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

<style lang="scss">
    .c-card {
    img {    
      transition: transform .3s ease-in-out; 
    }
    
    &:hover {
      img {
        transform: scale(1.05)
      }
    }
  }
</style>
    
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
