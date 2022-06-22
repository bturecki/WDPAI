mapboxgl.accessToken = 'pk.eyJ1IjoiYWRyaWFud2lpIiwiYSI6ImNreWE2NnRncTAwNW8yenRhZWpwNWs0ajcifQ.IY3clGCfl3w6bVq7TRZV6A';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: [19.944, 50.049],
    zoom: 5
});


fetch("/places", {
    method: "GET"
}).then(function (response) {
    return response.json();
}).then(function(places) {
    places.map(place => {
        place.coordinates = JSON.parse(place.coordinates).point
    });
    console.log(places)
    placeMarkers(places);
});

function placeMarkers(places) {
    for (const feature of places) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
        new mapboxgl.Marker(el)
            .setLngLat(feature.coordinates)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML(
                        `<h3>${feature.title}</h3><p>${feature.description}</p>`
                    )
            )
            .addTo(map);
    }
}
