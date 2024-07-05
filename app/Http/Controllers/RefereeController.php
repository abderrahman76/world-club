<?php

namespace App\Http\Controllers;

use App\Models\matchs;
use App\Models\referee;
use Illuminate\Http\Request;

class RefereeController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referee = referee::where('name' , auth()->user()->name)->first();

        $matchs = matchs::where('referee_id', $referee->id)->get();
        // dd($matchs);
        return view('refereeMatch')->with('matchs', $matchs); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(matchs $match )
    {
        $referee = referee::where('name' , auth()->user()->name)->first();
        if($match->referee->id == $referee->id){
            return view('resultconfirm')->with('match',$match);

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(referee $referee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, referee $referee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(referee $referee)
    {
        //
    }
}
