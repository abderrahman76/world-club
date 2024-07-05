<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/matchresult.css') }}">
</head>

<body>
    @php
    $team1 = $match->teams()->first();
    $team2 = $match->teams()->skip(1)->first();
    $result =$match->result;

    $squadlist1 = $team1->squadlist->where('match_id', $match->id)->first();
    $squadlist2 = $team2->squadlist->where('match_id', $match->id)->first();

    @endphp 

    <div class="container">
        <div class="match">
            <div class="match-content">
                <div class="column">
                    <div class="team team--home">
                        <div class="team-logo">

                            <img src="{{ $team1->flag }}" />
                        </div>
                        <h2 class="team-name">{{ $team1->name }}</h2>
                    </div>
                </div>
                <div class="column">
                    <div class="match-details">
                        <div class="match-date">
                            <p class="js-subheading">{{ date('l d M', strtotime($match->date)) }} at {{ date('g:i a', strtotime($match->date)) }}</p>
                        </div>
                        <div class="match-score">
                            <span class="match-score-number match-score-number--leading">{{ $result->team1_goals }}</span>
                            <span class="match-score-divider">:</span>
                            <span class="match-score-number">{{ $result->team2_goals }}</span>
                        </div>
                        <div class="match-time">
                            {{ $result->fullTime }}'
                        </div>
                        <div class="stadium">
                            Stadium: <strong>{{ $match->field->name }}</strong>
                        </div>

                        <div class="match-referee">
                            Referee: <strong>{{ $match->referee->name }}</strong>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="team team--away">
                        <div class="team-logo">

                            <img src="{{ $team2->flag }}" />
                        </div>
                        <h2 class="team-name"> {{ $team2->name }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="goals">

        <table>
            <tr>
                <p>Goals</p>
            </tr>
            <tr>
                <td>
                @foreach ( $result->goals as $goal)
                  @if ($goal->player->team_id == $team1->id)
                  <p>{{ $goal->time }}' {{ $goal->player->name }}</p>
                    
                  @endif
                @endforeach
            </td>
                <td> 
                    @foreach ( $result->goals as $goal)
                    @if ($goal->player->team_id == $team2->id)
                    <p>{{ $goal->time }}' {{ $goal->player->name }}</p>
                      
                    @endif
                    
                @endforeach
                </td>
            </tr>
           
        </table>

    </div>

    <div class="stat">

        <table>
            <th>{{ $result->team1_possession }}%</th>
            <td>
                <p>Possession</p>
            </td>
            <th>{{ $result->team2_possession }}%</th>
        </table>

    </div>
    <div class="goals">

        <table>
            <tr>
                <p>cards</p>
            </tr>
            <tr>
                <td>
                @foreach ( $result->cards as $card)
                  @if ($card->player->team_id == $team1->id)
                  <div class="football-card {{ $card->color }}"></div> <p>{{ $card->time }}' {{ $card->player->name }}</p><br>
                    
                  @endif
                @endforeach
            </td>
                <td> 
                    @foreach ( $result->cards as $card)
                    @if ($card->player->team_id == $team2->id)
                    <div class="football-card {{ $card->color }}"></div><p class="card-info">{{ $card->time }}' {{ $card->player->name }}</p><br>
                      
                    @endif
                    
                @endforeach
                </td>
            </tr>
           
        </table>

    </div>


    <div class="lineups">
        <h3>lineups</h3>

        <div class="hometeam">

            <p>Manager: <strong>{{ $team1->coach->name }} </strong></p>

            <ul>
                @foreach ($squadlist1->players as $player )
                <li>{{ $player->name }}</li>
                @endforeach
                
            
            </ul>
        </div>

        <div class="awayteam">

            <p>Manager: <strong>{{ $team2->coach->name }} </strong></p>

            <ul>
                @foreach ($squadlist2->players as $player )
                <li>{{ $player->name }}</li>
                @endforeach
            </ul>

        </div>
    </div>


</body>

</html>