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

}
