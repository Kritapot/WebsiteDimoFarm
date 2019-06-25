<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfolioController extends Controller
{
    protected $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->middleware('auth');
        $this->portfolio = $portfolio;
    }


    public function list()
    {

    }


    public function save(Request $request)
    {

    }


    public function find_by_id($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function delete($id)
    {

    }
}
