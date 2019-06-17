<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;


class BlogController extends Controller
{
    protected $blogPost;

    public function __construct(Post $blogPost)
    {
        $this->blogPost = $blogPost;
    }

    public function get_all_blogpost()
    {
        $blogPost       =   $this->blogPost->with('category', 'user')
                            ->orderby('id', 'desc')
                            ->get();

        return response()->json([
            "blogpost"  =>  $blogPost
        ], 200);
    }
}
