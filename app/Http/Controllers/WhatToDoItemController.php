<?php

namespace App\Http\Controllers;

use App\Models\WhatToDo;
use App\Models\WhatToDoItem;
use Illuminate\Http\Request;

class WhatToDoItemController extends Controller
{
    public function index()
    {
        $items = WhatToDoItem::all();
        return response()->json($items);
    }

    public function store(Request $request)
    {
//        return response()->json($request->all());
//        $whatToDo = isset($request->what_to_dos_id) ? $request->what_to_dos_id : $request->what_to_dos;
        if ($request->what_to_dos_id) {
            $whatToDoCreate = WhatToDo::create(['title' => $request->what_to_dos_id]);
            $whatToDoCreated = $whatToDoCreate->id;
        } else if ($request->what_to_dos) {
            $whatToDoCreated = $request->what_to_dos;
        }

        $data = [
            'name' => $request->nameWhatToDo,
            'description' => $request->description,
            $image = $request->file('image'),
            $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->getClientOriginalExtension(),
            $imagePath = public_path('/what-to-do'),
            $image->move($imagePath, $imageName),
            'image' => $imageName,
            'what_to_dos_id' => $whatToDoCreated
        ];
//        return response()->json($request->all());
        $itemCreated = WhatToDoItem::create($data);
        return response()->json($itemCreated);
    }
}
