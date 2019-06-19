<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }
    /**
     * Save function
     *
     * @param Request $request
     * @return array
     */
    public function save_category(Request $request)
    {

        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);

        $newCategory                =    New Category();
        $newCategory->cat_name      =    $request->cat_name;
        $newCategory->save();

       return $newCategory;
    }
    /**
     * Get All Categories function
     *
     * @return jsonData
     */
    public function all_category()
    {
        $categories =   $this->category->get();
        return response()->json([
            'categories'    =>  $categories
        ], 200);
    }
    /**
     * Delete function
     *
     * @param int $id
     * @return void
     */
    public function delete_category($id)
    {
        $this->category->findOrFail($id)->delete();
    }
    /**
     * Find by id function
     *
     * @param $id
     * @return int
     */
    public function find_category($id)
    {
        $category   =   $this->category->findOrFail($id);

        return response()->json([
            'category'  =>  $category
        ], 200);
    }
    /**
     * Update function
     *
     * @param Request $request
     * @param $id
     * @return array
     */
    public function update_category(Request $request, $id)
    {
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);

        $category                   =   $this->category->findOrFail($id);
        $category->cat_name         =   $request->cat_name;
        $category->save();
    }


    public function search_cat_name()
    {
        $search                 =   \Request::get('s');

        $searchCategoryName     =   $this->category->where('cat_name', 'LIKE', "%$search%")
                                    ->get();
        return response()->json([
            'searchCategoryName'  =>  $searchCategoryName
        ], 200);
    }

}
