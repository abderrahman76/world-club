<?php

namespace App\Http\Controllers;

use App\Models\result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function update(Request $request, result $result)
    {
    $match = $result->match;
    $team1 = $match->teams()->first();
    $team2 = $match->teams()->skip(1)->first();

    $result->message = $request->message;
    $result->isValid = $request->valid;
    // dd(  $result->winner);

    $result->save();
if($request->valid == 'valid' && $match->type == "Group stage"){
    if ($result->winner_id == 0) {
        // Both teams get 1 point each
        $team1->points += 1;
        $team2->points += 1;
        $team1->save();
        $team2->save();
    } else {
        // Winner team gets 3 points
        $result->winner->points += 3;
        $result->winner->save();
    }
}


    return redirect()->route('refereeMatchs');
    } 
}
