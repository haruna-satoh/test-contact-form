<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(Request $request) {
        $nameView = $request->surname . ' ' . $request->name;
        $telView = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $telDb = $request->tel . $request->tel2 . $request->tel3;

        $request->session()->put('contact', [
            'surname' => $request->surname,
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $telDb,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'tel3' => $request->tel3,
            'address' => $request->address,
            'building' => $request->building,
            'select' => $request->select,
            'content' =>$request->content,
        ]);

        return view('confirm', [
            'name'=> $nameView,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $telView,
            'address' => $request->address,
            'building' => $request->building,
            'select' => $request->select,
            'content' => $request->content,

        ]);
    }

    public function store(Request $request) {
        $contactData = $request->session()->get('contact');

        Contact::create($contactData);

        $request->session()->forget('contact');

        return redirect()->route('thanks');
    }

    public function thanks() {
        return view('thanks');
    }
}
