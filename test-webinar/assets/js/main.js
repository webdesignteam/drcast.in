

// Top Navbar Fixed
// When the user scrolls down 500px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if($(this).scrollTop()>5) {
       $( ".navbar-me" ).addClass("fixed-me");
    } else {
       $( ".navbar-me" ).removeClass("fixed-me");
    }    
    
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
    } else {
    mybutton.style.display = "none";
    }
};
// End Top Navbar Fixed


// Bootstrap Scrollpy

//++++++++++ adding active class to menu ++++++++++
$(document).on("click","a[name='link']", function (e) {
    $(".navbar-nav").find(".active").removeClass("active");
     $(this).addClass("active");
});

//++++++++++++++ Bootstrap Scrollpy ++++++++++++++++++++++++
$("#nav ul li a[href^='#']").on('click', function(e) {
    // prevent default anchor click behavior
    e.preventDefault();
    // store hash
    var hash = this.hash;
    // animate
    $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
        // when done, add hash to url
        // (default click behaviour)
        window.location.hash = hash;
      }); 
 });



//++++++++++++++ Count of a Textarea ++++++++++++++//
$('textarea').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 400) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    //theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    //theCount.css('font-weight','normal');
  }
  
      
});
//++++++++++++++ End ++++++++++++++//


//++++++++++++++ Scroll Back To Top Button ++++++++++++++//
var mybutton = document.getElementById("goTop");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
//++++++++++++++ End ++++++++++++++//


//++++++++++++++ Bootstrap Navbar collapse ++++++++++++++++++++++++//
$(function(){ 
  var navMain = $(".navbar-collapse");
  navMain.on("click", "a", null, function () {
    navMain.collapse('hide');
  });
});
//++++++++++++++ End ++++++++++++++//