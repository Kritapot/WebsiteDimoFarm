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
        countCategory:      [],
        countPost:          [],
        findContact:        [],
        contact:            [],
        portfolioCategory:  [],
        aboutUsHome:        [],
        ourservice:         [],
        portfolio:         [],

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
        },

        getCountCategory(state) {
            return state.countCategory
        },

        getCountPost(state) {
            return state.countPost
        },

        getFindContact(state) {
            return state.findContact
        },

        portfolioCategory(state) {
            return state.portfolioCategory
        },

        aboutUsData(state) {
            return state.aboutUsHome
        },

        ourService(state) {
            return state.ourservice
        },

        allPortfolio(state) {
            return state.portfolio
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

        searchByPostName(context, playload) {
            Axios.get('/search-by-post?s='+playload).then((respon) => {
                context.commit('searchByPost', respon.data.searchByPost)
            })
        },

        allLatePost(context) {
            Axios.get('/latepost').then((respon) => {
                context.commit('lateBlogPost', respon.data.latePost)
            })
        },

        allContact(context) {
            Axios.get('/contact').then((respon) => {
                context.commit('allContact', respon.data.allContact)
            })
        },

        ApicountCategory(context) {
            Axios.get('/count-category').then((respon) => {
                console.log(respon.data.countCategory)
                context.commit('countCategory', respon.data.countCategory)
            })
        },

        ApicountPost(context) {
            Axios.get('/count-post').then((respon) => {
                console.log(respon.data.countCategory)
                context.commit('countPost', respon.data.countPost)
            })
        },

        ApiFindContact(context, playload) {
            Axios.get('/contact/'+playload).then((respon) => {
                console.log(respon.data.contactById)
                context.commit('contactById', respon.data.contactById)
            })
        },

        getPortfolioCategory(context) {
            axios.get('/portfolio-category').then((respon) => {
                console.log(respon.data.portfolioCategory)
                context.commit('portfolioCategory', respon.data.portfolioCategory)
            })
        },

        searchByCatNamePortfolio(context, playload) {
            Axios.get('/search-by-portfolio-category?s='+playload).then((respon) => {
                context.commit('searchPortfolioByCat', respon.data.searchCategoryName)
            })
        },

        getApiAboutUs(context) {
            Axios.get('/home-about-us').then((respon) => {
                console.log(respon.data)
                context.commit('allAboutUs', respon.data.aboutUs)
            })
        },

        getApiOurservice(context) {
            Axios.get('/home-ourservice').then((respon) => {
                console.log(respon.data.ourservice)
                context.commit('ourservice', respon.data.ourservice)
            })
        },

        getApiPortfolio(context) {
            Axios.get('/home-portfolio').then((respon) => {
                console.log(respon.data.portfolio)
                context.commit('portfolio', respon.data.portfolio)
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

        countCategory(state, playload) {
            return state.countCategory  =   playload
        },

        countPost(state, playload) {
            return state.countPost  =   playload
        },

        contactById(state, playload) {
            return state.findContact    =   playload
        },

        portfolioCategory(state, playload) {
            return state.portfolioCategory  =   playload
        },

        searchPortfolioByCat(state, playload) {
            state.portfolioCategory  =   playload
        },

        allAboutUs(state, playload) {
            return state.aboutUsHome  =   playload
        },

        ourservice(state, playload) {
            return state.ourservice     =   playload
        },

        portfolio(state, playload) {
            return state.portfolio      =   playload
        }
    }
}
