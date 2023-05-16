<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
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
        $videos = $request->file('videos');
        if ($videos) {
            foreach ($videos as $video) {
                $name = $video->getClientOriginalName();
                Videos::create([
                    'name' => $name
                ]);
                $video->storeAs('public/videos', $name);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Videos $videos
     * @return \Illuminate\Http\Response
     */
    public function show(Videos $videos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Videos $videos
     * @return \Illuminate\Http\Response
     */
    public function edit(Videos $videos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Videos $videos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $videos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Videos $videos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $videos)
    {
        //
    }
}
