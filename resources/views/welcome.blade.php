@php
use App\Models\news;
use App\Models\matchs;
use App\Models\field;
use App\Models\team;


$teams = team::where('id', '!=', 0)->get();
    $fields = field::all();
    $matchs = matchs::all();
     $news =news::all();
     
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
          
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>World Cup </title>
        <link rel="icon" type="image/x-icon" href="{{ asset("css/3.png") }}">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
         <!-- Fonts -->
         <link rel="preconnect" href="https://fonts.bunny.net">
         <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    
    <body>    
      @extends('layouts\header')
        {{-- <!-- header section starts  -->
        <header class="header">
    
            <a href="#" class="logo"> World Cup 2030 </a>
    
            <nav class="navbar">
                <a href="#home" class="active">home</a>
                <a href="#matches">matches</a>
                <a href="#Groups">Groups</a>
                <a href="#stadiums">stadiums</a>
                @if (Auth()->check())
                  
                @if (Auth()->user()->role == 0)
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('myticket') }}" :active="request()->routeIs('myticket')">
                        {{ __('my tickets') }}
                    </x-nav-link>
                </div>
                @endif
                @if (Auth()->user()->role == 1)
               
                    <x-nav-link href="/admin" :active="request()->routeIs('myticket')">
                        {{ __('admin panel') }}
                    </x-nav-link>
            
                @endif
                @endif
            </nav>
            <div class="navbar">
           @auth
          <div class="dropdown">
            <button class="dropbtn">{{ Auth()->user()->name }}</button>
            <div class="dropdown-content">
              <a href="{{ route('profile.show') }}">Profile</a>
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
               <input type="submit"  value="{{ __('Log Out') }}" @click.prevent="$root.submit();">
            </form>
            </div>
          </div>
               @else
               
                <a href="{{ route('login') }}" >Log in</a>
                <a href="{{ route('register') }}">Register</a>
           @endauth
        </div>
        </header>
        <!-- header section ends --> --}}
    
    
    
        <!-- home section starts  -->
        <section class="home" id="home">

            <div class="swiper home-slider">
                <div class="swiper-wrapper">
    @foreach ( $news as $new ) 
    <div class="swiper-slide box" style="background: url({{ $new->image }});">
        <a href="{{ $new->description }} " target="_blank">
            <div class="content">
                <h3>{{ $new->title }}</h3>
                {{-- <p>32 teams</p> --}}
            </div>
        </a>
    </div>
    @endforeach
    
                    
    
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
    
            </div>
    
        </section>
        <!-- home section ends -->
    
    
    
    
        <!-- matches section starts  -->
        <section class="matches" id="matches">
            <div class="container">
                <h1 class="section-heading" style="text-align: center;"> <a href="/match" style="color: black">matches</a></h1>
                <div class="matchs" id="match-date"></div>
               
            </div>
            @php
              $match3 = $matchs->take(3);
            @endphp
    @foreach ( $match3 as $match)
    @php
      $team1 = $match->teams()->first();
      $team2 = $match->teams()->skip(1)->first();
    @endphp     
                            <div class="match">
                            <div class="match-info">
                                @if ($match->type == "Group stage")
                                <h4 class="group">group {{ $team1->group }}</h4>
                                @else
                                <h4 class="group"> {{ $match->type }}</h4>
                                @endif                     
                            </div>
                            <div class="flags">
                                <div class="home-flag">
                                    <img src="{{ $team1->flag }}" alt="${match.home_team}" class="flag" />
                                <h3 class="home-team">{{ $team1->name }}</h3>
                                </div>
                                <span class="vs">
                                VS
                                </span>
                                <div class="away-flag">
                                <img src="{{ $team2->flag }}" alt="${match.away_team}" class="flag" />
                                <h3 class="home-team">{{ $team2->name }}</h3>
                                </div>
                            </div>
                            <div class="time-area">
                                <div class="time">
                                    <h4 class="month">{{ date('M', strtotime($match->date)) }}</h4>
                                    <h4 class="day">{{ date('l', strtotime($match->date)) }}</h4>
                                    <h4 class="date">{{ date('d', strtotime($match->date)) }}</h4>
                                </div>
                                <h4 class="match-time">{{ date('g:i a', strtotime($match->date)) }}</h4>
                            </div>
                        </div>
                        @endforeach
                   
        </section>
        <!-- matches section ends -->
        @php
        $ThirdPlaceMatch = $matchs->where('type', 'Third-place')->first();
        $FinalMatch = $matchs->where('type', 'Final')->first();
        // dd($ThirdPlaceMatch);
        $matchs16 =  $matchs->where('type', 'Round of 16');
        $match161 = null;
        $match162 = null;
        $match163 = null;
        $match164 = null;
        $match165 = null;
        $match166 = null;
        $match167 = null;
        $match168 = null;

        foreach($matchs16 as $match){  
             if( $match->teams()->first()->group == "A" ||  $match->teams()->first()->group == "B") {$match161 = $match;}
             if( $match->teams()->first()->group == "A" ||  $match->teams()->first()->group == "B" &&  $match !== $match161) {$match162 = $match;}
            
             if( $match->teams()->first()->group == "C" ||  $match->teams()->first()->group == "D") {$match163 = $match;}
             if( $match->teams()->first()->group == "C" ||  $match->teams()->first()->group == "D" &&  $match !== $match163) {$match164 = $match;}

             if( $match->teams()->first()->group == "E" ||  $match->teams()->first()->group == "F") {$match165 = $match;}
             if( $match->teams()->first()->group == "E" ||  $match->teams()->first()->group == "F" &&  $match !== $match165) {$match166 = $match;}

             if( $match->teams()->first()->group == "G" ||  $match->teams()->first()->group == "H") {$match167 = $match;}
             if( $match->teams()->first()->group == "G" ||  $match->teams()->first()->group == "H" &&  $match !== $match167) {$match168 = $match;}
               }
       
               $Quartermatchs =  $matchs->where('type', 'Quarterfinal');
               $match41 = null;
               $match42 = null;
               $match43 = null;
               $match44 = null;

               foreach ($Quartermatchs as $match) {
                if( $match->teams()->first()->group == "A" ||  $match->teams()->first()->group == "B") {$match41 = $match;}
            
                if( $match->teams()->first()->group == "C" ||  $match->teams()->first()->group == "D") {$match42 = $match;}
                
                if( $match->teams()->first()->group == "E" ||  $match->teams()->first()->group == "F") {$match43 = $match;}

                if( $match->teams()->first()->group == "G" ||  $match->teams()->first()->group == "H") {$match44 = $match;}


               }

               $Semimatchs =  $matchs->where('type', 'Semifinal');
               $match21 = null;
               $match22 = null;
               foreach (  $Semimatchs  as $match) {
                if( $match->teams()->first()->group == "A" ||  $match->teams()->first()->group == "B" ||  $match->teams()->first()->group == "C" ||  $match->teams()->first()->group == "D") {$match21 = $match;}

                if( $match->teams()->first()->group == "E" ||  $match->teams()->first()->group == "F" || $match->teams()->first()->group == "G" ||  $match->teams()->first()->group == "H") {$match22 = $match;}
              }

       @endphp
    {{-- knockout --}}
    <h2 class="standings-subheading" style="text-align: center;">knock out</h2>
    <div class="knockout-section">
      
  <div class="item round-16-1">  
          @if ($match161)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match161->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match161->teams()->first()->name  }}</h3>
      </div>
      @if ($match161->result && $match161->result->isValid == 'valid')
      <span class="vs1">
       {{  $match161->result->team1_goals}} - {{  $match161->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match161->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match161->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>
  
  <div class="item round-16-2">
    @if ($match162)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match162->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match162->teams()->first()->name  }}</h3>
      </div>
      @if ($match162->result && $match162->result->isValid == 'valid')
      <span class="vs1">
       {{  $match162->result->team1_goals}} - {{  $match162->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match162->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match162->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item round-16-3">
    @if ($match163)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match163->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match163->teams()->first()->name  }}</h3>
      </div>
      @if ($match163->result && $match163->result->isValid == 'valid')
      <span class="vs1">
       {{  $match163->result->team1_goals}} - {{  $match163->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match163->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match163->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item round-16-4">
    @if ($match164)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match164->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match164->teams()->first()->name  }}</h3>
      </div>
      @if ($match164->result && $match164->result->isValid == 'valid' )
      <span class="vs1">
       {{  $match164->result->team1_goals}} - {{  $match164->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match164->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match164->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item round-16-5">
    @if ($match165)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match165->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match165->teams()->first()->name  }}</h3>
      </div>
      @if ($match165->result && $match165->result->isValid == 'valid')
      <span class="vs1">
       {{  $match165->result->team1_goals}} - {{  $match165->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match165->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match165->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item round-16-6">
   @if ($match166)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match166->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match166->teams()->first()->name  }}</h3>
      </div>
      @if ($match166->result && $match166->result->isValid == 'valid')
      <span class="vs1">
       {{  $match166->result->team1_goals}} - {{  $match166->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match166->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match166->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item round-16-7">
  @if ($match167)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match167->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match167->teams()->first()->name  }}</h3>
      </div>
      @if ($match167->result && $match167->result->isValid == 'valid')
      <span class="vs1">
       {{  $match167->result->team1_goals}} - {{  $match167->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match167->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match167->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item round-16-8">
    @if ($match168)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match168->teams()->first()->flag }} }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match168->teams()->first()->name  }}</h3>
      </div>
      @if ($match168->result && $match168->result->isValid == 'valid')
      <span class="vs1">
       {{  $match168->result->team1_goals}} - {{  $match168->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match168->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match168->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>

  <div class="item quarter-1">
    @if ($match41)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match41->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match41->teams()->first()->name  }}</h3>
      </div>
      @if ($match41->result && $match41->result->isValid == 'valid')
      <span class="vs1">
       {{  $match41->result->team1_goals}} - {{  $match41->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match41->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match41->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>
  <div class="item quarter-2">
    @if ($match42)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match42->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match42->teams()->first()->name  }}</h3>
      </div>
      @if ($match42->result && $match42->result->isValid == 'valid')
      <span class="vs1">
       {{  $match42->result->team1_goals}} - {{  $match42->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match42->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match42->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>
  <div class="item quarter-3">
    @if ($match43)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match43->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match43->teams()->first()->name  }}</h3>
      </div>
      @if ($match43->result && $match43->result->isValid == 'valid')
      <span class="vs1">
       {{  $match43->result->team1_goals}} - {{  $match43->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match43->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match43->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>
  <div class="item quarter-4">
    @if ($match44)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match44->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match44->teams()->first()->name  }}</h3>
      </div>
      @if ($match44->result && $match44->result->isValid == 'valid')
      <span class="vs1">
       {{  $match44->result->team1_goals}} - {{  $match44->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{$match44->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match44->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>


  <div class="item semi-1">
    @if ($match21)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match21->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match21->teams()->first()->name  }}</h3>
      </div>
     
        @if ($match21->result && $match21->result->isValid == 'valid')
        <span class="vs1">
         {{  $match21->result->team1_goals}} - {{  $match21->result->team2_goals}}
          </span> 
        @else
        <span class="vs1">
          VS
          </span> 
        @endif
     
      <div class="away-flag1">
      <img src="{{$match21->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match21->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>

  <div class="item semi-2">
    @if ($match22)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{$match22->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $match22->teams()->first()->name  }}</h3>
      </div>
     @if ($match22->result && $match22->result->isValid == 'valid')
        <span class="vs1">
         {{  $match22->result->team1_goals}} - {{  $match22->result->team2_goals}}
          </span> 
        @else
        <span class="vs1">
          VS
          </span> 
        @endif
      <div class="away-flag1">
      <img src="{{$match22->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $match22->teams()->skip(1)->first()->name }}</h3>
      </div>
  </div>
    @endif
  </div>

  <div class="item third">
    @if ($ThirdPlaceMatch)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{ $ThirdPlaceMatch->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $ThirdPlaceMatch->teams()->first()->name }}</h3>
      </div>
      @if ($ThirdPlaceMatch->result && $ThirdPlaceMatch->result->isValid == 'valid')
      <span class="vs1">
       {{  $ThirdPlaceMatch->result->team1_goals}} - {{  $ThirdPlaceMatch->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{ $ThirdPlaceMatch->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $ThirdPlaceMatch->teams()->skip(1)->first()->name }}</h3>
      </div>
      </div>
    @endif
    
  </div>

  <div class="item final">
     @if ($FinalMatch)
    <div class="flags1">
      <div class="home-flag1">
          <img src="{{ $FinalMatch->teams()->first()->flag }}" alt="${match.home_team}" class="flag1" />
      <h3 class="home-team1">{{ $FinalMatch->teams()->first()->name }}</h3>
      </div>
      @if ($FinalMatch->result && $FinalMatch->result->isValid == 'valid')
      <span class="vs1">
       {{  $FinalMatch->result->team1_goals}} - {{  $FinalMatch->result->team2_goals}}
        </span> 
      @else
      <span class="vs1">
        VS
        </span> 
      @endif
      <div class="away-flag1">
      <img src="{{ $FinalMatch->teams()->skip(1)->first()->flag }}" alt="${match.away_team}" class="flag1" />
      <h3 class="home-team1">{{ $FinalMatch->teams()->skip(1)->first()->name }}</h3>
      </div>
      </div>
    @endif
  </div>





  

  
    </div>
         {{-- knockout --}}
        <!-- Groups section starts  -->
        <section class="Groups" id="Groups">
          <section id="points">
            <div class="container">
              <h2 class="standings-subheading" style="text-align: center;">Group Stage Points Table</h2>
              <h3 class="loader">points table is loading...</h3>
              <div class="points-container"></div>
            </div>
          </section>
          <script type="module">
            async function fetchPoints() {
              let pointsWrapper = document.querySelector('.points-container');
              let loader = document.querySelector('.loader');
              let teams = <?php echo json_encode($teams); ?>; // get the teams array from PHP
              setTimeout(() => {
                loader.remove();
                // group teams by group using reduce
                let groups = teams.reduce((acc, team) => {
                  if (!acc[team.group]) {
                    acc[team.group] = { group: team.group, teams: [] };
                  }
                  acc[team.group].teams.push({
                    flag: team.flag,
                    Team: team.name,
                    Point: team.points,
                 
                  });
                  return acc;
                }, {});
                // sort groups alphabetically
                let sortedGroups = Object.values(groups).sort((a, b) => a.group.localeCompare(b.group));
                // sort teams in each group by points
                sortedGroups.forEach((group) => {
                  group.teams.sort((a, b) => b.Point - a.Point);
                });
                // render points table for each group
                sortedGroups.forEach((group) => {
                  pointsWrapper.innerHTML += `
                    <div class="points-table">
                      <h1 class="group-heading">${group.group}</h1>
                      <table>
                        <thead>
                          <tr>
                            <th>Rank</th>
                            <th>Team</th>
                           
                            <th>Pts</th>
                          </tr>
                        </thead>
                        <tbody>
                          ${group.teams
                            .map(
                              (team, index) => `
                                <tr>
                                  <td>${index + 1}</td>
                                  <td>
                                    <div class="d-a">
                                      <img
                                        src="${team.flag}"
                                        alt="${team.Team}"
                                        class="team-flag"
                                      />
                                      <span>${team.Team}</span>
                                    </div>
                                  </td>
                                 
                                  <td>${team.Point}</td>
                                </tr>
                              `
                            )
                            .join('')}
                        </tbody>
                      </table>
                    </div>
                  `;
                });
              }, 1000);
            }
        
            fetchPoints();
          </script>
        </section>
        
      
        <!-- Groups section ends -->
    
    
    
        <!-- stadiums section starts  -->
        <section class="stadiums" id="stadiums">
            <h2>stadiums</h2>
            <div class="container swiper">
                <div class="slide-container">
                    <div class="card-wrapper swiper-wrapper">
                     
                    
                      
    
                        @foreach ( $fields as $field )
                        <div class="card swiper-slide">
                            <div class="image-box">
                              <a href="{{ route('stadium', ['field' => $field]) }}">
                                <img src="{{ $field->image }}" alt="" />
                              </a>
                            </div>
                            <div class="stadium-details">
                                <div class="name-job">
                                    <h3 class="name">{{ $field->name }}</h3>
                                    <h4 class="capacity">{{ $field->location }}</h4>
                                    <h4 class="capacity">capacity:{{ number_format($field->capacity, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                      
                        @endforeach
    
                       
                        
                    </div>
                </div>
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
            </div>
        </section>
        <!-- stadiums section ends -->
    
    
    
        <!-- footer section starts -->
        @extends('layouts.footer')
        <!-- footer section ends -->
    
    
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    
        <!-- custom js file links  -->
        <script src="{{ asset("js/script.js") }}"></script>
        <script src="{{ asset("js1/script.js")}}"></script>

    
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                delay: 400,
                duration: 800
            });
        </script>
    
    </body>
</html>
