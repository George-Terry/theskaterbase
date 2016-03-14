
//replace {{keys}} from an HTML template with formatted JSON data (https://github.com/FriesFlorian/tplawesome)
function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}

$(function() {
    $('.result-container').on('click', '.result', function(e) {
        console.log("yt function run");
        console.log($("p", this).text());

       e.preventDefault();
       // prepare the request
       var request = gapi.client.youtube.search.list({
            part: "snippet",
            type: "video",
            channelId: "UCX9_Ks1MXuwXCmtt0fOFsxA",
            q: "how-to '" + encodeURIComponent($("p", this).text()).replace(/%20/g, "'"),
            maxResults: 1
       }); console.log(request);
       // execute the request
       request.execute(function(response) {
          var results = response.result;
          $("#video").html("");
          $.each(results.items, function(index, item) {
            $.get("video.html", function(data) {
                $("#video").append(tplawesome(data, [{"videoid":item.id.videoId}]));
            });
          });
       });
    });
});

function init() {
    gapi.client.setApiKey("AIzaSyCdbNzu-sah57tzrW3LcFmmHYw2kk1Jksw");
    gapi.client.load("youtube", "v3", function() {
      console.log("YT API initialised...")
        // yt api is ready
    });
}
