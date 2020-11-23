<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function show() {
        $categories = Category::homepage();
        return view('frontend.' . config('nextgen.theme') . '.contact.show', compact('categories'));
    }

    public function submit(Request $request) {
        Mail::to(env('ADMIN_EMAIL','amruthcharank@gmail.com'))->send(new Contact($request->all()));
        return Redirect::back()->with('contact-success', "Thank you for contacting us – we will get back to you soon!");
    }
}
