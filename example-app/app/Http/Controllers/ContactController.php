<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'contact')->firstOrFail();
        return view('contact', compact('page'));
    }

    public function store(Request $request)
    {
        Contact::create($request->only('name', 'email', 'phone', 'message'));
        return back()->with('success', 'Gửi liên hệ thành công');
    }

}
