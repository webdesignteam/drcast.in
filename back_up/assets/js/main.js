

/// testimo slider
// testimo slider

// Page Loading
var preloader = document.getElementById('loading');
function myFunction(){
    preloader.style.display = 'none';
};
// End Page Loading



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
var mybutton = document.getElementById("myBtn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
   // mybutton.style.display = "none";
  }


  if($(this).scrollTop()>200) {
    $(".smire_hdr_top" ).addClass("hide_top");
    } else {
        $(".smire_hdr_top" ).removeClass("hide_top");
    }    
 if($(this).scrollTop()>200) {
      $(".fixed-top" ).addClass("mve_top");
    } else {
      $(".fixed-top" ).removeClass("mve_top");
  }   
   

};
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

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();



// faqs

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));




$('.is-floating-label input, .is-floating-label textarea').on('focus blur', function (e) {
  $(this).parents('.is-floating-label').toggleClass('is-focused', (e.type === 'focus' || this.value.length > 0));
}).trigger('blur');

