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
     * @return JsonData
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
     * @return JsonData
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
     * @return JsonData
     */
     public function get_category_sidebar()
    {
        $categorySideBar    =   $this->category->get();

        return response()->json([
            "categorySideBar"  =>  $categorySideBar
        ], 200);
    }
}
