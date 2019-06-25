<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    protected $status;

    public function __construct(Status $status)
    {
        $this->middleware('auth');
        $this->status = $status;
    }

    /**
     * get by id function
     *
     * @return \Illuminate\Http\Response
     */
    public function find_by_id()
    {
        $status     =   $this->status->where('id', 1)
                        ->firstOrFail();

        return response()->json([
            'status'    =>  $status
        ]);
    }

    /**
     * update function
     *
     * @param Request $request
     * @return App\Status
     */
    public function update(Request $request)
    {
        $status     =   $this->status->where('id', 1)
                        ->firstOrFail();

        $this->validate($request, [

            'status'            =>'required',
            'description'       =>'required|min:2|max:200'
        ]);

        $status->status          =   $request->status;
        $status->description     =   $request->description;
        $status->save();
    }
}
