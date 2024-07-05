<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>squadlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Inter:400,500,600,700&amp;display=swap'>
    <link rel="stylesheet" href="{{ asset('css/squadlist.css') }}">

</head>
@php
    $players = $team->players;
@endphp

<body>
    @extends('layouts.header')
   

    <!-- partial:index.partial.html -->
    <form action="{{ route('squadlistCreate') }}" method="POST">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @csrf
        <h3 class="subtitle">formation</h3>
        <select name="formation" id="formation" class="select-style ">
            <option value="4-4-2">4-4-2</option>
            <option value="4-3-3">4-3-3</option>
            <option value="3-5-2">3-5-2</option>
            <option value="5-3-2">5-3-2</option>
            <option value="4-2-3-1">4-2-3-1</option>
            <option value="3-4-3">3-4-3</option>
            <option value="4-5-1">4-5-1</option>
            <option value="4-1-4-1">4-1-4-1</option>
            <option value="4-3-2-1">4-3-2-1</option>
            <option value="4-3-2-1">4-3-2-1</option>
            <option value="4-2-2-2">4-2-2-2</option>



        </select>
        <h3 class="subtitle">Goalkeepers</h3><br>
        <div class="grid">


            @foreach ($players as $player)
                @if ($player->position == 'Goalkeeper')
                    <label class="card">
                        <input class="card__input" type="checkbox" value="{{ $player->id }}" name="Goalkeeper" />
                        <div class="card__body">
                            <div class="card__body-cover"><img class="card__body-cover-image"
                                    src="{{ $player->image }}" /><span class="card__body-cover-checkbox">
                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg></span></div>
                            <header class="card__body-header">
                                <h2 class="card__body-header-title">{{ $player->name }}</h2>
                                <p class="card__body-header-subtitle">{{ $player->position }}</p>
                            </header>
                        </div>
                    </label>
                @endif
            @endforeach
        </div>

        <h3 class="subtitle">Deffence</h3>
        <div class="grid">
            @php
                $i = 1;
            @endphp
            @foreach ($players as $player)
                @if ($player->position == 'Deffender')
                    <label class="card">
                        <input class="card__input" type="checkbox" value="{{ $player->id }}"
                            name="Deffender{{ $i }}" />
                        <div class="card__body">
                            <div class="card__body-cover"><img class="card__body-cover-image"
                                    src="{{ $player->image }}" /><span class="card__body-cover-checkbox">
                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg></span></div>
                            <header class="card__body-header">
                                <h2 class="card__body-header-title">{{ $player->name }}</h2>
                                <p class="card__body-header-subtitle">{{ $player->position }}</p>
                            </header>
                        </div>
                    </label>
                    @php
                        $i++;
                    @endphp
                @endif
            @endforeach
        </div>
        <h3 class="subtitle">Midfield</h3> <br>
        <div class="grid">
            @php
                $i = 1;
            @endphp
            @foreach ($players as $player)
                @if ($player->position == 'Midfielder')
                    <label class="card">
                        <input class="card__input" type="checkbox" value="{{ $player->id }}"
                            name="Midfielder{{ $i }}" />
                        <div class="card__body">
                            <div class="card__body-cover"><img class="card__body-cover-image"
                                    src="{{ $player->image }}" /><span class="card__body-cover-checkbox">
                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg></span></div>
                            <header class="card__body-header">
                                <h2 class="card__body-header-title">{{ $player->name }}</h2>
                                <p class="card__body-header-subtitle">{{ $player->position }}</p>
                            </header>
                        </div>
                    </label>
                    @php
                        $i++;
                    @endphp
                @endif
            @endforeach
        </div>

        <h3 class="subtitle">Forward</h3> <br>
        <div class="grid">
            @php
                $i = 1;
            @endphp
            @foreach ($players as $player)
                @if ($player->position == 'Forward')
                    <label class="card">
                        <input class="card__input" type="checkbox" value="{{ $player->id }}"
                            name="Forward{{ $i }}" />
                        <div class="card__body">
                            <div class="card__body-cover"><img class="card__body-cover-image"
                                    src="{{ $player->image }}" /><span class="card__body-cover-checkbox">
                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg></span></div>
                            <header class="card__body-header">
                                <h2 class="card__body-header-title">{{ $player->name }}</h2>
                                <p class="card__body-header-subtitle">{{ $player->position }}</p>
                            </header>
                        </div>
                    </label>
                    @php
                        $i++;
                    @endphp
                @endif
            @endforeach
        </div>
        <input type="number" name="teamId" value="{{ $team->id }}" hidden>
        <input type="number" name="matchId" value="{{ $match->id }}" hidden>

        <input type="submit" value="submit" class="submit-button">
    </form>

    <!-- partial -->

</body>

</html>
