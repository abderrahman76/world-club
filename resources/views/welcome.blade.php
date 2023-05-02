
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
    
        <!-- header section starts  -->
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
        <!-- header section ends -->
    
    
    
        <!-- home section starts  -->
        <section class="home" id="home">
    
            <div class="swiper home-slider">
                <div class="swiper-wrapper">
    
                    <div class="swiper-slide box" style="background: url({{ asset("css/1.png") }});">
                        <a href="https://www.youtube.com/">
                            <div class="content">
                                <h3>one cup</h3>
                                <p>32 teams</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
    
            </div>
    
        </section>
        <!-- home section ends -->
    
    
    
    
        <!-- matches section starts  -->
        <section class="matches" id="matches">
            <div class="container">
                <h1 class="section-heading" style="text-align: center;">matches</h1>
                <div class="matchs" id="match-date"></div>
            </div>
    
            <script>
                async function fetchMatch() {
                    let match_by_date = document.querySelector('#match-date');
                    let match_by_group = document.querySelector('#match-group');
                    let data = await fetch('fifa-world-cup.json');
                    let response = await data.json();
                    let all_match = [];
    
                    function randerDom(match, selector) {
                        selector.innerHTML += `
                            <div class="match">
                            <div class="match-info">
                                <h4 class="group">${match.group}</h4>
                                <h4>Match Number<span class="badge">${match.matchNumber}</span> </h4>
                            </div>
                            <div class="flags">
                                <div class="home-flag">
                                    <img src="${match.home_flag}" alt="${match.home_team}" class="flag" />
                                <h3 class="home-team">${match.home_team}</h3>
                                </div>
                                <span class="vs">
                                VS
                                </span>
                                <div class="away-flag">
                                <img src="${match.away_flag}" alt="${match.away_team}" class="flag" />
                                <h3 class="home-team">${match.away_team}</h3>
                                </div>
                            </div>
                            <div class="time-area">
                                <div class="time">
                                    <h4 class="month">${match.month}</h4>
                                    <h4 class="day">${match.day}</h4>
                                    <h4 class="date">${match.date}</h4>
                                </div>
                                <h4 class="match-time">${match.localTime}</h4>
                            </div>
                        </div>
                    `;
                    }
    
                    for (let i = 0; i < response.length; i++) {                                      //nombre du match afficher  "response.length =4" 
                        let time = new Date(response[i]['DateUtc']);
                        let localTime = time.toLocaleTimeString().replace(':00:00', ':00');
                        let day_month = time.toString().split(' ');
                        let date = day_month[2];
                        let home_team = response[i]['HomeTeam'];
                        let home_flag = response[i]['flag'][0];
                        let away_team = response[i]['AwayTeam'];
                        let away_flag = response[i]['flag'][1];
                        let stadium = response[i]['Location'];
                        let group = response[i]['Group'];
                        let matchNumber = response[i]['MatchNumber'];
                        let roundNumber = response[i]['RoundNumber'];
                        let Match = {
                            localTime,
                            day: day_month[0],
                            month: day_month[1],
                            home_team,
                            home_flag,
                            away_team,
                            away_flag,
                            stadium,
                            group,
                            matchNumber,
                            roundNumber,
                            date,
                        };
                        all_match.push(Match);
                        randerDom(Match, match_by_date);
                    }
    
                    function fBg(group) {
                        return all_match.filter((g) => {
                            return g.group.includes(group);
                        });
                    }
                    let filter_by_group = [
                        ...fBg('Group A'),
                        ...fBg('Group B'),
                        ...fBg('Group C'),
                        ...fBg('Group D'),
                        ...fBg('Group E'),
                        ...fBg('Group F'),
                        ...fBg('Group G'),
                        ...fBg('Group H'),
                    ];
                    for (let j = 0; j < filter_by_group.length; j++) {
                        randerDom(filter_by_group[j], match_by_group);
                    }
                }
                fetchMatch();
            </script>
    
        </section>
        <!-- matches section ends -->
    
    
    
        <!-- Groups section starts  -->
        <section class="Groups" id="Groups">
            <section id="points">
                <div class="container">
                    <h2 class="standings-subheading" style="text-align: center;">Group Stage Points Table</h2>
                    <h3 class="loader">points table is loading...</h3>
                    <div class="points-container"></div>
                </div>
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="script.js"></script>
    
        </section>
        <!-- Groups section ends -->
    
    
    
        <!-- stadiums section starts  -->
        <section class="stadiums" id="stadiums">
            <h2>stadiums</h2>
            <div class="container swiper">
                <div class="slide-container">
                    <div class="card-wrapper swiper-wrapper">
                        <div class="card swiper-slide">
                            <div class="image-box">
                                <img src="{{ asset("css/1.png") }}" alt="" />
                            </div>
                            <div class="stadium-details">
                                <div class="name-job">
                                    <h3 class="name">Adrar stadium</h3>
                                    <h4 class="capacity">capacity: 45 480</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
            </div>
        </section>
        <!-- stadiums section ends -->
    
    
    
        <!-- footer section starts -->
        <footer>
    
            <p class="Sponsor">FIFA PARTNERS:</p>
            <div class="column">
                <img src="img/adidas.webp" alt="Sponsor logo">
                <img src="img/cocacola.webp" alt="Sponsor logo">
                <img src="img/visa.webp" alt="Sponsor logo">
                <img src="img/budweiser.webp" alt="Sponsor logo">
                <img src="img/hisence.webp" alt="Sponsor logo">
                <img src="img/mcdonalds.webp" alt="Sponsor logo">
                <img src="img/qatarairways.webp" alt="Sponsor logo">
                <img src="img/qnb.webp" alt="Sponsor logo">
            </div>
            <div>
                <p class="copyright">Copyright &copy; 2023 All Rights Reserved.</p>
            </div>
        </footer>
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
