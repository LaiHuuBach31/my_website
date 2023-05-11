const swipers = new Swiper('.swipers', {


    breakpoints: {
        640: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 4,
        },
        1040: {
            slidesPerView: 5,
          },
      },
  
    navigation: {
      nextEl: '.swiper-button-next2',
      prevEl: '.swiper-button-prev2',
    },
  
  });

function name() {
    alert('oke')
}