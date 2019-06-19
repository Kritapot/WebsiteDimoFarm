<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth');
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
            'post'  =>  $post,
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
            'description'   =>'required|min:2|max:6000'

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

    /**
     * Delete function
     *
     * @param $id
     * @return void
     */
    public function delete_post($id)
    {
        $post           =   $this->post->findOrFail($id);

        $image_path     = public_path()."/uploadimage/";
        $image          = $image_path. $post->photo;

        if(file_exists($image)){
            @unlink($image);
        }

        $post->delete();

    }

    /**
     * Find By Id function
     *
     * @param $id
     * @return jsonData
     */
    public function find_post($id)
    {
        $post   =   $this->post->findOrFail($id);

        return response()->json([
            'post' => $post,
        ], 200);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update_post(Request $request, $id)
    {
        $post       =   $this->post->findOrFail($id);

        $this->validate($request, [

            'title'         =>'required|min:2|max:50',
            'description'   =>'required|min:2|max:6000'
        ]);

        if($request->photo!=$post->photo){
            $strpos         = strpos($request->photo,';');
            $sub            = substr($request->photo,0,$strpos);
            $ex             = explode('/',$sub)[1];
            $name           = time().".".$ex;
            $img            = Image::make($request->photo)->resize(200, 200);
            $upload_path    = public_path()."/uploadimage/";
            $image          = $upload_path. $post->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $post->photo;
        }

        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->cat_id       = $request->cat_id;
        $post->user_id      = Auth::user()->id;
        $post->photo        = $name;
        $post->save();
    }

    /**
     * search by title and description function
     *
     * @return void
     */
    public function search_by_post()
    {
        $search             =   \Request::get('s');

        $searchByPost       =   $this->post->with('category', 'user')
                                ->where('title', 'LIKE', "%$search%")
                                ->orWhere('description', 'LIKE', "%$search%")
                                ->get();

        return response()->json([
            'searchByPost' => $searchByPost,
        ], 200);
    }

    /**
     * count all Post function
     *
     * @return jsonData
     */
    public function count_post_all()
    {
        $countPost      =   $this->post->count();

        return response()->json([
            'countPost' => $countPost,
        ], 200);
    }



}
