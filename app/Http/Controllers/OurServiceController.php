<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OurService;

class OurServiceController extends Controller
{
    protected $ourservice;

    public function __construct(OurService $ourservice)
    {
        $this->ourservice  = $ourservice;
    }

    /**
     * get ourservice by id function
     *
     * @return \Illuminate\Http\Response
     */
    public function get_ourservice_by_id()
    {
        $ourservice     =   $this->ourservice->where('id', 1)
                            ->firstOrFail();

        return response()->json([
            'ourservice'    =>  $ourservice
        ]);
    }

    /**
     * update function
     *
     * @param Request $request
     * @return App\OurService
     */
    public function update_ourservice(Request $request)
    {
       $ourservice      =   $this->ourservice->where('id', 1)
                            ->firstOrFail();

        $this->validate($request, [

            'title1'          =>'required|min:10|max:100',
            'description1'    =>'required|min:10|max:300',
            'title2'          =>'required|min:10|max:100',
            'description2'    =>'required|min:10|max:300',
            'title3'          =>'required|min:10|max:100',
            'description3'    =>'required|min:10|max:300',
            'title4'          =>'required|min:10|max:100',
            'description4'    =>'required|min:10|max:300',

        ]);

        $ourservice->title1                 =   $request->title1;
        $ourservice->description1           =   $request->description1;
        $ourservice->title2                 =   $request->title2;
        $ourservice->description2           =   $request->description2;
        $ourservice->title3                 =   $request->title3;
        $ourservice->description3           =   $request->description3;
        $ourservice->title4                 =   $request->title4;
        $ourservice->description4           =   $request->description4;
        $ourservice->save();
    }
}
