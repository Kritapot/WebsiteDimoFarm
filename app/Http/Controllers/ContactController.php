<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact  = $contact;
    }

    /**
     * Save contact function
     *
     * @param Request $request
     * @return Model App\Contact
     */
    public function save_contact(Request $request)
    {
        $this->validate($request, [

            'contact_name'    =>'required|min:2|max:50',
            'contact_email'   =>'required|min:2|max:50',

        ]);

        $saveContact                        =       new Contact();
        $saveContact->contact_name          =       $request->contact_name;
        $saveContact->contact_email         =       $request->contact_email;
        $saveContact->contact_subject       =       $request->contact_subject;
        $saveContact->contact_message       =       $request->contact_message;
        $saveContact->save();
    }

    /**
     * get all list contact function
     *
     * @return jsonData
     */
    public function get_all_contact()
    {
        $getAllContact      =   $this->contact->orderBy('id', 'desc')->get();

        return response()->json([
            'allContact'  =>  $getAllContact
        ], 200);
    }

    /**
     * delete function
     *
     * @param $id
     * @return Model App\Contact
     */
    public function delete_contact($id)
    {
        $this->contact->where('id', $id)->delete();
    }


    public function get_by_contact_id($id) {
        $contactById        =       $this->contact->where('id', $id)->get();

        return response()->json([
            'contactById'  =>  $contactById
        ], 200);
    }

}
