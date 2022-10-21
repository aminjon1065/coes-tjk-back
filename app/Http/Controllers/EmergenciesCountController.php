<?php

namespace App\Http\Controllers;

use App\Models\EmergenciesCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EmergenciesCountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $emergency)
    {
//        dd($emergency);
        $search = EmergenciesCount::where('emergency', "=", $emergency)->orderBy('count', 'asc')->get();
        return response()->json($search);
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
        $data = [
            'district' => $request->district,
            'count' => $request->count,
            'emergency' => $request->emergency,
            'year' => $request->year,
            'date' => $request->date
        ];
        $result = EmergenciesCount::create($data);
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\EmergenciesCount $emergenciesCount
     * @return \Illuminate\Http\Response
     */
    public function show(EmergenciesCount $emergenciesCount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\EmergenciesCount $emergenciesCount
     * @return \Illuminate\Http\Response
     */
    public function edit(EmergenciesCount $emergenciesCount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EmergenciesCount $emergenciesCount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmergenciesCount $emergenciesCount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\EmergenciesCount $emergenciesCount
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmergenciesCount $emergenciesCount)
    {
        //
    }
}
