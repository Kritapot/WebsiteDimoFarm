<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Image;


class PortfolioController extends Controller
{
    protected $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->middleware('auth');
        $this->portfolio = $portfolio;
    }

    /**
     * list function
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $portfolio      =   $this->portfolio
                            ->with('portfolio_category')
                            ->orderby('id', 'desc')
                            ->paginate(5);

        return response()->json([
            'portfolio' =>  $portfolio
        ]);
    }

    /**
     * save function
     *
     * @param Request $request
     * @return App\Portfolio
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'cat_id'         =>'required',
            'type'           =>'required',
            'photo'          =>'required'
        ]);

        $strpos             = strpos($request->photo,';');
        $sub                = substr($request->photo,0,$strpos);
        $ex                 = explode('/',$sub)[1];
        $namePic               = time().".".$ex;
        $img                = Image::make($request->photo)->resize(200, 200);
        $upload_path        = public_path().'/uploadimage-portfolio/';
        $img->save($upload_path.$namePic);

        $portfolio                  = new Portfolio();
        $portfolio->title           = $request->title;
        $portfolio->cat_id          = $request->cat_id;
        $portfolio->type            = $request->type;
        $portfolio->photo           = $namePic;
        $portfolio->save();
    }

    /**
     * find by id function
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function find_by_id($id)
    {
        $portfolio  =  $this->portfolio->where('id', $id)
                        ->with('portfolio_category')
                        ->firstOrFail();

        return response()->json([
            'portfolio' =>  $portfolio
        ]);
    }

    /**
     * update function
     *
     * @param Request $request
     * @param  $id
     * @return App\Portfolio
     */
    public function update(Request $request, $id)
    {
        $portfolio  =  $this->portfolio->where('id', $id)
                        ->with('portfolio_category')
                        ->firstOrFail();

        $this->validate($request, [
            'cat_id'         =>'required',
            'type'           =>'required',
            'photo'          =>'required'
        ]);

        if($request->photo!=$portfolio->photo){
            $strpos         = strpos($request->photo,';');
            $sub            = substr($request->photo,0,$strpos);
            $ex             = explode('/',$sub)[1];
            $name           = time().".".$ex;
            $img            = Image::make($request->photo)->resize(200, 200);
            $upload_path    = public_path()."/uploadimage-portfolio/";
            $image          = $upload_path. $portfolio->photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
            }else{
                $name = $portfolio->photo;
            }

        $portfolio->title           = $request->title;
        $portfolio->cat_id          = $request->cat_id;
        $portfolio->type            = $request->type;
        $portfolio->photo           = $name;
        $portfolio->save();

    }

    /**
     * delete function
     *
     * @param $id
     * @return App\Portfolio
     */
    public function delete($id)
    {
           $this->portfolio->where('id', $id)
            ->firstOrFail()
            ->delete();
    }
}
