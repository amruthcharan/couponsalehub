<?php

namespace App\Http\Controllers;

use App\Heading;
use Illuminate\Http\Request;

class HeadingsController extends Controller
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
        Heading::create([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'order'       => $request->input('order'),
            'store_id'    => $request->input('store_id')
        ]);
        return response(Heading::whereStoreId($request->input('store_id'))->orderBy('order')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function show(Heading $heading)
    {
        return response($heading);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function edit(Heading $heading)
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
    public function update(Request $request, Heading $heading)
    {
        $heading->update([
                'title'       => $request->input('title'),
                'description' => $request->input('description'),
                'order'       => $request->input('order'),
            ]);
        return response(Heading::whereStoreId($request->input('store_id'))->orderBy('order')->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Heading  $heading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heading $heading)
    {
        $store_id = $heading->store_id;
        $heading->delete();
        return response(Heading::whereStoreId($store_id)->orderBy('order')->get());
    }
}
