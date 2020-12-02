//when dom is ready, do stuff
$(document).ready(function (){
  
  // **************************************
  //
  // SEARCH
  //  Show hide advanced search filters form
  // 
  // **************************************
  $('.js-button--advanced').click( function(){
    var panel = $(".panel-advanced-search");

    //slide down search panel if not visible
    if ( panel.hasClass("is-hidden") ) {
      panel.slideDown();
      panel.removeClass("is-hidden");
    } else {
      panel.slideUp();
      panel.addClass("is-hidden");
    }
  });
});