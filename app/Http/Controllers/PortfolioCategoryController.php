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

    }

    public function save(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }


}
