<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;
use Image;

class AboutUsController extends Controller
{
    protected $aboutUs;

    public function __construct(AboutUs $aboutUs)
    {
        $this->middleware('auth');
        $this->aboutUs = $aboutUs;
    }

    /**
     * Get about-us by id function
     *
     * @return \Illuminate\Http\Response
     */
    public function get_about_us_id()
    {
        $aboutUs        =   $this->aboutUs->where('id', 1)->first();

        return response()->json([
            'aboutUs'   =>  $aboutUs
        ]);
    }


    public function update_about_us(Request $request)
    {
        $aboutUs    =   $this->aboutUs->where('id', 1)->first();

        $this->validate($request, [

            'title'         =>'required|min:2|max:50',
            'description'   =>'required|min:2|max:6000'
        ]);

        if($request->photo!=$aboutUs->photo){
            $strpos         = strpos($request->photo,';');
            $sub            = substr($request->photo,0,$strpos);
            $ex             = explode('/',$sub)[1];
            $name           = time().".".$ex;
            $img            = Image::make($request->photo)->resize(500, 500);
            $upload_path    = public_path()."/uploadimage-about/";
            $image          = $upload_path. $aboutUs->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $aboutUs->photo;
        }

        $aboutUs->title                 =   $request->title;
        $aboutUs->description           =   $request->description;
        $aboutUs->photo                 =   $name;
        $aboutUs->save();
    }


}
