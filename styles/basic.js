window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if ($(window).scrollTop() > 50 || $(window).scrollTop() > 50) {
        //document.getElementById("back-to-top").style.display = "block";
        $(".back-to-top").fadeIn();
    } else {
        //document.getElementById("back-to-top").style.display = "none";
        $(".back-to-top").fadeOut();
      }
}

function backToTop() {
    $("html,body").animate({scrollTop:0},"fast");
}
