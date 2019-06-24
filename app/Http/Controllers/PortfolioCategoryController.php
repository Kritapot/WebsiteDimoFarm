<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioCategory;

class PortfolioCategoryController extends Controller
{
    protected $portfolioCategory;

    public function __construct(PortfolioCategory $portfolioCategory)
    {
        $this->middleware('auth');
        $this->portfolioCategory = $portfolioCategory;
    }


    public function list()
    {
        $portfolioCategory      =   $this->portfolioCategory->orderby('id', 'desc')
                                    ->get();

        return response()->json([
            'portfolioCategory'     =>  $portfolioCategory
        ]);
    }

    /**
     * save function
     *
     * @param Request $request
     * @return App\PortfolioCategory
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'cat_name'          =>'required|min:2|max:100',
        ]);

        $portfolioCategory              =   new PortfolioCategory();
        $portfolioCategory->cat_name    =   $request->cat_name;
        $portfolioCategory->save();

    }

    /**
     * Find by id function
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function find_by_id($id)
    {
        $portfolioCategory      =   $this->portfolioCategory->where('id', $id)
                                    ->firstOrFail();

        return response()->json([
            'portfolioCategory'     =>  $portfolioCategory
        ]);

    }

    public function update(Request $request, $id)
    {
        $portfolioCategory      =   $this->portfolioCategory->where('id', $id)
                                    ->firstOrFail();

        $this->validate($request, [
            'cat_name'          =>'required|min:2|max:100',
        ]);

        $portfolioCategory->cat_name    =   $request->cat_name;
        $portfolioCategory->save();


    }

    public function delete($id)
    {
           $this->portfolioCategory->where('id', $id)
                ->firstOrFail()
                ->delete();

    }


    /**
     * Search by cat_name function
     *
     * @return \Illuminate\Http\Response
     */
    public function search_cat_name()
    {
        $search                 =   \Request::get('s');

        $searchCategoryName     =   $this->portfolioCategory->where('cat_name', 'LIKE', "%$search%")
                                    ->get();
        return response()->json([
            'searchCategoryName'  =>  $searchCategoryName
        ], 200);
    }


}
