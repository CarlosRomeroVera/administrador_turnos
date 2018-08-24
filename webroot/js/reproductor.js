
var videoSource = ["webroot/videos/video.mp4", "webroot/videos/cj.mp4"];
var limit = videoSource.length - 1;
document.getElementById("videoarea").controls = false;
var video = document.getElementById("videoarea");


var i= 0;
$(function() {

    $("#videoarea").attr({
        "src": videoSource[i],
        "poster": "",
        "autoplay": "autoplay"
    }) 


    function next(){
        $("#videoarea").attr({
            "src": videoSource[i],
            "poster": "",
            "autoplay": "autoplay"
        }) 
    }


    $('video').on('ended',function(){
        //alert('i:' + i + ' limit:' + limit);
        if (i == limit){
            i=0;
        }
        else {
            i++;
        }
        next();
    });

})


function transition(){
    video.volume = .3;
    $("video").fadeOut();
    $("#videocontainer").css({ 'background-color' : ''});
    $("body").css({ 'background-color' : ''});
    $('div.mini, div.text-mini').fadeOut();

    //LLAMA AL RESTORE EN VEZ DEL ENTER
    setTimeout(
        function() {
            restore();
        }, 12000);

}


function restore(){

    $('#clicks').text("");

        
    if (envio != ""){
        $('div.mini').text(envio);
        $('div.text-mini').text("Turno");
        $('div.mini, div.text-mini').fadeIn(2000);
    }

    envio = "";
    $("#videocontainer").css({ 'background-color' : '#000'});
    $("body").css({ 'background-color' : '#000'});
    $("video").fadeIn(2000);
    video.volume = 1;
}
