<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->keyword}%")
                ->orWhere('last_name', 'like', "%{$request->keyword}%")
                ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->filled('gender') && $request->gender !=0) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $response = new StreamedResponse(function() use ($contacts){
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', '作成日']);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他'),
                    $contact->email,
                    $contact->category->content ?? '',
                    $contact->created_at->format('Y-m-d')
                ]);
            }

            fclose($handle);
        });

        $filename = 'contacts_' . date('Ymd_His') . '.csv';
        $response->headers->set('Content-Type', 'text/csv; Charset=UTF-8');
        $response->headers->set('Content-Disposition', "attachment; filename={$filename}");

        return $response;
    }
}
