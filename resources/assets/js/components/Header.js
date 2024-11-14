import {gsap} from 'gsap'

export class Header {
  constructor() {
    this.animation()
    this.burger()
    this.scrollHandler()
    //this.search()
  }

  animation() {
    let tl = gsap.timeline()
    // tl.from('.header', {y: -100, opacity: 0})
  }

  burger() {
    this.header = document.querySelector('body header')
    if (this.header) {
      const nav = document.querySelector('.header-nav__burger')
      const burger = document.querySelector('#burger')
      const menu = document.querySelector('.header-nav__nav')


      if (burger) {
        burger.addEventListener('click', evt => {
          evt.preventDefault()
          burger.classList.toggle('active')
          nav.classList.toggle('expanded')
        })

        window.addEventListener('resize', evt => {

          let breakpoint = burger.getAttribute('data-breakpoint')
          if (window.matchMedia('(max-width: ' + breakpoint + 'px)').matches) {
            menu.style.display = 'none'
            burger.classList.remove('hidden')
            burger.classList.add('show')
          } else {
            menu.style.display = 'block'
            burger.classList.remove('show')
            burger.classList.add('hidden')
          }

        })
      }

      const burgerSubmenus = document.querySelectorAll('.header-nav__burger .menu .menu-item-has-children')
      const burgerSubSubmenus = document.querySelectorAll('.sub-menu > .menu-item-has-children')

      burgerSubmenus.forEach(t => {

        let trigger = t.querySelectorAll('a')[0].offsetHeight
        let height = t.querySelector('.sub-menu').offsetHeight + trigger + 30

        t.style.setProperty('--max-height', height + 'px')
        t.style.setProperty('--init-height', trigger + 'px')

        t.addEventListener('click', e => {
          let submenus = document.querySelectorAll('.header-nav__burger .menu > .menu-item-has-children')

          submenus.forEach(s => {
            if (s === t && s.classList.contains('open')) {
              let doNothing = null
            } else {
              s.classList.remove('open')
            }
          })

          t.classList.toggle('open')
        })
      })

      burgerSubSubmenus.forEach(tt => {

        let trigger = tt.querySelectorAll('a')[0].offsetHeight
        let height = tt.querySelector('.sub-menu').offsetHeight + trigger

        tt.style.setProperty('--max-height', height + 'px')
        tt.style.setProperty('--init-height', trigger + 'px')

        tt.addEventListener('click', e => {

          e.stopPropagation()
          let subsubmenus = document.querySelectorAll('.sub-menu > .menu-item-has-children')

          subsubmenus.forEach(ss => {
            if (ss === tt && ss.classList.contains('open')) {
              let doNothing = null
            } else {
              ss.classList.remove('open')
            }
          })

          tt.classList.toggle('open')
        })
      })
    }
  }


  scrollHandler() {

    if (document.documentElement.scrollTop || document.body.scrollTop > 0) {
      this.header.classList.add('scrolled')
    }

    document.addEventListener('scroll', () => {
      let height = document.documentElement.scrollTop || document.body.scrollTop || window.pageYOffset

      if (height > 0 && !this.header.classList.contains('scrolled')) {
        this.header.classList.toggle('scrolled')
      }
      if (height === 0 && this.header.classList.contains('scrolled')) {
        this.header.classList.toggle('scrolled')
      }
    })

  }

  search() {

    let search = document.querySelector('.header-actions-search')
    let searchModal = document.querySelector('#search-modal')
    let closeSearch = document.querySelector('#close-search')

    search.addEventListener('click', () => {
      searchModal.style.top = '0'
    })

    closeSearch.addEventListener('click', () => {
      searchModal.style.top = '-40%'
    })

  }


}
