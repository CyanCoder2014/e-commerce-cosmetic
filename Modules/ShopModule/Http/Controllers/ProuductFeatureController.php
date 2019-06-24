<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ShopModule\Products\ProuductFeature;

class ProuductFeatureController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProuductFeature  $prouductFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProuductFeature $prouductFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProuductFeature  $prouductFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ProuductFeature $prouductFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProuductFeature  $prouductFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProuductFeature $prouductFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProuductFeature  $prouductFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProuductFeature $prouductFeature)
    {
        //
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = ProuductFeature::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }
}
