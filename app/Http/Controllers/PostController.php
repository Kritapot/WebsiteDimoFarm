<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * FindMany function
     *
     * @return void
     */
    public function all_posts()
    {
        $post   =    $this->post->with('category', 'user')->get();

        return response()->json([
            'post'  =>  $post
        ], 200);
    }

}
