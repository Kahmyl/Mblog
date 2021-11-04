<template>
    <h1>Details{{blog_id}}</h1>
    <h2>db.[blog_id].title</h2>
    <p>db.[blog_id].body</p>
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
