<template>
    <div class="">
        <div class="w-11/12 mx-auto">
            <h2 class="text-2xl font-bold">Article List</h2>
            <p class="text-right text-green-800 text-xl cursor-pointer"><a @click.prevent="modal= !modal"><i class="fas fa-plus "></i> add post</a></p>
            <table class="min-w-max w-full table-auto">
                <thead class="bg-black text-white py-2">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Posted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(post) in posts" :key="post.id" class="">
                        <td>{{post.id}}</td>
                        <td class="p-1">
                            <div class="h-10">
                                <img class="max-w-full h-full"  src="../../../assets/vuefiles/components/1.jpg" alt="">
                            </div>
                        </td>
                        <td>{{post.title}}</td>
                        <td>{{ post.description.substr(0,30)}}</td>
                        <td>{{post.created_at}}</td>
                        <td>
                            <div class="flex justify-center">
                                <a class="" href=""><i class="fa fa-eye hover:text-yellow-300" aria-hidden="true"></i></a>
                                <a class="mx-1" href=""><i class="fas fa-pencil-alt hover:text-green-500" aria-hidden="true"></i></a>
                                <a @click.prevent="deleteArticle(post.id)" class=""><i class="fa fa-trash hover:text-red-500"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
<!--            modal form-->
            <div :class="{block : modal, hidden : !modal}" class="bg-gray-100 w-full h-full fixed left-0 top-0 flex justify-center items-center flex-col ">
                <div class="flex justify-center items-center">
                    <form class="w-max bg-white p-2" @submit.prevent="createArticle">
                        <div class="flex justify-between">
                            <h3 class="text-xl font-bold">Add post</h3>
                            <p class="text-right"><button @click.prevent="modal = !modal" class="text-xl"><i class="fas fa-times"></i></button></p>

                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col my-2">
                                <label for="title">Title</label>
                                <input v-model="title" class="border-2 rounded-md py-2 px-4 " type="text">
                            </div>
                            <div class="flex flex-col my-2">
                                <label for="description">Description</label>
                                <input v-model="description" class="border-2 rounded-md py-2 px-4 " type="text">
                            </div>
                        </div>
                        <div class="flex flex-col my-2">
                            <label for="title">Content</label>
                            <textarea v-model="content" class="border-2 rounded-md py-1 px-4 " name="" id="" cols="10" rows="10"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col my-2">
                                <label for="title">Url</label>
                                <input v-model="urlP" class="border-2 rounded-md py-2 px-4 " type="text">
                            </div>
                            <div class="flex flex-col my-2">
                                <label for="title">Image</label>
                                <input v-model="img" class="border-2 rounded-md py-2 px-4 " type="text">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col my-2">
                                <label for="categorie">Catgorie</label>
                                <select multiple class="border-2 rounded-md py-2 px-4 "  name="categorie" id="categorie">
                                    <option v-model="category" v-for="(cat,key) in categories " :value="cat['@id']">{{ cat.nom }}</option>
                                </select>
                            </div>
                            <div class="flex flex-col my-2">
                                <label for="user">User</label>
                                <select class="border-2 rounded-md py-2 px-4 "  name="" >
                                    <option v-model="userP" v-for="(user,key) in users" :value="user['@id']">{{ user.pseudo }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col my-2">
                            <button class="bg-green-500 border rounded-md py-2 text-white" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "Articleindex",
        data : () => {
            return {
                posts : [],
                users : [],
                categories : [],
                postId : null,
                title : null,
                description : null,
                content : null,
                urlP : null,
                img : null,
                userP : null,
                category : [],
                url : `/admin/api/article`,
                modal : false
            }
        },
        methods : {
            deleteArticle(id){
                let answer = confirm("Do want to delete this post??")
                if(answer){
                    return axios
                        .delete(`/admin/api/articles/${id}`)
                        .then(docref => this.$router.push('http://127.0.0.1:8000/admin/articleapi/') )
                        .catch( err => console.log(err))
                }

            },
            createArticle(){
                let thePost = {
                    "title" : this.title,
                    "description" : this.description,
                    "url" : this.urlP,
                    "img" : this.img,
                    "content" : this.content,
                    "user" : this.userP,
                    "categories" : this.category
                }
                axios.post('/admin/api/articles',thePost)
                    .then(response => this.postId = response.data.id)
                    .catch(err => console.log(err))
                this.modal = false
                alert("Votre article a été bien posté")
            }

        }
        ,
        created() {
            axios
                .get(this.url)
                .then(response => {
                    this.posts = response.data["hydra:member"]
                })
                .catch(error => console.log(error))

            axios
                .get('/admin/api/users')
                .then(response => {
                    this.users = response.data["hydra:member"]
                    console.log(response.data["hydra:member"])
                })
                .catch(err => console.log(err))
            axios
                .get('/admin/api/categories')
                .then(response => {
                    this.categories = response.data["hydra:member"]
                })
                .catch(err => console.log(err))

        }
    }
</script>

<style scoped>

</style>