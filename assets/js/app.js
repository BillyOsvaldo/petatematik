var map = L.map('map', {
    minZoom: $(window).width() < 768 ? 8 : 8,
    maxZoom: $(window).width() < 768 ? 10.8 : 10.8,
    attributionControl: false
})
.setView([-7.32737,109.40409], 11.4)

L.tileLayer(
    // https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoidG9ueTNzdXByaWFkaSIsImEiOiJjazg5a29hODQwODRkM21xczBxYW84eGJqIn0.mqlI9bDBpGvkfTKO9hv2qA
    '', {
        id: 'mapbox/streets-v9',
        tileSize: 512,
        zoomOffset: -1, 
    }).addTo(map);

/** Func & Variable */
const styleLayer = function() {
    return {
        color: "#696969",
        opacity: 0.4,
        fillOpacity: 0.05,
        weight: 1
    }
};

const onEachFeatureLayer = function(feature, layer) {
    showLayerLabel(feature, layer);
    showCircleMarker(feature, layer);

    layer.on('mouseover', function (e) {
        layer.setStyle({
            fillOpacity: 0.2
        });
    });
    layer.on('mouseout', function (e) {
        layer.setStyle({
            fillOpacity: 0.05
        });
    });

    layer.on('click', function(e) {
        var latlng = layer.getBounds().getCenter();
        if (feature.properties.name == "Kemangkon") latlng = {lat: -7.44766984288904, lng: 109.37023927557217};
        if (feature.properties.name == "Bukateja") latlng = {lat: -7.431261152380231, lng: 109.450429578912};
        if (feature.properties.name == "Kejobong") latlng = {lat: -7.398345000071657, lng: 109.49326233094187};
        if (feature.properties.name == "Pengadegan") latlng = {lat: -7.36876000002394, lng: 109.49185601139587};
        if (feature.properties.name == "Kaligondang") latlng = {lat: -7.369389999848565, lng: 109.4157300000895};
        if (feature.properties.name == "Purbalingga") latlng = {lat: -7.409510000086371, lng: 109.3778199995934};
        if (feature.properties.name == "Kalimanah") latlng = {lat: -7.406694027657205, lng: 109.34263999973624};
        if (feature.properties.name == "Padamara") latlng = {lat: -7.383300709659977, lng: 109.32257736685207};
        if (feature.properties.name == "Kutasari") latlng = {lat: -7.329895845966471, lng: 109.2930534096372};
        if (feature.properties.name == "Bojongsari") latlng = {lat: -7.365198160066998, lng: 109.35783050152649};
        if (feature.properties.name == "Mrebet") latlng = {lat: -7.326274999891305, lng: 109.37728999988365};
        if (feature.properties.name == "Bobotsari") latlng = {lat: -7.278155000103131, lng: 109.36362500024362};
        if (feature.properties.name == "Karangreja") latlng = {lat: -7.236853569886288, lng: 109.32537500010623};
        if (feature.properties.name == "Karangjambu") latlng = {lat: -7.218544983059459, lng: 109.40237377887686};
        if (feature.properties.name == "Karanganyar") latlng = {lat: -7.307164999914761, lng: 109.40719499994935};
        if (feature.properties.name == "Kertanegara") latlng = {lat: -7.309339999990977, lng: 109.43552999970978};
        if (feature.properties.name == "Karangmoncol") latlng = {lat: -7.281790000008446, lng: 109.46530000039476};
        if (feature.properties.name == "Rembang") latlng = {lat: -7.2906252980689885, lng: 109.5248242155152};

        L.popup()
        .setLatLng(latlng)
        .setContent(`
            <h3 class="text-secondary"><b>${feature.properties.name}</b></h3>
            <p class="text-slate-blue">ODP : ${feature.properties.odp}</p>
            <p class="text-dark-orange">PDP : ${feature.properties.pdp}</p>
            <p class="text-danger">Covid-19 : ${feature.properties.positif}</p>
        `)
        .openOn(map);
    })
};

