<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //List all contacts in index board.
    public function index()
    {
        $contacts = \App\Models\Contact::orderBy('id')->get();
        return view('home', [
            'contacts' =>  $contacts,
        ]);
    }

    //Get Contact for Edit.
    public function editContact(Request $request){
        if(($request->id <> null) && ($request->id <> "")){
            $contact = \App\Models\Contact::where('id','=',$request->id)->first();
            return view('contact', [
                'contact' =>  $contact,
            ]);
        }else{
            return view('contact');
        }
    }


    //Save Contacts and redirect do home
    public function saveContact(Request $request){
        if(($request->id <> null) && ($request->id <> "")){
            $contact = \App\Models\Contact::where('id','=',$request->id)->first();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->contact = $request->contact;
            $contact->save();

            return Redirect::to('home');
        }else{
            $contact = new \App\Models\Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->contact = $request->contact;
            $contact->save();
            return Redirect::to('home');
        }
    }
    public function deleteContact(Request $request){
        dd($request);
    }
}
