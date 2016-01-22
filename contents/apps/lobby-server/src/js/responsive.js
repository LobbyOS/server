lobby.app.r = function(){
  h = $(window).height(), w = $(window).width();
  if(w < 680){
    $(".panel .button").attr("class", "");
    $("#rcss").remove();
    $("<style id='rcss'></style>").html("body{font-size: 0.8rem;}.panel.top .left{left: 0;}.workspace .contents{padding: 0;width: 98% !important;text-align: center;}.panel.top .left li.item, .panel.top .right li.item{margin-right: 2px;}").appendTo("head");
  }
};
$(window).resize(function(){
  lobby.app.r();
});
lobby.app.r();
