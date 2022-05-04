<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Interactive Maps') }}
        </h2>
    </x-slot>


    <script src="{{ url('leaflet/leaflet-src.js') }}"></script>
    <script src="{{ url('leaflet/esri-leaflet.js') }}"></script>
    <script src="{{ url('leaflet/esri-leaflet-geocoder.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
{{--    <script async src="{{ url('js/google-api/maps.js') }}" ></script>--}}
    <script type="text/javascript" src="{{ url('leaflet/googlemapMutant.js') }}"></script>
    <script src="{{ url('leaflet/turf.min.js') }}"></script>


    <link rel="stylesheet" href="{{ url('leaflet/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ url('leaflet/leaflet-draw/leaflet.draw.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('leaflet/esri-leaflet-geocoder.css') }}">

    <script src="{{ url('leaflet/leaflet-draw/Leaflet.draw.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/Leaflet.Draw.Event.js') }}"></script>

    <script src="{{ url('leaflet/leaflet-draw/Toolbar.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/Tooltip.js') }}"></script>

    <script src="{{ url('leaflet/leaflet-draw/ext/GeometryUtil.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/ext/LatLngUtil.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/ext/LineUtil.Intersect.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/ext/Polygon.Intersect.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/ext/Polyline.Intersect.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/ext/TouchEvents.js') }}"></script>

    <script src="{{ url('leaflet/leaflet-draw/draw/DrawToolbar.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.Feature.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.SimpleShape.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.Polyline.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.Marker.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.Circle.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.CircleMarker.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.Polygon.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/draw/handler/Draw.Rectangle.js') }}"></script>


    <script src="{{ url('leaflet/leaflet-draw/edit/EditToolbar.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/EditToolbar.Edit.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/EditToolbar.Delete.js') }}"></script>

    <script src="{{ url('leaflet/leaflet-draw/Control.Draw.js') }}"></script>

    <script src="{{ url('leaflet/leaflet-draw/edit/handler/Edit.Poly.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/Edit.SimpleShape.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/Edit.Rectangle.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/Edit.Marker.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/Edit.CircleMarker.js') }}"></script>
    <script src="{{ url('leaflet/leaflet-draw/edit/handler/Edit.Circle.js') }}"></script>


    <link rel="stylesheet" type="text/css" href="{{ url('leaflet/L.Control.Shapefile.css') }}">
    <script src="{{ url('leaflet/L.Control.Shapefile.js') }}"></script>
    <script src="{{ url('leaflet/esri-leaflet-debug.js') }}"></script>
    <script src="{{ url('leaflet/deps/shapefile-js-gh-pages/dist/shp.min.js') }}"> </script>
    @livewire('admin.interactive-maps')
</x-app-layout>
