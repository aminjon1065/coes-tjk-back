<?php

namespace App\Http\Controllers;

use App\Models\CoesRecommends;
use Illuminate\Http\Request;

class CoesRecommendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommends = CoesRecommends::all();
        return response()->json($recommends);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param \App\Models\CoesRecommends $coesRecommends
     * @return \Illuminate\Http\Response
     */
    public function show(CoesRecommends $coesRecommends, $id)
    {
        $recommendsItem = CoesRecommends::findOrFail($id)->get();
        return response()->json($recommendsItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CoesRecommends $coesRecommends
     * @return \Illuminate\Http\Response
     */
    public function edit(CoesRecommends $coesRecommends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CoesRecommends $coesRecommends
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoesRecommends $coesRecommends)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CoesRecommends $coesRecommends
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoesRecommends $coesRecommends)
    {
        //
    }
}
