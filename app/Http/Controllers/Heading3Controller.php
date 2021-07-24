<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Heading;
use App\Heading3;
use Illuminate\Http\Request;

class Heading3Controller extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'heading_id' => 'required',
            'store_id' => 'required',
            'order' => 'required',
            'description' => 'sometimes'
        ]);
        // return ($validated);
        Heading3::create($validated);
        return response(Heading::with('h3s')->whereStoreId($request->input('store_id'))->orderBy('order')->get());
        
    }

    public function show($id)
    {
        
        return response(Heading3::find($id));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\heading3  $heading3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'heading_id' => 'required',
            'store_id' => 'required',
            'order' => 'required',
            'description' => 'sometimes'
        ]);
        Heading3::find($id)->update($validated);
        return response(Heading::with('h3s')->whereStoreId($request->input('store_id'))->orderBy('order')->get());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\heading3  $heading3
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $heading3 = Heading3::find($id);
        $store_id = $heading3->store_id;
        Coupon::where('h3_id', $heading3->id)->update(['heading_id' => $heading3->heading_id]);
        $heading3->delete();
        return response(Heading::with('h3s')->whereStoreId($store_id)->orderBy('order')->get());
    }
}
