/*
 * YOUTUBE DATA API V3
 * Johnson Ta
 */

//variables for settings in js
var channelName = 'EugenieKitchen';
var videoWidth = 280;
var videoHeight = 300;
var maxResults = 3;

//loading the js document (implementing jquery)
$(document).ready(function(){
    $.get(
        //GET request from youtube data api
        "https://www.googleapis.com/youtube/v3/channels",{
        //implemented from api
        part: 'contentDetails',
        //youtube channel name
        forUsername: channelName,
        //api key name
        key: 'AIzaSyDEr-IzkBfJGT-CgZQRmiPyVbuIuPuH_-o'},
        //videos from the channel to be displayed
        function(data){
            $.each(data.items, function(i, item){
                pid = item.contentDetails.relatedPlaylists.uploads;
                getVids(pid)
            })
        }
    );
    
    function getVids(pid){
        $.get(
        //get request from playlistItems (this is where displaying occurs)
        "https://www.googleapis.com/youtube/v3/playlistItems",{
        part: 'snippet',
        //to output a max of 5 videos from the channel
        maxResults: maxResults,
        playlistId: pid,
        key: 'AIzaSyDEr-IzkBfJGT-CgZQRmiPyVbuIuPuH_-o'},
        function(data){
            var output;
            //loop through
            $.each(data.items, function(i, item){
                console.log(item);
                //title of video
                vidTitle = item.snippet.title;
                //specific video id (need this to display
                videoId = item.snippet.resourceId.videoId;
                
                //output = '<li>'+vidTitle+'</li>';
                output = '<iframe style="margin:5px;" width='+videoWidth+' height='+videoHeight+' src=\"//www.youtube.com/embed/'+videoId+'\">';
                
                //append to results id in html
                $('.results').append(output);
            })
        }
    );
    }
    
});