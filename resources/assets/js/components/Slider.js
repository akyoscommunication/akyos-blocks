import Swiper from "swiper";
import {Pagination} from "swiper/modules";
import {Scrollbar} from "swiper/modules";
import {Navigation} from "swiper/modules";
import {Autoplay} from "swiper/modules";

export class Slider {
  constructor()
  {
    document.querySelectorAll('*[slider]').forEach(slider => {
      this.registerSlider(slider)
    })
  }

  registerSlider(slider)
  {
    const name = slider.getAttribute('data-slider');
    const slider_id = slider.getAttribute('sliderid');
    const per_view = slider.getAttribute('per-view');
    const per_view_sm = slider.getAttribute('per-view-sm');
    const per_view_md = slider.getAttribute('per-view-md');
    const per_view_xs = slider.getAttribute('per-view-xs');
    const autoheight = parseInt(slider.getAttribute('autoheight'));
    const nav = slider.getAttribute('navigation');
    const paginationAttr = slider.getAttribute('pagination');
    const sco = slider.getAttribute('scrollbar');
    const space = slider.getAttribute('gap') ?? 20;
    const autoplayAttr = slider.getAttribute('data-autoplay') ?? 0;

    const modules = [Pagination];
    let navigation = {};
    let pagination = {};
    let scrollbar = {};
    let autoplayOptions = null;
    if (sco === '1') {
      modules.push(Scrollbar);
      scrollbar = {
        el: ".swiper-scrollbar-" + slider_id,
        draggable: true,
      };
    }

    if (nav === 'arrow') {
      modules.push(Navigation);
      navigation = {
        nextEl: '.swiper-button-next-' + slider_id,
        prevEl: '.swiper-button-prev-' + slider_id,
      };
    }

    if (autoplayAttr) {
      modules.push(Autoplay);
      autoplayOptions = {
        delay: parseInt(autoplayAttr),
      };
    }
    if (paginationAttr === '1') { // Nouvelle logique
      pagination = {
        el: `.swiper-pagination-${slider_id}`,
        clickable: true,
      };
      modules.push(Pagination);
    }

    const swiper = new Swiper('.' + name , {
      modules: modules,
      slidesPerView: per_view,
      loop: false,
      spaceBetween: space,
      navigation: navigation,
      pagination: pagination,
      scrollbar: scrollbar,
      snapOnRelease: true,
      autoHeight: autoheight === 1,
      autoplay: autoplayOptions,
      breakpoints: {
        300: {
          slidesPerView: per_view_xs,
        },
        480: {
          slidesPerView: per_view_sm,
        },
        768: {
          slidesPerView: per_view_md,
        },
        1024: {
          slidesPerView: per_view,
        }
      }
    });

    let arraySlideIndex = [2]

    let currentIndex = swiper.activeIndex;
    const slides = document.querySelectorAll('.swiper-slide');

    swiper.on('slideChange', function (e) {
      slides.forEach(item => item.classList.remove('third-slide-before'));
      currentIndex = e.activeIndex;

      arraySlideIndex.forEach(function (item) {
        slides[currentIndex - item]?.classList.add('third-slide-before');
      })
    })
  }
}