const showLayerLabel = function(feature, layer) {
    var iconSize = [];

    if (feature.properties.name == "Bobotsari") { iconSize = [45, 0]; } 
    if (feature.properties.name == "Bojongsari") { iconSize = [-95, -110]; } 
    if (feature.properties.name == "Bukateja") { iconSize = [50, 15]; } 
    if (feature.properties.name == "Kaligondang") { iconSize = [60, 10]; } 
    if (feature.properties.name == "Kalimanah") { iconSize = [50, 20]; } 
    if (feature.properties.name == "Karanganyar") { iconSize = [70, 30]; } 
    if (feature.properties.name == "Karangjambu") { iconSize = [80, -40]; } 
    if (feature.properties.name == "Karangmoncol") { iconSize = [65, -70]; } 
    if (feature.properties.name == "Karangreja") { iconSize = [-20, -10]; } 
    if (feature.properties.name == "Kejobong") { iconSize = [70, -10]; } 
    if (feature.properties.name == "Kemangkon") { iconSize = [55, 10]; } 
    if (feature.properties.name == "Kertanegara") { iconSize = [57, -45]; } 
    if (feature.properties.name == "Kutasari") { iconSize = [50, 0]; } 
    if (feature.properties.name == "Mrebet") { iconSize = [-50, -65]; } 
    if (feature.properties.name == "Padamara") { iconSize = [50, 40]; } 
    if (feature.properties.name == "Pengadegan") { iconSize = [40, 20]; } 
    if (feature.properties.name == "Purbalingga") { iconSize = [55, 20]; } 
    if (feature.properties.name == "Rembang") { iconSize = [60, -10]; }

    return L.marker(layer.getBounds().getCenter(), {
        icon: L.divIcon({
          className: 'text-secondary label-size',
          html: feature.properties.name,
          iconSize: iconSize
        })
    }).on('click', () => { 
        var latlng = layer.getBounds().getCenter();
        if (feature.properties.name == "Kemangkon") latlng = {lat: -7.44766984288904, lng: 109.37023927557217};
        if (feature.properties.name == "Bukateja") latlng = {lat: -7.431261152380231, lng: 109.450429578912};
        if (feature.properties.name == "Kejobong") latlng = {lat: -7.398345000071657, lng: 109.49326233094187};
        if (feature.properties.name == "Pengadegan") latlng = {lat: -7.36876000002394, lng: 109.49185601139587};
        if (feature.properties.name == "Kaligondang") latlng = {lat: -7.369389999848565, lng: 109.4157300000895};
        if (feature.properties.name == "Purbalingga") latlng = {lat: -7.409510000086371, lng: 109.3778199995934};
        if (feature.properties.name == "Kalimanah") latlng = {lat: -7.406694027657205, lng: 109.34263999973624};
        if (feature.properties.name == "Padamara") latlng = {lat: -7.383300709659977, lng: 109.32257736685207};
        if (feature.properties.name == "Kutasari") latlng = {lat: -7.329895845966471, lng: 109.2930534096372};
        if (feature.properties.name == "Bojongsari") latlng = {lat: -7.365198160066998, lng: 109.35783050152649};
        if (feature.properties.name == "Mrebet") latlng = {lat: -7.326274999891305, lng: 109.37728999988365};
        if (feature.properties.name == "Bobotsari") latlng = {lat: -7.278155000103131, lng: 109.36362500024362};
        if (feature.properties.name == "Karangreja") latlng = {lat: -7.236853569886288, lng: 109.32537500010623};
        if (feature.properties.name == "Karangjambu") latlng = {lat: -7.218544983059459, lng: 109.40237377887686};
        if (feature.properties.name == "Karanganyar") latlng = {lat: -7.307164999914761, lng: 109.40719499994935};
        if (feature.properties.name == "Kertanegara") latlng = {lat: -7.309339999990977, lng: 109.43552999970978};
        if (feature.properties.name == "Karangmoncol") latlng = {lat: -7.281790000008446, lng: 109.46530000039476};
        if (feature.properties.name == "Rembang") latlng = {lat: -7.2906252980689885, lng: 109.5248242155152};

        L.popup()
        .setLatLng(latlng)
        .setContent(`
            <h3 class="text-secondary"><b>${feature.properties.name}</b></h3>
            <p class="text-slate-blue">ODP : ${feature.properties.odp}</p>
            <p class="text-dark-orange">PDP : ${feature.properties.pdp}</p>
            <p class="text-danger">Covid-19 : ${feature.properties.positif}</p>
        `)
        .openOn(map);
    }).addTo(map);
}

