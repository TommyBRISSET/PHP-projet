// lettre une à une 
const titreSpans = document.querySelectorAll('h2 span');
window.addEventListener('load', () => {
  const TL = gsap.timeline({paused: true});
  TL.staggerFrom(titreSpans, 1, {top: -50, opacity: 0, ease: "power2.out"}, 0.2)  
TL.play();
})
/*slider slick film*/
$('.slider').slick({
  dots: true,
  infinite: true,
  autoplay:true,
  autospeed:10,
  speed: 750,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});