<template>
    <div class="">
        <header class="bg-white h-32 py-5">
            <div class="w-11/12 mx-auto h-full">
                <a href="" class="hidden"><span>ONLINE</span> BLOG</a>
                <div class="h-full flex items-center justify-center border-gray-400 bg-red-500">
                    <h3 class=" text-2xl font-bold text-white mr-5">Breaking News</h3>
                    <p class="text-gray-800 text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, natus?</p>
                </div>
            </div>
        </header>
        <nav class="bg-black ">
            <div class="w-11/12 mx-auto">
                <div class="flex justify-between">
                    <div class="text-white text-xl cursor-pointer py-4">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="text-white text-2xl py-4">
                        <p><span class="font-bold">ONLINE</span>BLOG</p>
                    </div>
                    <div class="text-white text-xl cursor-pointer py-4">
                        <i class="fa fas fa-search"></i>
                    </div>
                    <div class="hidden">
                        form
                    </div>
                </div>
            </div>
        </nav>
        <section class="">
            <!-- container -->
            <div class="w-11/12 mx-auto pt-5">
                <!-- container flex -->
                <div class="md:flex ">
                    <!-- article items -->
                    <div class="flex flex-wrap md:flex-nowrap mb-5">
                        <div v-for="(post,key) in limitedTwo" class="relative mb-3 w-full md:ml-3">
                            <div class="h-80 md:w-80 bg-gradient-to-tr from-black">
                                <img class="h-full w-full object-cover rounded-xl" :src="post.urlToImage" alt="">
                            </div>
                            <span class="absolute top-5 left-5 bg-blue-800 text-white text-sm py-1 px-2 rounded">CODING</span>
                            <div class="absolute bottom-2 left-5">
                                <p class="text-2xl font-bold text-white"><a :href="post.url">{{ post.title.substr(0,100)  }}</a>...</p>
                                <p class="text-gray-300 text-sm">
                                    <span class="mr-5"><i class="fa fa-user mr-1 text-pink-700"></i>{{ post.author }}</span>
                                    <span><i class="fas fa-clock mr-1"></i> {{ post.publishedAt }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-3 mb-5  ">
                        <div v-for="(post,key) in limitedThree" class="py-2 px-3 bg-white">
                            <div class="flex ">
                                <div class="h-20 w-1/4">
                                    <img class="h-full w-full object-cover" :src="post.urlToImage" alt="">
                                </div>
                                <div class="bg-white pl-5">
                                    <p class="font-bold"><a :href="post.url">{{ post.title.substr(0,50) }}</a>...</p>
                                    <p class="text-gray-400 text-sm"><i class="far fa-clock mr-1 text-pink-700"></i>date</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner -->
        <section class="bg-white py-5 mt-5">
            <div class="w-11/12 mx-auto">
                <div class="h-20 flex justify-center items-center bg-gray-200">
                    <p>Responsive ad</p>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <div class="w-11/12 mx-auto">
                <div class="flex flex-wrap md:flex-nowrap ">
                    <!-- posts -->
                    <div class="grid sm:grid-cols-2 md:gap-3 gap-5 mb-5 md:w-2/3">
                        <div class="">
                            <h3 class="text-2xl font-bold">News From NewsApi.org</h3>
                            <div class="grid gap-y-3">

                                <div v-for="(post,key) in limitedTen " class="bg-white relative py-3 px-4">
                                    <div class="h-36 ">
                                        <img class="w-full h-full object-cover" :src="post.urlToImage" alt="">
                                    </div>
                                    <span class="absolute top-5 left-5 bg-blue-800 text-white py-1 px-2 rounded text-sm">CODING</span>
                                    <div class="">
                                        <p class="text-xl font-bold"><a :href="post.url"> {{ post.title }}</a></p>
                                        <p class="text-xs text-gray-400 py-2">
                                            <span><i class="fa fa-user text-pink-600 mr-1">{{post.author }}</i></span>
                                            <span><i class="far fa-clock"></i>{{ post.publishedAt }}</span>
                                        </p>
                                        <p class="text-gray-500 mb-3">{{ post.description }}</p>
                                        <a href="" class="py-1 px-3 bg-black text-white">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
<!--                            news from database-->
                            <h3 class="text-2xl font-bold">News From Database</h3>
                            <div class="grid gap-y-3">
                                <img src="" alt="">
                                <div v-for="(post,key) in limitedTenDb " class="bg-white relative py-3 px-4">
                                    <div class="h-36 ">
                                        <img class="w-full h-full object-cover" src="../../../assets/vuefiles/components/1.jpg" alt="">
                                    </div>
                                    <span v-for="(cat,k) in post.categories" class=" absolute top-5 left-5 text-white py-1 px-2 rounded text-sm">{{cat.nom}}</span>
                                    <div class="">
                                        <p class="text-xl font-bold"><a :href="post.url"> {{ post.title }}</a></p>
                                        <p class="text-xs text-gray-400 py-2">
                                            <span><i class="fa fa-user text-pink-600 mr-1"></i>{{post.user.pseudo }}</span>
                                            <span><i class="far fa-clock"></i>{{ post.created_at }}</span>
                                        </p>
                                        <p class="text-gray-500 mb-3">{{ post.description }}</p>
                                        <a href="" class="py-1 px-3 bg-black text-white">Read More</a>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- aside -->
                    <div class="w-full md:w-1/3 md:ml-2">
<!--                        social plugins-->
                        <div class="py-2 px-4 bg-white">
                            <h3 class="text-xl font-semibold py-2">Social Plugin</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="bg-blue-900 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-blue-800 flex justify-center items-center">
                                            <i class="fab fa-facebook-f"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">Facebook</p>
                                    </div>
                                </div>
                                <div class="bg-blue-400 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-blue-300 flex justify-center items-center">
                                            <i class="fab fa-twitter"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">Twitter</p>
                                    </div>
                                </div>
                                <div class="bg-yellow-500 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-yellow-400 flex justify-center items-center">
                                            <i class="fas fa-rss"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">Rss</p>
                                    </div>
                                </div>
                                <div class="bg-red-700 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-red-600 flex justify-center items-center">
                                            <i class="fab fa-pinterest"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">Pinterest</p>
                                    </div>
                                </div>
                                <div class="text-white bg-gradient-to-tr from-red-600 to-blue-500">
                                    <div class="flex">
                                        <div class="h-10 w-10 flex justify-center items-center">
                                            <i class="fab fa-instagram"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">Instagram</p>
                                    </div>
                                </div>
                                <div class="bg-blue-600 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-blue-500 flex justify-center items-center">
                                            <i class="fab fa-vk"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">VKontakte</p>
                                    </div>
                                </div>
                                <div class="bg-red-600 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-red-500 flex justify-center items-center">
                                            <i class="fab fa-youtube"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">YouTube</p>
                                    </div>
                                </div>
                                <div class="bg-yellow-400 text-white">
                                    <div class="flex">
                                        <div class="h-10 w-10 bg-yellow-300 flex justify-center items-center">
                                            <i class="fab fa-snapchat"></i>
                                        </div>
                                        <p class="flex justify-center items-center ml-2 font-bold">Snapchat</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="">
                            <div class="py-2 px-4 bg-white my-5">
                                <h3 class="text-xl mb-3 font-semibold">Subscribe Us</h3>
                                <div class="h-32">
                                    <video class="h-full w-full" src="https://www.youtube.com/watch?v=DxcJbrs6rKk"></video>
                                </div>
                            </div>
<!--                            ad-->
                            <div class="py-4 px-4 bg-white mb-5">
                                <h3 class="text-xl mb-3 font-semibold">Ad Space</h3>
                                <div class="border border-gray-400 h-60 bg-gray-200 flex items-center justify-center">
                                    <p class="text-gray-400">responsive ad</p>
                                </div>
                            </div>
<!--                            most popular-->
                            <div class="bg-white py-2 px-4 mb-5">
                                <h3 class="text-xl mb-3 font-semibold">Most Popular</h3>
                                <div class="grid gap-3">
                                    <div class=" bg-white" v-for="(post,key) in limitedThree">
                                        <div class="flex ">
                                            <div class="h-16 w-1/4">
                                                <img class="h-full w-full object-cover" :src="post.urlToImage" alt="">
                                            </div>
                                            <div class="bg-white pl-5">
                                                <p class="font-bold"><a :href="post.url">{{ post.title.substr(0,75)  }}</a>...</p>
                                                <p class="text-gray-400 text-sm"><i class="far fa-clock mr-1 text-pink-700"></i>{{ post.publishedAt }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            categories-->
                            <div class="p-5 bg-white">
                                <h3 class="text-xl mb-3 font-semibold">Categories</h3>
                                <div class="">
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Business
                                        </div>
                                        <div class="text-white py-1 px-3 bg-yellow-500">
                                            4 Posts
                                        </div>
                                    </div>
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Health
                                        </div>
                                        <div class="text-white py-1 px-3 bg-green-500">
                                            9 Posts
                                        </div>
                                    </div>
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Managing
                                        </div>
                                        <div class="text-white py-1 px-3 bg-blue-500">
                                            1 Posts
                                        </div>
                                    </div>
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Technology
                                        </div>
                                        <div class="text-white py-1 px-3 bg-purple-500">
                                            7 Posts
                                        </div>
                                    </div>
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Traveling
                                        </div>
                                        <div class="text-white py-1 px-3 bg-red-500">
                                            6 Posts
                                        </div>
                                    </div>
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Sport
                                        </div>
                                        <div class="text-white py-1 px-3 bg-indigo-500">
                                            5 Posts
                                        </div>
                                    </div>
                                    <div class="py-2 px-5 flex justify-between items-center border-b">
                                        <div class="font-bold text-sm">
                                            <span><i class="far fa-folder mr-1"></i></span>Coding
                                        </div>
                                        <div class="text-white py-1 px-3 bg-pink-500">
                                            4 Posts
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscriber form -->
    </div>
</template>

<script>
    import axios from  'axios'
    export default {
        name: "Home",
        data : () => {
            return {
                posts : [],
                limited2 : [],
                limited3 : [],
                limited10 : [],
                limited10Db : []
            }
        },
        computed : {
            limitedTwo() {
                return this.limited2.slice(0,2)
            },
            limitedThree (){
                return this.limited3.slice(0,3)
            },
            limitedTen () {
                return this.limited10.slice(0,10)
            },
            limitedTenDb(){
                return this.limited10Db.slice(0,10)
            }
        },
        mounted() {
            axios.get('admin/api/article')
                .then(response => {
                    console.log(response.data["hydra:member"])
                    this.limited10Db = response.data["hydra:member"]
                })
                .catch(error => console.log(error));
            axios.get('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=bbced225efcd44d680c864f6691b3cd7')
                .then(resp => {
                    this.posts = resp.data.articles
                    this.limited2 = resp.data.articles
                    this.limited3 = resp.data.articles
                    this.limited10 = resp.data.articles
                } )
                .catch(function (error) {
                    console.log(error)
                })
        }
    }
</script>

<style scoped>

</style>