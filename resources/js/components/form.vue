<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="action.php" @submit="sumbitForm">
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label><br>
                            <input type="text" class=" rounded-md border-1 border-gray-300 p-2 w-full" name="title" id="title" v-model="title" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Description</label><br>
                            <input type="text" class=" rounded-md border-1 border-gray-300 p-2 w-full" name="description" id="description" v-model="description" placeholder="(Optional)">
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label><br>
                            <textarea name="content" class=" rounded-md border-1 border-gray-300 w-full" v-model="content">
                                
                            </textarea>
                        </div>

                        <label
                          class="
                            w-64
                            flex flex-col
                            items-center
                            px-4
                            py-6
                            bg-white
                            rounded-md
                            shadow-md
                            tracking-wide
                            uppercase
                            border border-blue
                            cursor-pointer
                            hover:bg-purple-600 hover:text-white
                            text-purple-600
                            ease-linear
                            transition-all
                            duration-150
                          "
                        >
                          <i class="fas fa-cloud-upload-alt fa-3x"></i>
                          <span class="mt-2 text-base leading-normal">Select an image</span>
                          <input type="file"  class="hidden" @change="handleFileChange" />
                        </label><br>

                        <div class="mb-8">
                            <select class=" rounded-md border-1 border-gray-300 border-r p-2 w-1/4" v-model="category">
                                <option value="1">Headlines</option>
                                <option value="2">Entertainment</option>
                                <option value="3">Art</option>
                                <option value="4">Sport</option>
                            </select>
                        </div>

                        <div class="flex p-1">
                            <button role="submit" class=" rounded-md w-1/5 p-3 bg-blue-500 text-white hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                    <p>{{title}}</p>
                    <p>{{content}}</p>
                     <p>{{category}}</p>
                      <p>{{description}}</p>
                      <p>{{len}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    #myBtn:disabled {
      cursor: not-allowed;
      opacity: 0.8;
    }

</style>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'

    export default defineComponent({
        components: {
            JetApplicationLogo,
        },

        data(){
            return {
                title: '',
                description: '',
                content: '',
                category: '',
                image: '',
                imgUrl: '',
                imagem: '',
            }
        },

        methods: {
            async handleFileChange(e) {
              var files = e.target.files || e.dataTransfer.files;
              this.image = files[0];
              let formData = new FormData();

              formData.append('file', this.image);
              formData.append('upload_preset',  'ml_default');

              const url = "https://api.cloudinary.com/v1_1/hpiddhw8y/image/upload"

              const res = await axios.post( url,
              formData,
              {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              })
                    this.imgUrl = await res.data.secure_url;
                    console.log(this.imgUrl)
            },

            async sumbitForm(e)  {
                e.preventDefault();

                this.imagem = await this.imgUrl

                if(this.imagem){
                    console.log(this.imagem)
                    window.location.href = '/dashboard';
                }  
            }
        }
    })
</script>