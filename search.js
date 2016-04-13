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