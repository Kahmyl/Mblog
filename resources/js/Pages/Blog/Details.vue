<template>
    <h1>Details{{blog_id}}</h1>
    <div v-for="head in db" :key="head.id">
        <div v-if="head.id == blog_id">]
            <h2>{{head.title}}</h2>
            <p>{{head.body}}</p>
        </div>
    </div>
</template>
<script>
import qs from 'qs'
import {db} from '@/components/staticdb.vue'
    export default {
        setup(){
            let uri = window.location.href.split('?');
            let id = qs.parse(uri[1]);
            
            let blog_id = id.id            
            return{ blog_id, db }
        }
    }
      
</script>
