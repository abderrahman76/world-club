@php
$squadlist1 = $team1->squadlist->where('match_id', $match->id)->first();
$squadlist2 = $team2->squadlist->where('match_id', $match->id)->first();
   $formation1 = $squadlist1->formation;
   $formation2 = $squadlist2->formation;


  //  dd($squadlist1->players);
   $numbers = explode('-', $formation1);
   $goalkeepers1 = $squadlist1->players->where('position', 'Goalkeeper')->first();
  //  dd($goalkeepers1);
   $Deffenders1 = $squadlist1->players->where('position', 'Deffender');
   $Midfields1 = $squadlist1->players->where('position', 'Midfielder');
   $Forwards1 = $squadlist1->players->where('position', 'Forward');
   $d_dimension1 = [];
   $m_dimension1 = [];
   $f_dimension1 = [];

   $numbers = explode('-', $formation2);
   $goalkeepers2 = $squadlist2->players->where('position', 'Goalkeeper')->first();
   $Deffenders2 = $squadlist2->players->where('position', 'Deffender');
   $Midfields2 = $squadlist2->players->where('position', 'Midfielder');
   $Forwards2 = $squadlist2->players->where('position', 'Forward');
   $d_dimension2 = [];
   $m_dimension2 = [];
   $f_dimension2 = [];
 
   $positions = [
    '4-4-2' => [
        'defenders' => [
          ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
            ['x' => 100, 'y' => 50],
            ['x' => -100, 'y' => 50],
            ['x' => 200, 'y' => -100],
            ['x' => -200, 'y' => -100],

        ],
        'forwards' => [
          ['x' => -150, 'y' => -190],
          ['x' => 200, 'y' => -190],
        ],
    ],
    '4-3-3' => [
        'defenders' => [
            ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
            ['x' => 0, 'y' => 50],
            ['x' => -150, 'y' => 50],
            ['x' => 200, 'y' => 50],
        ],
        'forwards' => [
            ['x' => 110, 'y' => -190],
            ['x' => -110, 'y' => -190],
            ['x' => 0, 'y' =>  -190],
        ],
    ],
    '3-5-2' => [
        'defenders' => [
            ['x' => 0, 'y' => 0],
            ['x' => 1, 'y' => 0],
            ['x' => 2, 'y' => 0],
        ],
        'midfielders' => [
            ['x' => 0, 'y' => 50],
            ['x' => -150, 'y' => 50],
            ['x' => 200, 'y' => 50],
            ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
        ],
        'forwards' => [
          ['x' => 110, 'y' => -190],
            ['x' => -110, 'y' => -190],
        ],
    ],
    '5-3-2' => [
        'defenders' => [
            ['x' => -200, 'y' => 180],
            ['x' => 0, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
          
        ],
        'midfielders' => [
            ['x' => 0, 'y' => 50],
            ['x' => -150, 'y' => 50],
            ['x' => 150, 'y' => 50],
        ],
        'forwards' => [
          ['x' => 110, 'y' => -190],
            ['x' => -110, 'y' => -190],
        ],
    ],
    '4-2-3-1' => [
        'defenders' => [
          ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
          ['x' => 0, 'y' => 50],
            ['x' => -150, 'y' => 50],
            ['x' => 200, 'y' => 50],
            ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
        ],
        'forwards' => [
          ['x' => 0, 'y' => -190],

        ],
    ],
    '3-4-3' => [
        'defenders' => [
            ['x' => 0, 'y' => 300],
            ['x' => 200, 'y' => 300],
            ['x' => -200, 'y' => 300],
        ],
        'midfielders' => [
            ['x' => 100, 'y' => 50],
            ['x' => -100, 'y' => 50],
            ['x' => 200, 'y' => -100],
            ['x' => -200, 'y' => -100],

        ],
        'forwards' => [
          ['x' => 110, 'y' => -190],
            ['x' => -110, 'y' => -190],
            ['x' => 0, 'y' =>  -190],
        ],
    ],
    '4-5-1' => [
        'defenders' => [
            ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
            ['x' => 0, 'y' => 50],
            ['x' => -150, 'y' => 50],
            ['x' => 150, 'y' => 50],
            ['x' => -200, 'y' => -160],
            ['x' => 200, 'y' => -160],
        ],
        'forwards' => [
            ['x' => 0, 'y' => -190],
        ],
    ],
    '4-1-4-1' => [
        'defenders' => [
           ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
            ['x' => 0, 'y' => 50],
            ['x' => 200, 'y' => -100],
            ['x' => -200, 'y' => -100],
            ['x' => 100, 'y' => -150],
            ['x' => -100, 'y' => -150],
        ],
        'forwards' => [
            ['x' => 0, 'y' => -190],
        ],
    ],
    '4-3-2-1' => [
        'defenders' => [
           ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
          ['x' => 0, 'y' => 50],
            ['x' => -150, 'y' => 50],
            ['x' => 200, 'y' => 50],
        ],
        'forwards' => [
          ['x' => 110, 'y' => -170],
            ['x' => -110, 'y' => -200],
            ['x' => 0, 'y' =>  -170],
        ],
    ],
    '4-2-2-2' => [
        'defenders' => [
          ['x' => -200, 'y' => 180],
            ['x' => 200, 'y' => 180],
            ['x' => 100, 'y' => 300],
            ['x' => -100, 'y' => 300],
        ],
        'midfielders' => [
          ['x' => -150, 'y' => 50],
            ['x' => 150, 'y' => 50],
            ['x' => -200, 'y' => -100],
            ['x' => 200, 'y' => -100],
        ],
        'forwards' => [
          ['x' => 110, 'y' => -190],
          ['x' => -110, 'y' => -190],
        ],
    ],
];
if (isset($positions[$formation1])) {
    $d_dimension1 = $positions[$formation1]['defenders'] ?? [];
    $m_dimension1 = $positions[$formation1]['midfielders'] ?? [];
    $f_dimension1 = $positions[$formation1]['forwards'] ?? [];


}

if (isset($positions[$formation2])) {
    $d_dimension2 = $positions[$formation2]['defenders'] ?? [];
    $m_dimension2 = $positions[$formation2]['midfielders'] ?? [];
    $f_dimension2 = $positions[$formation2]['forwards'] ?? [];


}
  // dd( $Forwards->name)

   
   @endphp


<script>
    (function() {
  var $closeBtn, $heading, $loadBtn, $loading, $players, $playersAway, $playersHome, $stage, $subHeading, $switchBtn, $switcher, $team, $teamListHome, $terrain, $world, ASSET_URL, anim, data, dom, events, init, pos, scenes, state;

  ASSET_URL = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/215059/';

  $stage = null;

  $world = null;

  $terrain = null;

  $team = null;

  $teamListHome = null;

  $players = null;

  $playersHome = null; // Subset of $players

  $playersAway = null; // Subset of $players

  $switchBtn = null;

  $loadBtn = null;

  $closeBtn = null;

  $heading = null;

  $subHeading = null;

  $loading = null;

  $switcher = null;

  data = {
    players: {
      home: [
      {
          name: '<?php echo $goalkeepers1->name; ?>',
          asset: '<?php echo $goalkeepers1->image; ?>',
          origin: '<?php echo $goalkeepers1->nationality; ?>',
          height: '1.84m',
          shirt: '14',
          pos: '<?php echo $goalkeepers1->position; ?>',
          @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($goalkeepers1->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
          goals: <?php echo $goalkeepers1->goals()->count(); ?>,
          games: <?php echo $goalkeepers1->squadlists()->count(); ?>,

          x: 0,
          y: 410  
      },

        @php
        $i = 0;
        @endphp
        @foreach ($Deffenders1 as $player )
        {
          name: '<?php echo $player->name; ?>',
          asset: '<?php echo $player->image; ?>',
          origin: '<?php echo $player->nationality; ?>',
          pos: '<?php echo $player->position; ?>',
          @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
          goals: <?php echo $player->goals()->count(); ?>,
          games: <?php echo $player->squadlists()->count(); ?>,
          x: <?php echo $d_dimension1[$i]['x']; ?>,
          y: <?php echo $d_dimension1[$i]['y']; ?>,
          @php
          $i++;
        @endphp
      
        },
        @endforeach

        @php
        $i = 0;
        @endphp
        @foreach ($Midfields1 as $player )
        {
          name: '<?php echo $player->name; ?>',
          asset: '<?php echo $player->image; ?>',
          origin: '<?php echo $player->nationality; ?>',
          pos: 'suck',
          @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
          goals: <?php echo $player->goals()->count(); ?>,
          games: <?php echo $player->squadlists()->count(); ?>,
          x: <?php echo $m_dimension1[$i]['x']; ?>,
          y: <?php echo $m_dimension1[$i]['y']; ?>,

          @php
          $i++;
        @endphp
        },
        @endforeach
@php
  $i = 0;
@endphp
        @foreach ($Forwards1 as $player)
        {
        name: '<?php echo $player->name; ?>',
        asset: '<?php echo $player->image; ?>',
        origin: '<?php echo $player->nationality; ?>',
        pos: '<?php echo $player->position; ?>',
        @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
        goals: <?php echo $player->goals()->count(); ?>,
        games: <?php echo $player->squadlists()->count(); ?>,
        x: <?php echo $f_dimension1[$i]['x']; ?>,
        y: <?php echo $f_dimension1[$i]['y']; ?>,

        @php
          $i++;
        @endphp
        },
        @endforeach
        @php
        $i = 0;
        
        @endphp
        
      ],
      away: [
      
        {
          name: '<?php echo $goalkeepers2->name; ?>',
          asset: 'rm-pepe.jpg',
          origin: '<?php echo $goalkeepers2->nationality; ?>',
          pos: '<?php echo $goalkeepers2->position; ?>',
          dob: '34',
          goals:  <?php echo $goalkeepers2->goals()->count(); ?>,
          games:<?php echo $goalkeepers2->squadlists()->count(); ?>,
          x: 0,
          y: 410
        },
        @php
        $i = 0;
        @endphp
        @foreach ($Deffenders2 as $player )
        {
          name: '<?php echo $player->name; ?>',
          asset: 'rm-pepe.jpg',
          origin: '<?php echo $player->nationality; ?>',
          pos: '<?php echo $player->position; ?>',
          @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
          goals: <?php echo $player->goals()->count(); ?>,
          games: <?php echo $player->squadlists()->count(); ?>,
          x: <?php echo $d_dimension2[$i]['x']; ?>,
          y: <?php echo $d_dimension2[$i]['y']; ?>,
          @php
          $i++;
        @endphp
      
        },
        @endforeach

        @php
        $i = 0;
        @endphp
        @foreach ($Midfields2 as $player )
        {
          name: '<?php echo $player->name; ?>',
          asset: 'rm-pepe.jpg',
          origin: '<?php echo $player->nationality; ?>',
          pos: '<?php echo $player->position; ?>',
          @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
          goals: <?php echo $player->goals()->count(); ?>,
          games: <?php echo $player->squadlists()->count(); ?>,
          x: <?php echo $m_dimension2[$i]['x']; ?>,
          y: <?php echo $m_dimension2[$i]['y']; ?>,
          @php
          $i++;
        @endphp
      
        },
        @endforeach


        @php
        $i = 0;
        @endphp
        @foreach ($Forwards2 as $player )
        {
          name: '<?php echo $player->name; ?>',
          asset: 'rm-pepe.jpg',
          origin: '<?php echo $player->nationality; ?>',
          pos: '<?php echo $player->position; ?>',
          @php
              $today = new DateTime();
              $diff = $today->diff(new DateTime($player->birthdate));
              $age = $diff->y;
              @endphp
        dob: '<?php echo $age; ?>',
          goals: <?php echo $player->goals()->count(); ?>,
          games: <?php echo $player->squadlists()->count(); ?>,
          x: <?php echo $f_dimension2[$i]['x']; ?>,
          y: <?php echo $f_dimension2[$i]['y']; ?>,
          @php
          $i++;
        @endphp
      
        },
        @endforeach
      ]
    }
  };

  state = {
    home: true,
    disabHover: false,
    swapSides: function() {
      if (this.home) {
        return this.home = false;
      } else {
        return this.home = true;
      }
    },
    curSide: function() {
      if (this.home) {
        return 'home';
      } else {
        return 'away';
      }
    }
  };

  pos = {
    world: {
      baseX: 0,
      baseY: 0,
      baseZ: -200
    },
    def: {
      goalie: [0, -50]
    }
  };

  dom = {
    addPlayers: function(side) {
      var $el, key, ref, val;
      ref = data.players[side];
      for (key in ref) {
        val = ref[key];
        val.side = side;
        $el = this.addPlayer(val);
        $team.append($el);
      }
      $players = $('.js-player');
      $playersHome = $('.js-player[data-side="home"]');
      return $playersAway = $('.js-player[data-side="away"]');
    },
    addPlayer: function(data) {
      var $el;
      $el = $('<div class="js-player player" data-name="' + data.name + '" data-side="' + data.side + '" data-x="' + data.x + '" data-y="' + data.y + '"></div>');
      $el.append('<div class="player__label"><span>' + data.name + '</span></div>');
      $el.append('<div class="player__img"><img src= ' + data.asset + '></div>');
      $el.prepend('<div class="player__card"> </div>');
      $el.prepend('<div class="player__placeholder"></div>');
      this.populateCard($el.find('.player__card'), data);
      return $el;
    },
    preloadImages: function(preload) {
      var i, promises;
      promises = [];
      i = 0;
      while (i < preload.length) {
        (function(url, promise) {
          var img;
          img = new Image();
          img.onload = function() {
            return promise.resolve();
          };
          return img.src = url;
        })(preload[i], promises[i] = $.Deferred());
        i++;
      }
      return $.when.apply($, promises).done(function() {
        scenes.endLoading();
        return scenes.loadIn(1600);
      });
    },
    populateCard: function($el, data) {
      return $el.append('<h3>' + data.name + '</h3>' + '<ul class="player__card__list"><li><span>DOB</span><br/>' + data.dob + ' yr</li><li><span>position</span><br/>' + data.pos + '</li><li><span>Origin</span><br/>' + data.origin + '</li></ul>' + '<ul class="player__card__list player__card__list--last"><li><span>Games</span><br/>' + data.games + '</li><li><span>Goals</span><br/>' + data.goals + '</li></ul>');
    },
    displayNone: function($el) {
      return $el.css('display', 'none');
    }
  };

  events = {
    attachAll: function() {
      $switchBtn.on('click', function(e) {
        var $el;
        e.preventDefault();
        $el = $(this);
        if ($el.hasClass('disabled')) {
          return;
        }
        scenes.switchSides();
        $switchBtn.removeClass('disabled');
        return $el.addClass('disabled');
      });
      $loadBtn.on('click', function(e) {
        e.preventDefault();
        return scenes.loadIn();
      });
      return $players.on('click', function(e) {
        var $el;
        e.preventDefault();
        $el = $(this);
        if ($('.active').length) {
          return false;
        }
        $el.addClass('active');
        scenes.focusPlayer($el);
        return setTimeout((function() {
          return events.attachClose();
        }), 1);
      });
    },
    attachClose: function() {
      return $stage.one('click', function(e) {
        e.preventDefault();
        return scenes.unfocusPlayer();
      });
    }
  };

  scenes = {
    preLoad: function() {
      $teamListHome.velocity({
        opacity: 0
      }, 0);
      $players.velocity({
        opacity: 0
      }, 0);
      $loadBtn.velocity({
        opacity: 0
      }, 0);
      $switcher.velocity({
        opacity: 0
      }, 0);
      $heading.velocity({
        opacity: 0
      }, 0);
      $subHeading.velocity({
        opacity: 0
      }, 0);
      $playersAway.css('display', 'none');
      $world.velocity({
        opacity: 0,
        translateZ: -200,
        translateY: -60
      }, 0);
      return $('main').velocity({
        opacity: 1
      }, 0);
    },
    loadIn: function(delay = 0) {
      var delayInc;
      $world.velocity({
        opacity: 1,
        translateY: 0,
        translateZ: -200
      }, {
        duration: 1000,
        delay: delay,
        easing: 'spring'
      });
      anim.fadeInDir($heading, 300, delay + 600, 0, 30);
      anim.fadeInDir($subHeading, 300, delay + 800, 0, 30);
      anim.fadeInDir($teamListHome, 300, delay + 800, 0, 30);
      anim.fadeInDir($switcher, 300, delay + 900, 0, 30);
      delay += 1200;
      delayInc = 30;
      return anim.dropPlayers($playersHome, delay, delayInc);
    },
    startLoading: function() {
      var images, key, ref, val;
      anim.fadeInDir($loading, 300, 0, 0, -20);
      images = [];
      ref = data.players.home && data.players.away;
      for (key in ref) {
        val = ref[key];
        images.push(ASSET_URL + val.asset);
      }
      return dom.preloadImages(images);
    },
    endLoading: function() {
      return anim.fadeOutDir($loading, 300, 1000, 0, -20);
    },
    arrangePlayers: function() {
      return $players.each(function() {
        var $el;
        $el = $(this);
        return $el.velocity({
          translateX: parseInt($el.attr('data-x')),
          translateZ: parseInt($el.attr('data-y')) // Z is the Y axis on the field
        });
      });
    },
    focusPlayer: function($el) {
      var shiftY;
      data = $el.data();
      shiftY = data.y;
      if (shiftY > 0) {
        shiftY = data.y / 2;
      }
      $('.js-player[data-side="' + state.curSide() + '"]').not('.active').each(function() {
        var $unfocus;
        $unfocus = $(this);
        return anim.fadeOutDir($unfocus, 300, 0, 0, 0, 0, null, 0.2);
      });
      $world.velocity({
        translateX: pos.world.baseX - data.x,
        translateY: pos.world.baseY,
        translateZ: pos.world.baseZ - shiftY // Z is the Y axis on the field
      }, 600);
      $terrain.velocity({
        opacity: 0.66
      }, 600);
      return this.showPlayerCard($el, 600, 600);
    },
    unfocusPlayer: function() {
      var $el;
      $el = $('.js-player.active');
      data = $el.data();
      anim.fadeInDir($('.js-player[data-side="' + state.curSide() + '"]').not('.active'), 300, 300, 0, 0, 0, null, 0.2);
      $el.removeClass('active');
      $world.velocity({
        translateX: pos.world.baseX,
        translateY: pos.world.baseY,
        translateZ: pos.world.baseZ // Z is the Y axis on the field
      }, 600);
      $terrain.velocity({
        opacity: 1
      }, 600);
      return this.hidePlayerCard($el, 600, 600);
    },
    hidePlayerCard: function($el, dur, delay) {
      var $card, $image;
      $card = $el.find('.player__card');
      $image = $el.find('.player__img');
      $image.velocity({
        translateY: 0
      }, 300);
      anim.fadeInDir($el.find('.player__label', 200, delay));
      return anim.fadeOutDir($card, 300, 0, 0, -100);
    },
    showPlayerCard: function($el, dur, delay) {
      var $card, $image;
      $card = $el.find('.player__card');
      $image = $el.find('.player__img');
      $image.velocity({
        translateY: '-=150px'
      }, 300);
      anim.fadeOutDir($el.find('.player__label', 200, delay));
      return anim.fadeInDir($card, 300, 200, 0, 100);
    },
    switchSides: function() {
      var $new, $old, delay, delayInc;
      delay = 0;
      delayInc = 20;
      $old = $playersHome;
      $new = $playersAway;
      if (!state.home) {
        $old = $playersAway;
        $new = $playersHome;
      }
      state.swapSides();
      $old.each(function() {
        var $el;
        $el = $(this);
        anim.fadeOutDir($el, 200, delay, 0, -60, 0);
        anim.fadeOutDir($el.find('.player__label'), 200, delay + 700);
        return delay += delayInc;
      });
      $terrain.velocity({
        rotateY: '+=180deg'
      }, {
        delay: 150,
        duration: 1200
      });
      return anim.dropPlayers($new, 1500, 30);
    }
  };

  anim = {
    fadeInDir: function($el, dur, delay, deltaX = 0, deltaY = 0, deltaZ = 0, easing = null, opacity = 0) {
      $el.css('display', 'block');
      $el.velocity({
        translateX: '-=' + deltaX,
        translateY: '-=' + deltaY,
        translateZ: '-=' + deltaZ
      }, 0);
      return $el.velocity({
        opacity: 1,
        translateX: '+=' + deltaX,
        translateY: '+=' + deltaY,
        translateZ: '+=' + deltaZ
      }, {
        easing: easing,
        delay: delay,
        duration: dur
      });
    },
    fadeOutDir: function($el, dur, delay, deltaX = 0, deltaY = 0, deltaZ = 0, easing = null, opacity = 0) {
      var display;
      if (!opacity) {
        display = 'none';
      } else {
        display = 'block';
      }
      return $el.velocity({
        opacity: opacity,
        translateX: '+=' + deltaX,
        translateY: '+=' + deltaY,
        translateZ: '+=' + deltaZ
      }, {
        easing: easing,
        delay: delay,
        duration: dur
      }).velocity({
        opacity: opacity,
        translateX: '-=' + deltaX,
        translateY: '-=' + deltaY,
        translateZ: '-=' + deltaZ
      }, {
        duration: 0,
        display: display
      });
    },
    dropPlayers: function($els, delay, delayInc) {
      return $els.each(function() {
        var $el;
        $el = $(this);
        $el.css({
          display: 'block',
          opacity: 0
        });
        anim.fadeInDir($el, 800, delay, 0, 50, 0, 'spring');
        anim.fadeInDir($el.find('.player__label'), 200, delay + 250);
        return delay += delayInc;
      });
    }
  };

  init = function() {
    $stage = $('.js-stage');
    $world = $('.js-world');
    $switchBtn = $('.js-switch');
    $loadBtn = $('.js-load');
    $heading = $('.js-heading');
    $switcher = $('.js-switcher');
    $closeBtn = $('.js-close');
    $subHeading = $('.js-subheading');
    $terrain = $('.js-terrain');
    $team = $('.js-team');
    $teamListHome = $('.js-team-home');
    $loading = $('.js-loading');
    dom.addPlayers('home');
    dom.addPlayers('away');
    scenes.preLoad();
    scenes.arrangePlayers();
    events.attachAll();
    return scenes.startLoading();
  };

  $(document).ready(function() {
    return init();
  });

}).call(this);


//# sourceURL=coffeescript
</script>