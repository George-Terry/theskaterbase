<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0
s
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
    <meta name="description" content="The best way to manage skateboarding tricks.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>The Skaterbase</title>

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.amber-cyan.min.css" />
    <link rel="stylesheet" href="mdl.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <script>
        // This is called with the results from from FB.getLoginStatus().
        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                testAPI();
            } else if (response.status === 'not_authorized') {
                // The person is logged into Facebook, but not your app.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
            } else {
                // The person is not logged into Facebook, so we're not sure if
                // they are logged into this app or not.
                document.getElementById('status').innerHTML = 'Quickly logging in with Facebook will make this this whole site a lot cooler, trust me...';
            }
        }
        // This function is called when someone finishes with the Login
        // Button.  See the onlogin handler attached to it in the sample
        // code below.
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        window.fbAsyncInit = function() {
            FB.init({

                //localhost ID
                //appId: '1549908995320269',
                
                //Skaterbase ID
                appId: '1509335662710936', 

                cookie: true, // enable cookies to allow the server to access 
                // the session
                xfbml: true, // parse social plugins on this page
                version: 'v2.2' // use version 2.2
            });
            // Now that we've initialized the JavaScript SDK, we call 
            // FB.getLoginStatus().  This function gets the state of the
            // person visiting this page and can return one of three states to
            // the callback you provide.  They can be:
            //
            // 1. Logged into your app ('connected')
            // 2. Logged into Facebook, but not your app ('not_authorized')
            // 3. Not logged into Facebook and can't tell if they are logged into
            //    your app or not.
            //
            // These three cases are handled in the callback function.
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        };
        // Load the SDK asynchronously
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Successful login for: ' + response.name);
                //Hide features not relevant to a logged in user
                $('.logged_out').hide().fadeOut(2000);
                //$('#status').html("Not you can add");
                $('#profile').hide().fadeIn(3000);
                //Generate the HTML that displays the users profile and options
                $('#profile').html('<img class="profile_pic" src="//graph.facebook.com/' + response.id + '/picture?width=160&height=160"><div class="profile_info"><span>' + response.name + '<span></div>');
                fb_id = response.id;
            });
        }
    </script>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header ">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Search</span>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer">
        <header class="demo-drawer-header">
          <div class="row profile">
            <fb:login-button class="logged_out" scope="public_profile,email" onlogin="checkLoginState();">
            </fb:login-button>
            <div id="status"></div>
            <div id="profile"></div>
        </div>
        </header>
        <nav class="demo-navigation mdl-navigation">
          <a href="index.php" class="mdl-navigation__link"><i class="material-icons" role="presentation">home</i>Home</a>
          <a href="search.php" class="mdl-navigation__link"><i class="material-icons" role="presentation">search</i>Search</a>
          <a href="tricklist.php" class="mdl-navigation__link"><i class="material-icons" role="presentation">assignment</i>Trick List</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="mdl-grid">
          <div class="mdl-cell mdl-cell--12-col mdl-grid mdl-grid--no-spacing">
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__actions mdl-card--border">
                
                  <div class="search mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <div class="mdl-card__actions mdl-card--border">
                      <form action="search.php" method="post">
                        <i class="material-icons">search</i>
                        <input id="search" type="text" name="search" placeholder="Search for tricks..." autocomplete="off" onkeydown="searchq();"></input>
                      </form>
                    </div>
                  </div>
                  <div id="output" class="result-container mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            </div>
            <div id="prev-result" class="result-container mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            </div>
            <div class="mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            <div class="video-container mdl-card__actions mdl-card--border">
              <div id="video"></div>
              <div id="notification"></div>
            </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script src="https://code.getmdl.io/1.1.1/material.min.js"></script>
    <script src="yt_videos.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=init"></script>
    
    <script type="text/javascript">

      function searchq() {
        var search_text = $("input[name='search']").val();

        $.post("live-search.php", {sarchVal: search_text}, function(output){
          $("#output").html(output).show(500);
        });
      }

      $('.video-container').hide();
      //Shows the video container and hides the result container after a trick has been clicked on
      $('.result-container').on('click', '.trick-result', function() {
        $('.result-container').hide(500);
        $('.video-container').show(500);
      });

      $('#search').focus(function(){
        $( "#prev-result" ).html( '<div class="prev-result result mdl-shadow--2dp mdl-card__actions mdl-card--border"><i class="material-icons">backspace</i><p>Go back to '
          + current_vid+
              '...</p></div>' );
        $('.result-container').show(500);
        $('.video-container').hide(500);
      });
      $('.result-container').on('click', '.prev-result', function() {
        $('.result-container').hide(500);
        $('.video-container').show(500);
      });


      //Add the current trick to the "landed" table and change the button from:
      //.btn-landed-false to .btn-landed-true
      $('.video-container').on('click', '.not-goal-btn', function() {

        console.log("Added" + current_vid + " to goals " + window.fb_id + "!");

        $(this).children("i").css("color", "#00BCD4");
        $(".not-goal-btn").addClass( "is-goal-btn" ).removeClass("not-goal-btn");


        $.ajax({
            url: "add_goal.php",
            type: "POST",
            data: {
                user: window.fb_id,
                trick: current_vid
            },
            dataType: "html",
            success: function(data) {
                $('#notification').show().html(data);
            },
        });
    
      });

      $('.video-container').on('click', '.not-landed-btn', function() {

        console.log("Added" + current_vid + " to landed " + window.fb_id + "!");

        $(this).children("i").css("color", "#00BCD4");
        $(".not-landed-btn").addClass( "is-landed-btn" ).removeClass("not-landed-btn");


        $.ajax({
            url: "lists.php",
            type: "POST",
            data: {
                user: window.fb_id,
                trick: current_vid
            },
            dataType: "html",
            success: function(data) {
                $('#notification').show().html(data);
            },
        });
    
      });

      $('.video-container').on('click', '.is-goal-btn', function() {

        console.log("Removed " + current_vid + " goal " + window.fb_id + "!");

        $(this).children("i").css("color", "#37474F");
        $(".is-goal-btn").addClass( "not-goal-btn" ).removeClass("is-goal-btn");

        $.ajax({
            url: "remove_goal.php",
            type: "POST",
            data: {
                user: window.fb_id,
                trick: current_vid
            },
            dataType: "html",
            success: function(data) {
                $('#notification').show().html(data);
            },
        });
    
      });

      $('.video-container').on('click', '.is-landed-btn', function() {

        console.log("Removed " + current_vid + " for " + window.fb_id + "!");

        $(this).children("i").css("color", "#37474F");
        $(".is-landed-btn").addClass( "not-landed-btn" ).removeClass("is-landed-btn");


        $.ajax({
            url: "remove_landed.php",
            type: "POST",
            data: {
                user: window.fb_id,
                trick: current_vid
            },
            dataType: "html",
            success: function(data) {
                $('#notification').show().html(data);
            },
        });
    
      });


      $('#video').on('click', '.exit', function() {
        $( ".video-container" ).hide(500);
      });
/*
      $('.video-container').on('click', '.btn-landed-false', function() {

        $(".btn-landed-false").addClass( ".btn-landed-true" ).removeClass(".btn-landed-false");
    
      });
      $('.video-container').on('click', '.btn-landed-true', function() {

        $(".btn-landed-true").addClass( ".btn-landed-false" ).removeClass(".btn-landed-true");
    
      });
*/


    </script>
  </body>
</html>
