$(document).ready(function(){
      $('.sliderProduct').slick({
        slidesToShow: 4,
        arrows: true,
        slidesToScroll: 4,
        responsive: [
    {
      breakpoint: 770,
      settings: {
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
      });
    });