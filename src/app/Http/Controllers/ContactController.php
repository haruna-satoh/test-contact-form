<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

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

    public function confirm(ContactRequest $request) {
        $nameView = $request->surname . ' ' . $request->name;
        $telView = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;
        $telDb = $request->tel1 . $request->tel2 . $request->tel3;

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

    public function adminList(Request $request) {
        $query = Contact::with('category');

        if($request->keyword) {
            $query->where(function($q) use ($request) {
                $q->where('last_name', 'like', "%{$request->keyword}%")->orWhere('first_name', 'like', "%{$request->keyword}%")->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->gender && $request->gender != '0') {
            $query->where('gender', $request->gender);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        return view('show', compact('contacts'));
    }
}
