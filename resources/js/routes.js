import AdminHome from './components/admin/AdminHome.vue'
//Category
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'
//Post
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'


//Fontend BlogHome
import PublicHome from './components/public/PublicHome.vue'
import ContactUs from './components/public/Contact.vue'
import BlogPost from './components/public/blog/BlogPost.vue'





export const routes = [
    {
        path: '/home',
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

    //Fontend BlogHome
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


]
