function changeLinks(){
  $(".open-via-lobby").each(function(){
    p = $(this).data("path");
    if(typeof localStorage["lobbyURL"] === "undefined"){
      $(this).live("click", function(){
        alert("You have to set Lobby URL. Please do it so by clicking the settings icon in the apps navbar.");
      });
    }else{
      $(this).attr({
        href: localStorage["lobbyURL"] + p,
        target: '_blank'
      });
    }
  });
}
lobby.load(function(){
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
  });
  $('.modal-trigger').leanModal({
    ready: function(){
      $('.workspace .modal-content #lobby_url').val(localStorage["lobbyURL"]);
    }
  });
  $('.workspace .modal-footer #save').live('click', function(){
    localStorage["lobbyURL"] = $('.workspace .modal-content #lobby_url').val();
    changeLinks();
  });
});
$(document).ready(function(){
  changeLinks();
});
