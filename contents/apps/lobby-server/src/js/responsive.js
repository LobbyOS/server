lobby.app.r = function(){
  h = $(window).height(), w = $(window).width();
  if(w < 680){
    $(".panel .button").attr("class", "");
    $("#rcss").remove();
    $("<style id='rcss'></style>").html("body{font-size: 1rem;}.panel.top .left{left: 0;}.workspace .contents{padding: 0;width: 98% !important;text-align: center;overflow: hidden;word-wrap: break-word;}.panel.top .left li.item, .panel.top .right li.item{margin-right: 4px;}.panel li span{padding: 0 !important;}").appendTo("head");
  }
};
$(window).resize(function(){
  lobby.app.r();
});
lobby.app.r();
