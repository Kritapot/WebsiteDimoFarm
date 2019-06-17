import Axios from "axios";

export default  {
    state:  {
        category:       [],
        post:           [],
        blogPost:       [],
        singleBlogPost: [],
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
        }

    }
}
