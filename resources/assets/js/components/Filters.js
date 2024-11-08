export class Filters {
  constructor() {
    document.querySelectorAll('*[data-filters]').forEach((container) => {

      const endpoint = document.querySelector(container.dataset.filters);
      if (endpoint) {

        const isMultiple = container.getAttribute('data-filters-multiple') === 'true';
        const filters = container.querySelectorAll('*[data-filter]');
        const filtereds = endpoint.querySelectorAll('*[data-filtered]');

        filters.forEach((filter) => {
          filter.addEventListener('click', (e) => {
            e.preventDefault();
            this.filter(filtereds, filters, filter);
          });
        })

        this.filter(filtereds, filters, filters[0]);
      }
    })
  }

  reset(filtereds, filters) {
    filters.forEach((filter) => {
      filter.classList.remove('active');
    });

    filtereds.forEach((filtered) => {
      filtered.setAttribute('hidden', '');
    });
  }

  showAll(filtereds) {
    filtereds.forEach((filtered) => {
      filtered.removeAttribute('hidden');
    });
  }

  filter(filtereds, filters, filter) {
    const filterValue = filter.dataset.filter || filter;
    this.reset(filtereds, filters);
    filter.classList.add('active');

    if (filterValue === '*') {
      this.showAll(filtereds);
      return;
    }

    filtereds.forEach((filtered) => {
      const filters_availables = filtered.dataset.filtered.split('|');
      if (filters_availables.includes(filterValue)) {
        filtered.removeAttribute('hidden');
        filtered.classList.add('animate-fade-in');
      }
    });
  }
}
