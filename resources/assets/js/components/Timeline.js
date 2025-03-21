import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";

export class Timeline {
  constructor() {
    this._timelines = document.querySelectorAll('[timeline-pin]')

    this._timelinesV = document.querySelectorAll('[timeline-vertical]')

    if (this._timelines.length) {
      if (window.innerWidth > 786) {
        this.init()
      } else
        this.line()
    }

    if (this._timelinesV.length) {
      this.vertical()
    }
  }

  init() {

    this._timelines.forEach((timeline) => {
      gsap.registerPlugin(ScrollTrigger)
      let isAlternate = timeline.hasAttribute('timeline-pin-alternate')
      let isMiddle = timeline.hasAttribute('timeline-pin-middle')
      let panels = timeline.querySelectorAll('[timeline-item]')
      let wrapper = timeline.querySelector('[timeline-pin-wrapper]')
      let line = timeline.querySelector('[timeline-line]')


      gsap.to(wrapper, {
        x: () => -1 * ((timeline.scrollWidth - innerWidth) + innerWidth / 4),
        ease: 'none',
        scrollTrigger: {
          trigger: timeline,
          pin: true,
          scrub: true,
          start: 'top 30%',
          end: () => {
            return '+=' + ((timeline.scrollWidth - innerWidth) + innerWidth / 4)
          }
        }
      })

      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: timeline,
          start: "top 80%",
          scrub: true,
          end: () => {
            return '+=' + ((timeline.scrollWidth - innerWidth) + innerWidth / 2)
          }
        }
      });

      if (isAlternate) {

        panels.forEach((panel, i) => {
          if (i % 2 === 0) {
            tl.fromTo(panel, {yPercent: 70, opacity: 0}, {yPercent: -76, opacity: 1})
          } else {
            tl.fromTo(panel, {yPercent: 130, opacity: 0, duration: 10}, {yPercent: 76, opacity: 1})
          }
        });
      } else if (isMiddle) {
        panels.forEach((panel, i) => {
          tl.fromTo(panel, {yPercent: 130, opacity: 0, duration: 10}, {yPercent: 0, opacity: 1})
        });
      } else {
        panels.forEach((panel, i) => {
          tl.fromTo(panel, {yPercent: 130, opacity: 0, duration: 10}, {yPercent: 76, opacity: 1})
        });
      }

      gsap.to(line,
        {
          right: (100 - (innerWidth / timeline.scrollWidth) * 900) + '%',
          ease: 'none',
          scrollTrigger: {
            trigger: timeline,
            start: "top 80%",
            scrub: true,
            end: () => {
              return '+=' + ((timeline.scrollWidth - innerWidth) + innerWidth / 4)
            }
          }
        }
      )

      gsap.to(line,
        {
          x: () => -1 * ((timeline.scrollWidth - innerWidth) + innerWidth) + 500,
          ease: 'none',
          scrollTrigger: {
            trigger: timeline,
            start: "top 40%",
            scrub: true,
            end: () => {
              return '+=' + ((timeline.scrollWidth - innerWidth) + innerWidth / 4)
            }
          }
        }
      )
    });
  }

  line() {
    this._timelines.forEach((timeline) => {
      let line = timeline.querySelector('[timeline-line]')

      if (line) {
        let width = timeline.scrollWidth

        line.style.width = (width - 150) + 'px'
      }
    })
  }

  vertical() {
    this._timelinesV.forEach((timeline) => {
      gsap.to(timeline.querySelector('[timeline-line]'), {
        '--height': 50 + 'vh',
        scrollTrigger: {
          trigger: timeline,
          start: 'top 50%',
          end: 'top',
          scrub: true,
          toggleActions: 'restart none none reverse',
        }
      })

      timeline.querySelectorAll('[timeline-item]').forEach((item) => {
        ScrollTrigger.create({
          trigger: item,
          start: 'top 60%',
          onEnter: () => {
            item.style.color = '#C00F82'
            item.style.setProperty('--color-content', '#002379')
            item.style.setProperty('--color-circle', '#C00F82')
          }
          ,
          onLeave: () => {
            item.style.color = '#C00F82'
            item.style.setProperty('--color-content', '#002379')
            item.style.setProperty('--color-circle', '#C00F82')
          },
          onEnterBack: () => {
            item.style.color = '#C00F82'
            item.style.setProperty('--color-content', '#002379')
            item.style.setProperty('--color-circle', '#C00F82')
          },
          onLeaveBack: () => {
            item.style.color = '#002379'
            item.style.setProperty('--color-content', '#002379')
            item.style.setProperty('--color-circle', '#002379')
          }
        })
      })
    })
  }
}
