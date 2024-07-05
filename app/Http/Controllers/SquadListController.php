<?php

namespace App\Http\Controllers;

use App\Models\player_squadlist;
use App\Models\squadList;
use Illuminate\Http\Request;

class SquadListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $playerIds = [];

        foreach (request()->all() as $key => $value) {
            if (is_numeric($value)) {
                $playerIds[] = $value;
                if (count($playerIds) >= 11) {
                    break; // Stop the loop after collecting the first 11 player IDs
                }
            }
        }
        if (count($playerIds) !== 11) {
            // Number of selected players is not equal to 11
            return redirect()->back()->withErrors('Please select exactly 11 players.');
        }
        $squadList = squadList::create([
            'formation' => $request->formation,
            'match_id' => $request->matchId,
            'team_id' => $request->teamId,
        ]);

        $squadList->players()->attach($playerIds);

        
        return redirect()->route('coachMatchs');

    }


    

    /**
     * Display the specified resource.
     */
    public function show(squadList $squadList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(squadList $squadList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, squadList $squadList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(squadList $squadList)
    {
        //
    }
}
