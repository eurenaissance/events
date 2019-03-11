import {data} from '../data/readDataTag';
import L, {Marker} from 'leaflet';
import moment from 'moment';

const exposed = data.readExposedData();

moment.locale(exposed.locale);

const map = L.map('map', {
    scrollWheelZoom: false,
});

const markerIcon = L.icon({
    iconUrl: '/res/icons/marker.png',
    iconSize: [26, 26],
    iconAnchor: [13, 26],
    popupAnchor:  [0, -20] // point from which the popup should open relative to the iconAnchor
});

L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
}).addTo(map);

const markers: Marker[] = [];
for (let slug in exposed.map.blocks) {
    const block = exposed.map.blocks[slug];

    let content = '';
    for (let slug in block.events) {
        const event = block.events[slug];

        content += '<div class="home__map__event">';
        content += '<a href="/event/'+slug+'" target="_blank">';
        content += event.name;
        content += '</a>';
        content += '<div class="home__map__event__date">';
        content += moment(event.date).format("MMMM Do YYYY, hh:mm");
        content += '</div>';
        content += '</div>';
    }

    markers.push(L.marker([block.lng, block.lat], { icon: markerIcon }).bindPopup(content));
}

if (markers.length === 0) {
    map.setView([47.206566, 13.402325], 4);
} else {
    const featureGroup = L.featureGroup(markers);

    featureGroup.addTo(map);
    map.fitBounds(featureGroup.getBounds());
}
