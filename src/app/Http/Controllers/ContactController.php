<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(Request $request) {
        $nameView = $request->surname . ' ' . $request->name;
        $telView = $request->tel . '-' . $request->tel2 . '-' . $request->tel3;

        return view('confirm', [
            'name'=> $nameView,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $telView,
            'address' => $request->address,
            'building' => $request->building,
            'select' => $request->select,
            'contact' => $request->contact,

        ]);
    }

    public function store(Request $request) {
        return view('thanks');
    }
}
