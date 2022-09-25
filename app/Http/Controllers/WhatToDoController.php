<?php

namespace App\Http\Controllers;

use App\Models\WhatToDo;
use Illuminate\Http\Request;

class WhatToDoController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function index()
    {
        $items = WhatToDo::all();
        return response()->json($items);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * //     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            $image = $request->file('image'),
            $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->getClientOriginalExtension(),
            $imagePath = public_path('/what-to-do'),
            $image->move($imagePath, $imageName),
            'image' => $imageName,
        ];

        $whatToDo = WhatToDo::create($data);
        return response()->json($whatToDo);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WhatToDo $whatToDo
     * @return \Illuminate\Http\Response
     */
    public function show(WhatToDo $whatToDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WhatToDo $whatToDo
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatToDo $whatToDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WhatToDo $whatToDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhatToDo $whatToDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WhatToDo $whatToDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatToDo $whatToDo)
    {
        //
    }
}
