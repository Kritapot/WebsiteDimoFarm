<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

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
     * @return array
     */
    public function all_posts()
    {
        $post   =    $this->post->with('category', 'user')
                                ->orderby('id', 'desc')
                                ->get();

        return response()->json([
            'post'  =>  $post
        ], 200);
    }
    /**
     * Save function
     *
     * @param Request $request
     * @return void
     */
    public function save_post(Request $request)
    {
        $post               = new Post();
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->cat_id       = $request->cat_id;
        $post->user_id      = Auth::user()->id;
        $post->save();
    }

}
