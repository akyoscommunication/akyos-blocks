import Swiper from 'swiper'
import { Pagination, Autoplay, Navigation, EffectCoverflow, Thumbs, FreeMode, Grid } from 'swiper/modules'

export class Slider {
  constructor () {
    this._swiperToControl = null
    document.querySelectorAll('*[slider]').forEach(slider => {
      this.registerSlider(slider)
    })
  }

  registerSlider (slider) {

    let config = {
      loop: false,
      modules: []
    }

    /** variables from view **/
    let name = slider.getAttribute('data-slider')
    let per_view = slider.getAttribute('per-view')
    let per_view_sm = slider.getAttribute('per-view-sm')
    let per_view_md = slider.getAttribute('per-view-md')
    let per_view_xs = slider.getAttribute('per-view-xs')
    let modules = slider.getAttribute('modules')

    let parent = "." + slider.closest('section').classList[0]

    /** extra config **/
    const extraConfig = slider.getAttribute('extra')

    if (JSON.parse(modules).includes('navigation')) {
      config.modules.push(Navigation)
      config.navigation = {
        prevEl: parent + ' .swiper-button-prev',
        nextEl: parent + ' .swiper-button-next' ,
      }
    }

    if (JSON.parse(modules).includes('pagination')) {
      config.modules.push(Pagination)
      config.pagination = {
        el: parent + ' .swiper-pagination',
        type: 'bullets',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="swiper-pagination-bullet"></span>'
        }
      }
    }

    if(JSON.parse(modules).includes('grid')) {
      config.modules.push(Grid)
      config.grid = {
        fill: 'column',
        rows: JSON.parse(extraConfig).rows ?? 2
      }
    }

    if (JSON.parse(modules).includes('autoplay')) {
      config.modules.push(Autoplay)
      config.autoplay = {
        delay: 2500,
        disableOnInteraction: false,
        waitForTransition: false,
      }
    }

    if (JSON.parse(modules).includes('freeMode')) {
      config.modules.push(FreeMode)
      config.freeMode = true
    }

    if (JSON.parse(modules).includes('coverflow')) {
      config.modules.push(EffectCoverflow)
      config.effect = 'coverflow'
      config.centeredSlides = true
      config.coverflowEffect = {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 4,
        slideShadows: true
      }
      config.loop = true
    }

    const swiper = new Swiper('.' + name, {
      ...config,
      ...JSON.parse(extraConfig),
      wrapperClass: name + '-wrapper',
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
    })

    if (JSON.parse(modules).includes('thumbs')) {
      this._swiperToControl = swiper
    }

    if (JSON.parse(extraConfig).hasThumbs) {
      const updateSwiper = { ...this._swiperToControl.params }
      const updateSwiperName = this._swiperToControl.el.getAttribute('data-slider')
      this._swiperToControl.destroy(true, true)
      updateSwiper.modules = updateSwiper.modules ? [...updateSwiper.modules, Thumbs] : [Thumbs]
      updateSwiper.thumbs = {
        swiper: swiper
      }
      new Swiper('.' + updateSwiperName, updateSwiper)
    }



  }
}
