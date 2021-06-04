<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Store;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Faq::create([
            'question'    => $request->input('question'),
            'answer'      => $request->input('answer'),
            'order'       => $request->input('order'),
            'store_id'    => $request->input('store_id')
        ]);
        Store::where('id', $request->store_id)->update(['updated_at' => now()]);
        return response(Faq::whereStoreId($request->input('store_id'))->orderBy('order')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return response($faq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update([
                'question' => $request->input('question'),
                'answer'   => $request->input('answer'),
                'order'    => $request->input('order'),
            ]);
        Store::where('id', $request->store_id)->update(['updated_at' => now()]);

        return response(Faq::whereStoreId($request->input('store_id'))->orderBy('order')->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $store_id = $faq->store_id;
        $faq->delete();
        return response(Faq::whereStoreId($store_id)->orderBy('order')->get());
    }
}
