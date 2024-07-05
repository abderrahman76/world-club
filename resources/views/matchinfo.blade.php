<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>{{ $match->name }}</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset("css/match.css") }}">

</head>
<body>
    @php
$team1 = $match->teams()->first();
$team2 = $match->teams()->skip(1)->first();
@endphp 
<!-- partial:index.partial.html -->
<main>
    <div class="static">
        <h1 class="js-heading">{{ $match->type }}</h1>
        <p class="js-subheading">{{ date('l d M', strtotime($match->date)) }}</p>
        <p class="js-subheading"> {{ date('g:i a', strtotime($match->date)) }}</p>
        <div class="team-logo1">
            <div class="team1">
                <img src="{{ $team1->flag }}" alt="{{ $team1->name }}" class="img1">
            <p class="js-subheading" style="text-transform: uppercase;">{{ $team1->name }} </p>
            </div>
            <div class="vs">VS</div>
            <div class="team2">
                <img src="{{ $team2->flag }}" alt="{{ $team2->name }}" class="img1">
            <p class="js-subheading" style="text-transform: uppercase;">{{ $team2->name }}</p>
            </div>            
        </div>
            <p class="js-subheading">Stadium:{{ $match->field->name }}</p>
            <p class="js-subheading">Referee: {{ $match->referee->name }}</p>
    
      


        <div class="js-switcher switcher">
            <a href="#" class="js-switch disabled switch-btn">{{ $team1->name }}</a><a href="#" class="js-switch switch-btn">{{ $team2->name }}</a>
        </div>
    </div>
    <div class="js-stage stage texture">
        <div class="js-world world">
            <div class="team js-team">
                <!-- Team cards / icons goes here -->
            </div>
            <div class="terrain js-terrain">
                <div class="field field--alt"></div>
                <div class="field ground">
                    <div class="field__texture field__texture--gradient"></div>
                    <div class="field__texture field__texture--gradient-b"></div>
                    <div class="field__texture field__texture--grass"></div>
                    <div class="field__line field__line--goal"></div>
                    <div class="field__line field__line--goal field__line--goal--far"></div>
                    <div class="field__line field__line--outline"></div>
                    <div class="field__line field__line--penalty"></div>
                    <div class="field__line field__line--penalty-arc"></div>
                    <div class="field__line field__line--penalty-arc field__line--penalty-arc--far"></div>
                    <div class="field__line field__line--mid"></div>
                    <div class="field__line field__line--circle"></div>
                    <div class="field__line field__line--penalty field__line--penalty--far"></div>
                </div>
                <div class="field__side field__side--front"></div>
                <div class="field__side field__side--left"></div>
                <div class="field__side field__side--right"></div>
                <div class="field__side field__side--back"></div>
            </div>
        </div>
        <!-- <div class="loading js-loading">PLEASE WAIT...</div> -->
    </div>
    </main>
<!-- partial -->

  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
@extends('matchscript')
</body>
</html>
