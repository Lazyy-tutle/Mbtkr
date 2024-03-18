$(document).ready(function(){

    function getYouTubeVideoId(url) {
        // Regular expression to match YouTube video ID
        var regExp = /^.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]{11}).*/;
        var match = url.match(regExp);
    
        if (match && match[1]) {
            return match[1]; // Return the extracted video ID
        } else {
            return null; // Return null if no match found
        }
    }
    $("#play").show();
    $("iframe").hide();
    $("#play").click(function(event){
        event.preventDefault();
        var id = getYouTubeVideoId($(this).attr("href"));
        $(this).next("iframe").show();
        $(this).next("iframe").attr("src", "https://www.youtube.com/embed/" + id);
        $(this).hide();
    });   
});