import AdminHome from './components/admin/AdminHome.vue'
//Category
import CategoryList from './components/admin/category/List.vue'
import AddCategory  from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'
//Post
import PostList from './components/admin/post/List.vue'
import AddPost  from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'

//Contact
import ContactAdmin             from './components/admin/contact/List.vue'
import SingleContactAdmin       from './components/admin/contact/Single.vue'

//AboutUs
import AboutUsAdmin             from './components/admin/about/AboutUs.vue'

//OurService
import OurService             from './components/admin/our-service/OurService.vue'

//Porfolio-category
import PorfolioCatList      from './components/admin/porfolio-category/List.vue'
import PorfolioCatNew       from './components/admin/porfolio-category/New.vue'
import PorfolioCatEdit      from './components/admin/porfolio-category/Edit.vue'

//Porfolio
import PortfolioList      from './components/admin/portfolio/List.vue'
import PortfolioNew       from './components/admin/portfolio/New.vue'
import PortfolioEdit      from './components/admin/portfolio/Edit.vue'

//Status
import Status             from './components/admin/status/Status.vue'


//Fontend BlogHome
import PublicHome   from './components/public/PublicHome.vue'
import ContactUs    from './components/public/Contact.vue'
import BlogPost     from './components/public/blog/BlogPost.vue'
import BlogSingle   from './components/public/blog/BlogSingle.vue'
import AboutUs      from './components/public/AboutUs.vue'
import Slide        from './components/public/Slide.vue'
import Portfolio    from './components/public/Portfolio.vue'





export const routes = [
    {
        path: '/admin-home',
        component: AdminHome
    },

    {
        path: '/category-list',
        component: CategoryList
    },

    {
        path: '/add-category',
        component: AddCategory
    },

    {
        path: '/edit-category/:id',
        component: EditCategory
    },

    {
        path: '/post-list',
        component: PostList
    },

    {
        path: '/add-post',
        component: AddPost
    },

    {
        path: '/edit-post/:postId',
        component: EditPost
    },

    {
        path: '/contact-admin',
        component: ContactAdmin
    },

    {
        path: '/contact-admin/:id',
        component: SingleContactAdmin
    },

    {
        path: '/about-us-admin',
        component: AboutUsAdmin
    },

    {
        path: '/our-service',
        component: OurService
    },

    {
        path: '/portfolio-cat-list',
        component: PorfolioCatList
    },

    {
        path: '/portfolio-cat-add',
        component: PorfolioCatNew
    },

    {
        path: '/portfolio-cat-edit/:id',
        component: PorfolioCatEdit
    },

    {
        path: '/status',
        component: Status
    },

    {
        path: '/portfolio-add',
        component: PortfolioNew
    },

    {
        path: '/portfolio-edit/:id',
        component: PortfolioEdit
    },

    {
        path: '/portfolio-list',
        component: PortfolioList
    },



    //Fontend BlogHome Page
    {
        path: '/',
        component: PublicHome
    },
    {
        path: '/contact',
        component: ContactUs
    },
    {
        path: '/blogpost',
        component: BlogPost
    },
    {
        path: '/blogpost/:blogpostId',
        component: BlogSingle
    },
    {
        path: '/blogpost-by-catid/:catId',
        component: BlogPost
    },

    {
        path: '/about-us',
        component: AboutUs
    },

    {
        path: '/slide',
        component: Slide
    },

    {
        path: '/portfolio',
        component: Portfolio
    },


]