const showCircleMarker = function(feature, layer) {
    color = '';

    if (feature.properties.positif > 0) {
        color = '#FF0000'
    } else
    if (feature.properties.pdp > 0) {
        color = '#FFA500'
    } else {
        color = '#4B0082'
    }
    
    L.circleMarker(this.getLatLng(feature, layer), {
        color: color,
        fillOpacity: 0.3,
        radius: 5,
        weight: 2,
        onEachFeature: onEachFeatureLayer
    }).addTo(map);
}

function getLatLng(feature, layer) {
    var latlng = layer.getBounds().getCenter();
    if (feature.properties.name == "Kemangkon") latlng = {lat: -7.44766984288904, lng: 109.37023927557217};
    if (feature.properties.name == "Bukateja") latlng = {lat: -7.431261152380231, lng: 109.450429578912};
    if (feature.properties.name == "Kejobong") latlng = {lat: -7.398345000071657, lng: 109.49326233094187};
    if (feature.properties.name == "Pengadegan") latlng = {lat: -7.36876000002394, lng: 109.49185601139587};
    if (feature.properties.name == "Kaligondang") latlng = {lat: -7.369389999848565, lng: 109.4157300000895};
    if (feature.properties.name == "Purbalingga") latlng = {lat: -7.409510000086371, lng: 109.3778199995934};
    if (feature.properties.name == "Kalimanah") latlng = {lat: -7.406694027657205, lng: 109.34263999973624};
    if (feature.properties.name == "Padamara") latlng = {lat: -7.383300709659977, lng: 109.32257736685207};
    if (feature.properties.name == "Kutasari") latlng = {lat: -7.329895845966471, lng: 109.2930534096372};
    if (feature.properties.name == "Bojongsari") latlng = {lat: -7.365198160066998, lng: 109.35783050152649};
    if (feature.properties.name == "Mrebet") latlng = {lat: -7.326274999891305, lng: 109.37728999988365};
    if (feature.properties.name == "Bobotsari") latlng = {lat: -7.278155000103131, lng: 109.36362500024362};
    if (feature.properties.name == "Karangreja") latlng = {lat: -7.236853569886288, lng: 109.32537500010623};
    if (feature.properties.name == "Karangjambu") latlng = {lat: -7.218544983059459, lng: 109.40237377887686};
    if (feature.properties.name == "Karanganyar") latlng = {lat: -7.307164999914761, lng: 109.40719499994935};
    if (feature.properties.name == "Kertanegara") latlng = {lat: -7.309339999990977, lng: 109.43552999970978};
    if (feature.properties.name == "Karangmoncol") latlng = {lat: -7.281790000008446, lng: 109.46530000039476};
    if (feature.properties.name == "Rembang") latlng = {lat: -7.2906252980689885, lng: 109.5248242155152};
    return latlng;
}
/** End */

$.getJSON("/data/geoJSON",
    (data) => {
        for (var i = 0; i < data.length; i++) {
            L.geoJson(data[i], {style: styleLayer, onEachFeature: onEachFeatureLayer}).addTo(map);
        }
    });

L.geoJson(purbalinggakab, {style: styleLayer}).addTo(map);