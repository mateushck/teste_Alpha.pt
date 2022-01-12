<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
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
        return view('welcome', [
            'contacts' =>  $contacts,
        ]);
    }

    
    public function viewContact(Request $request){
        if(($request->id <> null) && ($request->id <> "")){
            $contact = \App\Models\Contact::where('id','=',$request->id)->first();
            return view('home', [
                'contact' =>  $contact,
            ]);
        }else{
            return view('home');
        }
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
        try{

            $dados = $request->validate([
                  'name'  => [
                     'required',
                     'string',
                     'min:5',
                     'max:255',
                 ],
                  'email' => [
                     'email',
                     'required',
                     'max:255',
                     Rule::unique('contacts')->ignore($request->id),
                 ],
                 'contact'  => [
                     'required',
                     'string',
                     'min:9',
                     'max:9',
                     Rule::unique('contacts')->ignore($request->id), 
                 ],
             ]);
             
         } catch (\Illuminate\Validation\ValidationException $e) {
             $errorMessages = '';
             foreach($e->errors() as $key => $value) {
                 $errorMessages .= $value[0]."<br>";
             }
             Alert::html("Registration Error!",$errorMessages,'error');
             return Redirect::to('/home');
         }



        if(($request->id <> null) && ($request->id <> "")){
            $contact = \App\Models\Contact::where('id','=',$request->id)->first();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->contact = $request->contact;
            $contact->save();
            Alert::html("Success","Registration Successful!",'success');
            return Redirect::to('home');
        }else{
            
            $contact = new \App\Models\Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->contact = $request->contact;
            $contact->save();
            return Redirect::to('/');
        }
    }
    public function deleteContact(Request $request){
        if(($request->id <> null) && ($request->id <> "")){
            $contact = \App\Models\Contact::where('id','=',$request->id)->first();
            $contact->delete();
            Alert::html("Delete Success","Registration Delete Successful!",'success');
            return view('/');
        }else{
            return view('/');
        }
    }
}
