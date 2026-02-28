<?php

namespace App\Http\Controllers;

// use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\ConfirmRequest;
// use Illuminate\Http\Request\FormRequest;
use App\Model\Contact;
use App\Models\Contact as ModelsContact;
use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;

class FormController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function confirm(ConfirmRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        $contact['know'] = $request->input('know', []);
        return view('confirm', compact('contact'));
    }
    public function store(ConfirmRequest $request)
    {
        if ($request['action'] === 'send') {
            $contact =  $request->only(['name', 'email', 'tel', 'content']);
            $contact['know'] = $request->input('know', []); #未選択時も配列
            ModelsContact::create($contact);
            return view('thanks');
        }
        if ($request['action'] === 'back') {
            $contact =  $request->only(['name', 'email', 'tel', 'content']);
            $contact['know'] = $request->input('know', []);
            return redirect('/')->withInput($contact); #戻る時はredirect！！
        }
        return redirect('/');
    }
}
