import Axios from "axios";

export default  {
    state:  {
        category: [],
        post: [],
    },
    getters:    {
        getCategory(state)  {
            return state.category
        },

        getPost(state)  {
            return state.post
        },
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
    },
    mutations:  {
        categories(state, data) {
            return state.category = data
        },

        post(state, playload) {
            return state.post   =   playload
        },
    }
}
