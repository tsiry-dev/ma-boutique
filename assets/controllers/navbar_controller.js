import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = [
        'mobileMenu',
        'productsMenu',
        'categoriesMenu',
        'pagesMenu'
    ];

    toggleMobileMenu() {
        this.mobileMenuTarget.classList.toggle('hidden');
    }

    toggleProducts() {
        this.productsMenuTarget.classList.toggle('hidden');
        this.categoriesMenuTarget.classList.add('hidden');
        this.pagesMenuTarget.classList.add('hidden');
    }

    toggleCategories() {
        this.categoriesMenuTarget.classList.toggle('hidden');
        this.productsMenuTarget.classList.add('hidden');
        this.pagesMenuTarget.classList.add('hidden');
    }

    togglePages() {
        this.pagesMenuTarget.classList.toggle('hidden');
        this.productsMenuTarget.classList.add('hidden');
        this.categoriesMenuTarget.classList.add('hidden');
    }
}