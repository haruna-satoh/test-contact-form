<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('index');
    }

    public function confirm(Request $request) {
        $inputs = $request->all();
        return view('confirm', compact('inputs'));
    }

    public function store(Request $request) {
        return view('thanks');
    }
}
