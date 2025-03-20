export class Accordion {

  constructor() {
    this.closeAllAccordion()
  }

  closeAllAccordion() {
    const accordions = document.querySelectorAll('details');

    accordions.forEach((accordion) => {
      accordion.addEventListener('click', function() {
        accordions.forEach((item) => {
          if (item !== accordion && item.open) {
            item.removeAttribute('open');
          }
        });
      });
    });
  }

}
