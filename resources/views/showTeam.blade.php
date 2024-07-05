<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="{{ asset("css/3.png") }}">
    <title>{{ $team->name }}'s squad</title>
    <link rel="stylesheet" href="{{ asset('css/showTeam.css') }}" />
  </head>
  <body>
    @extends('layouts.header')

    <div class="team-info">
      <div class="background" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.1)), url('{{ $team->image }}'); background-repeat:no-repeat; background-size:cover"></div>
      <div class="logos">
        <img src="{{ $team->flag }}" alt="{{ $team->name }} flag">
      </div>
      <div class="info">
        <h2>{{ $team->name }}</h2>
        <p>{{ $team->nickname }}</p>
        <p>Rank: {{ $team->rank }}</p>
        <p>Confederation: {{ $team->confederation->acronym }}</p>
      </div>
    </div>

    {{-- <h2  class="title">coach</h2> --}}
    <p class="p"><span class="fancy">coach</span></p>
    <div class="coach-card">
      <!-- place the coach card here -->
      <article class="card">
        <img
          class="card__background"
          src="{{ $coach->image }}"
          alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
          width="1920"
          height="2193"
        />
        <div class="card__content | flow">
          <div class="card__content--container | flow">
            <h2 class="card__title">{{ $coach->name }}</h2>
            <p class="card__description">
              @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($coach->birthdate));
              $age = $diff->y;
              @endphp
              Age: {{ $age }} <br />
              experience: {{ $coach->experience }} years <br />
              nationality: {{ $coach->nationality }}
            </p>
          </div>
        </div>
      </article>
    </div>
    <div class="players-card">
      {{-- <h2 class="title">Players</h2> --}}
      <p class="p"><span class="fancy">Players</span></p>
      <h3 class="subtitle">Goalkeepers</h3>
              {{-- goalkeepers --}}
      <div class="card-grid">

      <!-- place the player cards here -->
      @foreach ($team->players as $player)
      @if ($player->position == "Goalkeeper")
     

      <article class="card">
        <img
          class="card__background"
          src="{{ $player->image }}"
          alt=""
          width="1920"
          height="2193"
        />
        <div class="card__content | flow">
          <div class="card__content--container | flow">
            <h2 class="card__title">{{ $player->name }}</h2>
            <p class="card__description">
              @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
              Age: {{ $age }} <br />
              {{ $player->position }} <br />
              nationality: {{ $player->nationality }}
            </p>
          </div>
        </div>
      </article>
      @endif
     
      @endforeach
    </div>
    {{-- deffenders --}}

    <h3 class="subtitle">Deffence</h3>

      <div class="card-grid">

      <!-- place the player cards here -->
      @foreach ($team->players as $player)
      @if ($player->position == "Deffender")
     

      <article class="card">
        <img
          class="card__background"
          src="{{ $player->image }}"
          alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
          width="1920"
          height="2193"
        />
        <div class="card__content | flow">
          <div class="card__content--container | flow">
            <h2 class="card__title">{{ $player->name }}</h2>
            <p class="card__description">
              @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
              Age: {{ $age }} <br />
              {{ $player->position }} <br />
              nationality: {{ $player->nationality }}
            </p>
          </div>
        </div>
      </article>
      @endif
     
      @endforeach
    </div>


     {{-- Midfielders --}}

     <h3 class="subtitle">Midfield</h3>

     <div class="card-grid">

     <!-- place the player cards here -->
     @foreach ($team->players as $player)
     @if ($player->position == "Midfielder")
    

     <article class="card">
       <img
         class="card__background"
         src="{{ $player->image }}"
         alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
         width="1920"
         height="2193"
       />
       <div class="card__content | flow">
         <div class="card__content--container | flow">
           <h2 class="card__title">{{ $player->name }}</h2>
           <p class="card__description">
             @php
             $today = new DateTime();
             $diff = $today->diff(new DateTime($player->birthdate));
             $age = $diff->y;
             @endphp
             Age: {{ $age }} <br />
             {{ $player->position }} <br />
             nationality: {{ $player->nationality }}
           </p>
         </div>
       </div>
     </article>
     @endif
    
     @endforeach
   </div>


   {{-- Forwards --}}

   <h3 class="subtitle">Forward</h3>

   <div class="card-grid">

   <!-- place the player cards here -->
   @foreach ($team->players as $player)
   @if ($player->position == "Forward")
  

   <article class="card">
     <img
       class="card__background"
       src="{{ $player->image }}"
       alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
       width="1920"
       height="2193"
     />
     <div class="card__content | flow">
       <div class="card__content--container | flow">
         <h2 class="card__title">{{ $player->name }}</h2>
         <p class="card__description">
           @php
           $today = new DateTime();
           $diff = $today->diff(new DateTime($player->birthdate));
           $age = $diff->y;
           @endphp
           Age: {{ $age }} <br />
           {{ $player->position }} <br />
           nationality: {{ $player->nationality }}
         </p>
       </div>
     </div>
   </article>
   @endif
  
   @endforeach
 </div>


    </div>
  
    @extends('layouts.footer')
  </body>
</html>
