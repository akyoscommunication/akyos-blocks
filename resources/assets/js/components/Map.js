import L from 'leaflet'
import 'leaflet/dist/leaflet.css'

import markerIcon2x from 'leaflet/dist/images/marker-icon-2x.png'
import markerIcon from 'leaflet/dist/images/marker-icon.png'
import markerShadow from 'leaflet/dist/images/marker-shadow.png'
import customIcon from '@images/marker.png'

export class Map {
  constructor () {
    const maps = document.querySelectorAll('.map')

    if(maps.length) {
      maps.forEach(map => {
        this._map = map.querySelector('[data-markers]')
        this.make()
      })
    }
  }

  make () {
    delete L.Icon.Default.prototype._getIconUrl

    const redIcon = new L.Icon({
      iconUrl: customIcon,
      shadowUrl: markerShadow,
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41],
    });

    L.Icon.Default.mergeOptions({
      iconRetinaUrl: markerIcon2x,
      iconUrl: markerIcon,
      shadowUrl: markerShadow,
    })

    const markers = JSON.parse(this._map.dataset.markers)

    const firstMarkerLatLng = [markers[0].lat, markers[0].lng];
    const map = L.map(this._map.id).setView(firstMarkerLatLng, 14)

    L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
      attribution: '&copy; Google',
      maxZoom: 20,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    markers.forEach(markerData => {
      const marker = L.marker([markerData.lat, markerData.lng], {icon: redIcon}).addTo(map)
      marker.bindPopup(`${markerData.content}`)
    })
  }
}
