var player = false;
var track = false;
var hostname = location.protocol + '//' + location.host;

var all4m = {
    currentlyPlaying: false,

    init: function() {
        onYouTubePlayerAPIReady = all4m.onYouTubePlayerAPIReady;
        var tag = document.createElement('script');
        tag.src = 'http://www.youtube.com/player_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        $('#button-next').click(all4m.next);
        $('#flagvideo a').click(all4m.flag);
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
            'onStateChange': all4m.onYouTubePlayerStateChange,
            'onError': all4m.next
          },
          playerVars: {
              'wmode': 'transparent'
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
        console.log('newstate: ' + newstate.data);
        if (newstate.data == 0) {
            all4m.next();
        }
    },

    next: function() {
        _gaq.push(['_trackEvent', 'Videos', 'Next']);
        all4m.load(hostname + '/video/next');
    },


    flag: function() {
        _gaq.push(['_trackEvent', 'Videos', 'Flag']);
        all4m.load(hostname + '/video/flag/' + all4m.currentlyPlaying.id);
    },

    load: function(url) {
        var options = {
            url: url,
            type: 'get',
            dataType: 'json',
            success: all4m.play
        }
        $.ajax(options);
    },
    
    handleTrackMetaData: function(track) {
        $('#cliptitle').html(track.artist + ' - ' + track.title);
        document.title = track.artist + ' - ' + track.title + ' - All4M';
    }
}

var search = {
    results: [],
    queryInProgress: 0,

    search: function(query, callback)
    {
        search.queryInProgress++;

        var options = {
            url: hostname + '/search/' + query,
            type: 'get',
            dataType: 'json',
            success: function(data) { search.searchDisplay(data, callback); }
        };
        $.ajax(options);
    },

    searchDisplay: function(data, callback)
    {
        search.queryInProgress--;
        if (0 < search.queryInProgress) {
            return;
        }

        search.results = [];
        var ids = new Array();

        for (var i = 0; i < data.length; i++) {
            search.results[data[i].id] = data[i];
            ids.push(data[i].id);
        }
        callback(ids);
    },

    highLighter: function(id)
    {
        var item = search.results[id];
        return item.artist + ' - ' + item.title;
    },

    select: function(id)
    {
        window.location = hostname + '/play/' + id;
        return search.highLighter(id);
    }

}

$(document).ready(function() {
    if (selectedTrack && 0 != selectedTrack) {
        var url = '/video/get/' + selectedTrack;
        selectedTrack = 0;
    } else {
        url = '/video/next';
    }
    $.ajax({
        url: url,
        dataType: 'json',
        success: function(data) {
            track = data;
            //http://stackoverflow.com/questions/9038625/detect-if-device-is-ios
            //http://stackoverflow.com/questions/8972726/youtube-api-not-working-with-ipad-iphone-non-flash-device
            if (navigator.userAgent.match(/(iPad|iPhone|iPod)/g)) {
                $('#video').html('<div id="ios-starter">Click here to play!</div>');
                $('#ios-starter').on('click touchstart', function(){
                    $('#video').html('');
                    all4m.init();
                });

            } else {
                all4m.init();
            }
        }
    });
    
    $('#search').typeahead({
        source: search.search,
        items: 8,
        minLength: 2,
        matcher: function(item) { return true; },
        highlighter: search.highLighter,
        updater: search.select
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
