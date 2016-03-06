<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>

    <!--[if lt IE 9]>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <![endif]-->
    <!--[if (gte IE 9) | (!IE)]><!-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--<![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Skaterbase</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.amber-cyan.min.css" />
    <link rel="stylesheet" href="mdl.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
      function searchq() {
        var search_text = $("input[name='search']").val();

        $.post("live-search.php", {sarchVal: search_text}, function(output){
          $("#output").html(output);
        });
      }
    </script>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header ">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Search</span>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
          <p>George Terry</p>
        </header>
        <nav class="demo-navigation mdl-navigation">
          <a href="index.php" class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">home</i>Home</a>
          <a href="search.php" class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">search</i>Search</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">playlist_add</i>Trick goals</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">playlist_add_check</i>Tricks landed</a>
          <div class="mdl-layout-spacer"></div>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="mdl-grid demo-content">
          <div class="mdl-cell mdl-cell--12-col mdl-grid mdl-grid--no-spacing">
            <div class="search mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__actions mdl-card--border">
                <form action="search.php" method="post">
                  <i class="material-icons">search</i>
                  <input type="text" name="search" placeholder="Search for tricks..." autocomplete="off" onkeydown="searchq();"></input>
                </form>
              </div>
            </div>
            <div id="output" class="result-container mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            </div>
            <!-- Video
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="video mdl-card--expand">
              <iframe width="1280" height="720" src="https://www.youtube.com/embed/dlo0GkrLSYE?rel=0" frameborder="0" allowfullscreen></iframe>
              </div>
              <div class="add_or_remove mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                  <i class="material-icons">playlist_add</i>
                  Trick goal
                </a>
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">
                  <i class="material-icons">playlist_add_check</i>
                  Trick landed
                </a>
              </div>
            </div>
            -->
          </div>
        </div>
      </main>
    </div>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
          </g>
        </defs>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <g id="chart">
            <g id="Gridlines">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
              <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
              <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
              <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
              <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
              <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
              <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
              <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
              <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
              <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
              <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
              <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
              <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
              <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3   "/>
            </g>
            <g id="Layer_4">
              <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125   "/>
            </g>
          </g>
        </defs>
      </svg>

    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
  </body>
</html>
