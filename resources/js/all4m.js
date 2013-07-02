var player = false;
var track = false;
var hostname = location.protocol + "//" + location.host;

var all4m = {
    currentlyPlaying: false,

    init: function() {
        onYouTubePlayerAPIReady = all4m.onYouTubePlayerAPIReady;
        var tag = document.createElement('script');
        tag.src = "http://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        $("#button-next").click(all4m.next);
        $("#flagvideo a").click(all4m.flag);
    },

    onYouTubePlayerAPIReady: function() {
        all4m.currentlyPlaying = track;
        var youtubeid = track.youtubeId;

        player = new YT.Player('video', {
          height: 450,
          width: 800,
          videoId: youtubeid,
          events: {
            'onReady': all4m.onYouTubePlayerReady,
            'onStateChange': all4m.onYouTubePlayerStateChange
          }
        });
    },

    onYouTubePlayerReady: function (playerid) {
        player.playVideo();
        all4m.handleTrackMetaData(track)
    },

    play: function(response) {
        all4m.currentlyPlaying = response;
        player.loadVideoById(response.youtubeId)
        all4m.handleTrackMetaData(response)
    },

    onYouTubePlayerStateChange: function(newstate) {
        console.log("newstate: " + newstate.data);
        if (newstate.data == 0) {
            all4m.next();
        }
    },

    next: function() {
        all4m.load(hostname + "/video/next");
    },


    flag: function() {
        all4m.load(hostname + "/video/flag/" + all4m.currentlyPlaying.id);
    },

    load: function(url) {
        var options = {
            url: url,
            type: "get",
            dataType: "json",
            success: all4m.play
        }
        $.ajax(options);
    },
    
    handleTrackMetaData: function(track) {
        $("#cliptitle").html(track.artist + " - " + track.title);
        document.title = track.artist + " - " + track.title + " - All4M";
    }
    
}

$(document).ready(function() {
    if (selectedTrack && 0 != selectedTrack) {
        var url = "/video/get/" + selectedTrack;
        selectedTrack = 0;
    } else {
        url = "/video/next";
    }
    $.ajax({
        url: url,
        dataType: "json",
        success: function(data) {
            track = data;
            all4m.init();
        }
    });
});

// https://github.com/h5bp/html5-boilerplate/blob/a2b3d06e8b5b0bfb3bd608a1b938c9fa50b1c600/js/plugins.js
// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
