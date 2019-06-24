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
                                    ->paginate(5);

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

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
        $portfolioCategory      =   $this->portfolioCategory->where('id', $id)
                                    ->firstOrFail()
                                    ->delete();

    }


}
