<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;


class BlogController extends Controller
{
    protected $blogPost;
    protected $category;


    public function __construct(Post $blogPost, Category $category)
    {
        $this->blogPost = $blogPost;
        $this->category = $category;
    }
    /**
     * Get all blogpost function
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_blogpost()
    {
        $blogPost       =   $this->blogPost->with('category', 'user')
                            ->orderby('id', 'desc')
                            ->get();

        return response()->json([
            "blogpost"  =>  $blogPost
        ], 200);
    }
    /**
     * Get Single BlogPost by ID function
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function get_by_find_blogpost($id)
    {
        $singleBolgPost     =   $this->blogPost->with('category', 'user')
                                ->where('id', $id)
                                ->firstOrFail();

        return response()->json([
            "singleBolgPost"  =>  $singleBolgPost
        ], 200);
    }

    /**
     * Get all category for sidebar function
     *
     * @return \Illuminate\Http\Response
     */
     public function get_category_sidebar()
    {
        $categorySideBar    =   $this->category->get();

        return response()->json([
            "categorySideBar"  =>  $categorySideBar
        ], 200);
    }

    /**
     * Get all post by cat_id function
     *
     * @return \Illuminate\Http\Response
     */
    public function get_post_by_category_id($id)
    {
        $postByCatId    =   $this->blogPost->with('category', 'user')
                            ->where('cat_id', $id)
                            ->get();

        return response()->json([
            "postByCatId"  =>  $postByCatId
        ], 200);
    }

    /**
     * Search Post by title and description function
     *
     * @return \Illuminate\Http\Response
     */
    public function search_post()
    {
        $search         =   \Request::get('s');

            $blogPost       =   $this->blogPost->with('category', 'user')
                            ->where('title', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%")
                            ->get();

            return response()->json([
                "searchBlogPost"  =>  $blogPost
            ], 200);

    }


    public function get_latepost()
    {
        $latePost       =   $this->blogPost->with('category', 'user')
                            ->orderBy('id', 'desc')
                            ->get();

        return response()->json([
            "latePost"  =>  $latePost
        ], 200);
    }

}
