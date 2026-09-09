import { Controller } from '@hotwired/stimulus';
import L from 'leaflet';

export default class extends Controller {
    static values = {
        markerIcon: String,
    };

    connect() {
        this.map = L.map(this.element).setView(
            [-18.8792, 47.5079],
            13
        );

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
        }).addTo(this.map);

        const boutiqueIcon = L.divIcon({
            html: this.markerIconValue,
            className: '',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40],
        });

        L.marker(
            [-18.8792, 47.5079],
            {
                icon: boutiqueIcon,
            }
        )
            .addTo(this.map)
            .bindPopup(`
                <strong>Ma Boutique</strong><br>
                Antananarivo, Madagascar
            `)
            .openPopup();
    }

    disconnect() {
        this.map?.remove();
    }
}