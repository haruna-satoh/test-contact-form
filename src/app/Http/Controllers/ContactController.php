<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    private $categories = [
        1 => '商品のお届けについて',
        2 => '商品の交換について',
        3 => '商品のトラブル',
        4 => 'ショップへのお問い合わせ',
        5 => 'その他',
    ];

    public function index() {
        return view('index');
    }

    public function confirm(Request $request) {
        $nameView = $request->surname . ' ' . $request->name;
        $telView = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $telDb = $request->tel . $request->tel2 . $request->tel3;

        $request->session()->put('contact', [
            'category_id' => $request->category_id,
            'first_name' => $request->name,
            'last_name' => $request->surname,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $telDb,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'tel3' => $request->tel3,
            'address' => $request->address,
            'building' => $request->building,
            'detail' =>$request->content,
        ]);

        return view('confirm', [
            'name'=> $nameView,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $telView,
            'address' => $request->address,
            'building' => $request->building,
            'category' => $this->categories[$request->category_id] ?? '',
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
