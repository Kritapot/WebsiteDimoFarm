<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use Image;

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

        $this->validate($request, [

            'title'         =>'required|min:2|max:50',
            'description'   =>'required|min:2|max:1000'

        ]);

        $strpos             = strpos($request->photo,';');
        $sub                = substr($request->photo,0,$strpos);
        $ex                 = explode('/',$sub)[1];
        $namePic               = time().".".$ex;
        $img                = Image::make($request->photo)->resize(200, 200);
        $upload_path        = public_path().'/uploadimage/';
        $img->save($upload_path.$namePic);


        $post               = new Post();
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->cat_id       = $request->cat_id;
        $post->user_id      = Auth::user()->id;
        $post->photo        = $namePic;
        $post->save();
    }

}
