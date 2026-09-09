import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['slide', 'counter'];

    connect() {
        this.currentIndex = 0;

        this.showSlide(this.currentIndex);

        this.interval = setInterval(() => {
            this.next();
        }, 5000);
    }

    disconnect() {
        clearInterval(this.interval);
    }

    next() {
        this.currentIndex =
            (this.currentIndex + 1) % this.slideTargets.length;

        this.showSlide(this.currentIndex);
    }

    previous() {
        this.currentIndex =
            (this.currentIndex - 1 + this.slideTargets.length)
            % this.slideTargets.length;

        this.showSlide(this.currentIndex);
    }

    goTo(event) {
        this.currentIndex = Number(
            event.currentTarget.dataset.slide
        );

        this.showSlide(this.currentIndex);
    }

    showSlide(index) {
        // Slides
        this.slideTargets.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === index);
            slide.classList.toggle('opacity-0', i !== index);
        });

        // Compteur
        if (this.hasCounterTarget) {
            this.counterTarget.textContent =
                String(index + 1).padStart(2, '0');
        }

        // Indicateurs
        const indicators = this.element.querySelectorAll(
            '[data-slide]'
        );

        indicators.forEach((indicator, i) => {
            indicator.classList.toggle(
                'bg-primary-dark',
                i === index
            );

            indicator.classList.toggle(
                'bg-white/50',
                i !== index
            );

            indicator.classList.toggle(
                'w-10',
                i === index
            );

            indicator.classList.toggle(
                'w-5',
                i !== index
            );
        });
    }
}