import Vue from 'vue'
import Router from 'vue-router'
import Articleindex from "./components/Articleindex";

Vue.use(Router)

export default new Router({
    mode : 'history',
    routes : [
        {
            path : 'admin/articleapi/',
            name : 'articleindex',
            component : Articleindex
        }
    ]

}

)