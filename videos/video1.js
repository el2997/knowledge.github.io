var my_video, vid, playbtn, seekslider , curtimetext, durtimetext,seekslider2,fullscreenbtn,mutebtn, volumeslider, video_controls_bar, vol;

function initializePlayer(){

  //set object references
  vid = document.getElementById("my_video");
  playbtn = document.getElementById("playpausebtn");
  seekslider = document.getElementById("seekslider");
  curtimetext = document.getElementById("curtimetext");
  durtimetext = document.getElementById("durtimetext");
  seekslider2 = document.getElementById("seekslider2");
  mutebtn = document.getElementById("mutebtn");
  volumeslider = document.getElementById("volumeslider");
  vol= document.getElementById("vol");
  fullscreenbtn = document.getElementById("fullscreenbtn");
  video_controls_bar = document.getElementById("video_controls_bar");
  my_video = document.getElementById("my_video");

  //add event listeners
  playbtn.addEventListener("click", playPause, false);
  seekslider.addEventListener("change", vidSeek, false);
  seekslider2.addEventListener("change", vidSeek2, false);
  vid.addEventListener("timeupdate", seektimeupdate, false);
  mutebtn.addEventListener("click", vidmute, false);
  mutebtn.addEventListener("mouseover", () => vol.classList.add('appear'));
  mutebtn.addEventListener("click", ()=> vol.classList.remove('appear'));
  vol.addEventListener("mouseout", () => vol.classList.remove('appear'));
  volumeslider.addEventListener("change", setvolume, false);
  fullscreenbtn.addEventListener("click", toggleFullScreen, false);
  my_video.addEventListener("click", () => video_controls_bar.classList.add("hola"));
  my_video.addEventListener("click", () => video_controls_bar.classList.remove("hola"));


}


window.onload = initializePlayer;



function playPause() {

  if (vid.paused){
    vid.play();
    playbtn.innerHTML = "Pause";

  }else{
    vid.pause();
    playbtn.innerHTML = "Play";

  }
}

function vidSeek (){

  var seekto = vid.duration * (seekslider.value/100);
  vid.currentTime = seekto;


}

function vidSeek2 (){
  var seekto2 = vid.duration * (seekslider2.value/100);
  vid.currentTime = seekto2;

}

function seektimeupdate(){

  var nt = vid.currentTime * (100 / vid.duration) ;

  seekslider.value = nt ;
  seekslider2.value = nt-0.5 ;

  var curmins = Math.floor(vid.currentTime /60);
  var cursecs = Math.floor(vid.currentTime - curmins * 60);
  var durmins = Math.floor(vid.duration / 60);
  var dursecs = Math.round(vid.duration - durmins * 60);

  if (cursecs < 10){
    cursecs = "0" + cursecs;
  }
  if (dursecs < 10){
    dursecs = "0" + dursecs;
  }
  if (curmins < 10){
    curmins = "0" + curmins;
  }
  if (durmins < 10){
    durmins = "0" + durmins;
  }

  curtimetext.innerHTML = curmins +":"+ cursecs;
  durtimetext.innerHTML = durmins +":"+ dursecs;

}

function vidmute(){
  if (vid.muted){
    vid.muted = false;
    mutebtn.innerHTML = "Mute";
    volumeslider.value=100;

  }else{
    vid.muted = true;
    mutebtn.innerHTML = "Unmute";
    volumeslider.value=0;



  }
}

function setvolume(){
  vid.volume = volumeslider.value /100 ;

}

function toggleFullScreen(){
  if(vid.requestFullScreen){
    document.getElementById('video_player_box').requestFullScreen();
  }
  else if (vid.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
    document.getElementById('video_player_box').webkitRequestFullscreen();

}

}
