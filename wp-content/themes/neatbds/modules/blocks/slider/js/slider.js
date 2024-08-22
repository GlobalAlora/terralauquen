/*
Full docs: swiperjs.com/swiper-api
*/
if ( typeof Swiper !== 'undefined' ) {
  const swiper = new Swiper('.swiper', {
    /* Optional parameters */
    direction: 'horizontal',
    loop: true,

    /* If we need pagination */
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    /* Navigation arrows */
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }

  });
}