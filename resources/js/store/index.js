import Axios from "axios";

export default  {
    state:  {
        category:           [],
        post:               [],
        blogPost:           [],
        singleBlogPost:     [],
        categorySideBar:    [],
        blogPostByCatId:    [],
        lateBlogPost:       [],
        contact:            [],

    },

    getters:    {
        getCategory(state)  {
            return state.category
        },

        getPost(state)  {
            return state.post
        },

        getBlogPost(state)  {
            return state.blogPost
        },

        getBlogPostById(state) {
            return state.singleBlogPost
        },

        getCategorySideBar(state) {
            return state.categorySideBar
        },

        getBlogPostByCatId(state) {
            return state.blogPostByCatId
        },

        getLateBlogPost(state) {
            return state.lateBlogPost
        },

        getListContact(state) {
            return state.contact
        }

    },

    actions:    {
        allCategory(context) {
            Axios.get('categories').then((respon) => {
                context.commit('categories', respon.data.categories)
            })
        },

        allPost(context) {
            Axios.get('posts').then((respon) => {
                context.commit('post', respon.data.post)
            })
        },

        allBlogPost(context) {
            Axios.get('blogpost').then((respon) => {
                context.commit('blogpost', respon.data.blogpost)
            })
        },

        allBlogPostById(context, playload) {
            Axios.get('/blogpost/'+playload).then((respon) => {
                context.commit('singleBolgPost', respon.data.singleBolgPost)
            })
        },

        allCategorySideBar(context) {
            Axios.get('/category-sidebar').then((respon) => {
                context.commit('categorySideBar', respon.data.categorySideBar)
            })
        },

        allPostByCatId(context, playload) {
            Axios.get('/blogpost-category-id/'+playload).then((respon) => {
                context.commit('postByCatId', respon.data.postByCatId)
            })
        },

        SearchPost(context, playload) {
            Axios.get('/search?s='+playload).then((respon) => {
                context.commit('searchPost', respon.data.searchBlogPost)
            })
        },

        searchByCatName(context, playload) {
            Axios.get('/search-by-category-name?s='+playload).then((respon) => {
                context.commit('searchCategoryName', respon.data.searchCategoryName)
            })
        },

        searchByPostName(context, playload=1) {
            Axios.get('/search-by-post?s='+playload).then((respon) => {
                console.log(respon.data.searchByPost)
                context.commit('searchByPost', respon.data.searchByPost)
            })
        },

        allLatePost(context) {
            Axios.get('/latepost').then((respon) => {
                context.commit('lateBlogPost', respon.data.latePost)
            })
        },

        allContact(context) {
            Axios.get('/get-contact').then((respon) => {
                context.commit('allContact', respon.data.allContact)
            })
        }

    },

    mutations:  {
        categories(state, data) {
            return state.category = data
        },

        post(state, playload) {
            return state.post   =   playload
        },

        blogpost(state, playload) {
            return state.blogPost   =   playload
        },

        singleBolgPost(state, playload) {
            return state.singleBlogPost     =   playload
        },

        categorySideBar(state, playload) {
            return state.categorySideBar    =   playload
        },

        postByCatId(state, playload) {
            state.blogPost   =   playload
        },

        searchPost(state, playload) {
            state.blogPost   =   playload
        },

        lateBlogPost(state, playload) {
            state.lateBlogPost  =   playload
        },

        searchCategoryName(state, playload) {
            state.category = playload
        },

        searchByPost(state, playload) {
            state.post   =   playload
        },

        allContact(state, playload) {
            return state.contact   =   playload
        },

    }
}
