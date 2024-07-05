<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="{{ asset("css/3.png") }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/teams.css") }}">


    <title>teams</title>
</head>
<body>
    @php
        // dd($teams)
    @endphp
    @extends('layouts\header')

    <div class="teams">
    @foreach ( $teams as $team )
        
   @if ($team->id != 0)
       
   
        <div class="team">
            <a href="{{ route('team',[$team]) }}">
                <div class="flag">
                    <img src="{{ $team->flag }}">
                </div>
                <div class="name">{{ $team->name }}</div>
            </a>
        </div>
        @endif

        @endforeach
    </div>

</body>

</html>