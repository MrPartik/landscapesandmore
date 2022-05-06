<div class="row my-5">
    <style>
        .image-preview-container {
            position: relative;
            display: inline;
            width: 100%;
        }

        /* Make the image to responsive */
        .image-preview-container .image {
            display: inline-block;
            border: 1px dashed gray;
            border-radius: 10px;
            width: 100px;
            height: 100px;
            background-size:100% !important;
        }

        /* The overlay effect (full height and width) - lays on top of the container and over the image */
        .image-preview-container .overlay {
            position: absolute;
            top: -95px;
            bottom: 0;
            right: 10px;
            height: 25px;
            width: 10px;
            border-radius: 100px;
            opacity: 0;
            transition: .3s ease;
            background-color: salmon;
        }

        /* When you mouse over the container, fade in the overlay icon*/
        .image-preview-container:hover .overlay {
            opacity: 1;
        }

        /* The icon inside the overlay is positioned in the middle vertically and horizontally */
        .image-preview-container .icon {
            color: white;
            font-size: 13px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        /* When you move the mouse over the icon, change color */
        .image-preview-container .fa-close:hover {
            color: #eee;
        }
    </style>
    <div class="loading-page" wire:loading.block wire:target="">Loading&#8230;</div>
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row justify-content-end">
                    <div wire:ignore id="map" style="width:100%; height:700px"></div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="bShowModal">
        <x-slot name="title">
            {{ __((($mapId === 0 || $mapId === null) ? 'Add' : 'Edit') .' Map Information') }}
        </x-slot>

        <x-slot name="content">
            {{ __('You can now ' . (($mapId === 0 || $mapId === null) ? 'add' : 'edit') . ' map information.') }}
            <div class="mt-2" x-data="{}">
                <div class="mb-3">
                    <label class="col-form-label" for="name">
                        Map Name
                    </label>
                    <x-jet-input id=name wire:model="mapName"  type="text" class="form-control" placeholder="{{ __('Map Name') }}"/>
                </div>
                <div class="mb-3">
                    <label class="col-form-label" for="name">
                        Map Description
                    </label>
                    <x-jet-input id=name wire:model="mapDescription"  type="text" class="form-control" placeholder="{{ __('Map Description') }}"/>
                </div>
                <div class="mb-3">
                    <div class="de_form">
                        <label class="de_form" for="input_7_9">Please Provide Pictures Of Your Project</label>
                        <div>
                            <input id="uploadPicturesOfLandscapes" style="display: none" wire:model="pictureOfProject" type="file" accept="image/*">
                            <button onclick="$('#uploadPicturesOfLandscapes').click()" class="btn btn-primary text-white">
                                <span class="fa fa-file"> </span> Upload Image
                            </button>
                            <span>Max. file size: 10 MB.</span>
                            @if($pictureOfProject !== null && $pictureOfProject !== '')
                                <div class=" mt-3 row" style="text-align:center; display:flow-root; padding: 10px; ">
                                    <div class="image-preview-container row">
                                        <div style="background: url('{{ (is_object($pictureOfProject)) ? url($pictureOfProject->temporaryUrl()) : url($pictureOfProject)  }}') no-repeat center"
                                             class="image col-3 m-1"></div>
                                        <div class="overlay col-3">
                                            <a href="javascript:" wire:click="removePictureOfProject()" class="icon" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if(empty($errors->getMessages()) === false)
                            <div class='alert mt-3 alert-danger'>
                                @foreach($errors->getMessages() as $error)
                                    {!!  '- ' . implode(',', $error) . '<br/>' !!}
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('bShowModal')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveMap"  wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <script>
        let sOsmUrl = 'https://{s}.tile.osm.org/{z}/{x}/{y}.png';
        let sOsmAttrib = '';
        let oOsm = L.tileLayer(sOsmUrl, {
                maxZoom: 18,
                attribution: sOsmAttrib
            });
        let oMap = L.map('map', {
            editable: true,
            doubleClickZoom: false
        }).setView([32.648325, -83.444534], 7);
        let oDrawnItems = L.geoJson();
        let oHybridMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type: 'hybrid'
        }).addTo(oMap);
        let oToSaveLayerOption = {};
        let oToSaveGeoJson = {};
        L.control.layers({
            OSM: oOsm,
            Hybrid: oHybridMutant,
        }, {}, {
            collapsed: 1
        }).addTo(oMap);
        oMap.addControl(new L.Control.Draw({
            draw: {
                circle      : true,
                polyline    : false,
                dot         : false,
                circlemarker: false
            }
        }));

        L.geoJson({!! json_encode($aMapDetails, true) !!}).eachLayer(function (oLayer) {
            let oProperties = oLayer.feature.properties;
            if (oProperties.radius) {
                oLayer = new L.Circle(oLayer.feature.geometry.coordinates.reverse(), oProperties);
            }
            // else {
            //     oLayer.options = oProperties;
            // }
            oDrawnItems.addLayer(oLayer).addTo(oMap);
            oLayer.bindPopup("<center>" +
                    "<strong>" + oProperties.map_name + "</strong><br/>" +
                    oProperties.map_description + "<br/>" +
                    ((oProperties.map_images.length > 0) ?
                        "<hr/> " +
                        "<a href='" + oProperties.map_images + "' target='_blank'><img style='width: 100%; min-width: 200px' src='" + oProperties.map_images + "'></img></a>"  : '') +
                    "<hr/> " +
                    "<button onclick='triggerEditMap(" + oProperties.map_id + ")' class='edit-map btn btn-warning'><i class='fa fa-pen'></i></button> " +
                    "<button onclick='triggerDeleteMap(" + oProperties.map_id + ")' class='delete-map btn btn-danger'><i class='fa fa-trash text-white'></i></button> " +
                "</center>");
        });
         function triggerEditMap(iId) {
            @this.set('mapId', iId);
            @this.call('showMapModal');
        }
         function triggerDeleteMap(iId) {
            @this.call('deleteMap', iId);
        }
        oMap.on('draw:created', function (oEvent) {
            let oLayer = oEvent.layer;
            let oFeature = oLayer.feature = oLayer.feature || {};
            let oLayerGeoJson = oLayer.toGeoJSON();
            oFeature.type = oFeature.type || 'Feature'
            @this.set('mapId', 0);
            @this.call('showMapModal');
            @this.set('aToSaveLayerOption', oLayer.options);
            @this.set('aToSaveGeoJson', oLayerGeoJson);
        });

        oMap.on('draw:deleted', function (layer) {
            console.log(layer);
        });

        let oSearchControl;
        let oSearchResults = L.layerGroup({
            position: 'topright'
        }).addTo(oMap);

        let oAlgoProvider = L.esri.Geocoding.arcgisOnlineProvider({
            label: "Online World Geocoding Service",
        });
        let oCcpaProvider = L.esri.Geocoding.geocodeServiceProvider({
            label: "World Street Map",
            url: "//sampleserver6.arcgisonline.com/arcgis/rest/services/World_Street_Map/MapServer"
        });

        oSearchControl = L.esri.Geocoding
            .geosearch({
                useMapBounds: false, // do not use extent of map to limit search results
                providers: [oAlgoProvider, oCcpaProvider], // providers are geocoding services or map/feature services that we can search against
                placeholder: "Search for an address",
                title: "Address Search",
                // searchBounds: searchBounds, // limit search results within these coordinates
                zoomToResult: true,
                expanded: false,
                collapseAfterResult: true
            })
            .addTo(oMap);

        oSearchControl.on("results", function (data) {
            oSearchResults.clearLayers();
            if (data.results.length > 0) {
                console.log(data);
                oMap.setView(data.results[0].latlng, 18);
                let oPopup = L.popup({
                    closeOnClick: true
                })
                    .setLatLng(data.results[0].latlng)
                    .setContent(data.results[0].text)
                    .openOn(oMap);
            }
        });
    </script>
</div>
