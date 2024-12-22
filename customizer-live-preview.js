(function($) {
    wp.customize('navbar_bg_color', function(value) {
        value.bind(function(newColor) {
            $('.navbar').css('background-color', newColor);
        });
    });

    wp.customize('navbar_text_color', function(value) {
        value.bind(function(newColor) {
            $('.navbar, .navbar a').css('color', newColor);
        });
    });
})(jQuery);

let slideIndex = 0;
showSlides();

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  const slides = document.getElementsByClassName("slide");
  if (n >= slides.length) { slideIndex = 0; }
  if (n < 0) { slideIndex = slides.length - 1; }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex].style.display = "block";
}

// Auto Slide
setInterval(() => {
  slideIndex++;
  showSlides(slideIndex);
}, 5000); // Change slide every 5 seconds

