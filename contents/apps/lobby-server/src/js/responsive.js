lobby.app.r = function(){
  h = $(window).height(), w = $(window).width();
  if(w < 680){
    $(".panel .button").attr("class", "");
    $("#rcss").remove();
    $("<style id='rcss'></style>").html(".panel.top .left{left: 0;}").appendTo("head");
  }
};
$(window).resize(function(){
  lobby.app.r();
});
lobby.app.r();
