<div class="row my-5">
    <div class="loading-page" wire:loading.block wire:target="">Loading&#8230;</div>
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row justify-content-end">
                    <div id="map" style="width:100%; height:700px"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '',

            osm = L.tileLayer(osmUrl, {
                maxZoom: 18,
                attribution: osmAttrib
            });

        let map = L.map('map').setView([32.648325, -83.444534], 7);
        let buffered = L.geoJson();
        let drawnItems = L.geoJson();

        let hybridMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'hybrid'
        }).addTo(map);

        let roadMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'roadmap'
        });

        let satMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'satellite'
        });

        let terrainMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'terrain'
        });

        let styleMutant = L.gridLayer.googleMutant({
            styles: [{
                elementType: 'labels',
                stylers: [{
                    visibility: 'on'
                }]
            },
                {
                    featureType: 'water',
                    stylers: [{
                        color: '#444444'
                    }]
                },
                {
                    featureType: 'landscape',
                    stylers: [{
                        color: '#eeeeee'
                    }]
                },
                {
                    featureType: 'road',
                    stylers: [{
                        visibility: 'on'
                    }]
                },
                {
                    featureType: 'poi',
                    stylers: [{
                        visibility: 'on'
                    }]
                },
                {
                    featureType: 'transit',
                    stylers: [{
                        visibility: 'on'
                    }]
                },
                {
                    featureType: 'administrative',
                    stylers: [{
                        visibility: 'on'
                    }]
                },
                {
                    featureType: 'administrative.locality',
                    stylers: [{
                        visibility: 'on'
                    }]
                }
            ],
            maxZoom: 24,
            type: 'roadmap'
        });

        let trafficMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'roadmap'
        });

        trafficMutant.addGoogleLayer('TrafficLayer');

        let transitMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'roadmap'
        });


        let point = turf.point([120.73185, 14.01744]);
        transitMutant.addGoogleLayer('TransitLayer');

        L.control.layers({
            OSM: osm,
            Hybrid: hybridMutant,
            // Aerial: satMutant,
            // Terrain: terrainMutant,
            // Styles: styleMutant,
            // Traffic: trafficMutant,
            // Transit: transitMutant
        }, {}, {
            collapsed: 1
        }).addTo(map);


        map.addControl(new L.Control.Draw({
            draw: {
                circle: false

            },
            edit: false
        }));
        $layerJSON = "";
        $layer = "";
        $event = "";
        $props = "";

        map.on('draw:created', function (event) {
            let layer = event.layer,
                feature = layer.feature = layer.feature || {};
            feature.type = feature.type || "Feature";
            let props = feature.properties = feature.properties || {};
            //layer.feature = {properties: {}}; // No need to convert to GeoJSON.
            //let props = layer.feature.properties;
            if (event.layerType == 'polygon' || event.layerType == 'rectangle') {
                // if polygon or rectangle
            } else {
                // else
            }
            // event.layerType = layer type
            // turf.area(layer.toGeoJSON()) = area

            $layerJSON = layer.toGeoJSON();
            $layer = layer;
            $event = event;
            $props = props;
            console.log($layerJSON, $layer, $event, $props);
        });

        map.on('draw:deleted', function (layer) {
            console.log(layer);
        });

        let searchControl;
        let searchResults = L.layerGroup({
            position: 'topright'
        }).addTo(map);

        let agolProvider = L.esri.Geocoding.arcgisOnlineProvider({
            label: "Online World Geocoding Service",
        });

        let ccpaProvider = L.esri.Geocoding.geocodeServiceProvider({
            label: "World Street Map",
            url: "//sampleserver6.arcgisonline.com/arcgis/rest/services/World_Street_Map/MapServer"
        });

        searchControl = L.esri.Geocoding
            .geosearch({
                useMapBounds: false, // do not use extent of map to limit search results
                providers: [agolProvider, ccpaProvider], // providers are geocoding services or map/feature services that we can search against
                placeholder: "Search for an address",
                title: "Address Search",
                // searchBounds: searchBounds, // limit search results within these coordinates
                zoomToResult: true,
                expanded: false,
                collapseAfterResult: true
            })
            .addTo(map);

        searchControl.on("results", function (data) {
            searchResults.clearLayers();

            if (data.results.length > 0) {
                map.setView(data.results[0].latlng, 18);
                let popup = L.popup({
                    closeOnClick: true
                })
                    .setLatLng(data.results[0].latlng)
                    .setContent(data.results[0].text + data.results[0].latlng)
                    .openOn(map);
            }
        });
    </script>
</div>
