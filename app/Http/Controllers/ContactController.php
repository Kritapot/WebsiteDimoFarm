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
        dd($request);
    }

}
