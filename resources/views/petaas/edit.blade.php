edit.blade.php :

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Peta</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($petaa, ['route' => ['petaas.update', $petaa->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('petaas.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('petaas.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="container">
        <div id="map" style="height: 500px; margin-top: 50px"></div>

        <script>
             // Center awal (fallback)
            var curLocation=[0,0];
            if (curLocation[0]==0 && curLocation[1]==0) {
                curLocation =[<?=$petaa->x?>, <?=$petaa->y?>];  
                }

            var map = L.map('map').setView([-0.52, 117.13], 14); 

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            fetch("{{ asset('geojson/kelurahan.geojson') }}")
                .then(response => response.json())
                .then(data => {
                    L.geoJSON(data, {
                        style: {
                            color: "red",
                            weight: 2, 
                            fillOpacity: 0.2
                        },
                        onEachFeature: function (feature, layer) {
                            if (feature.properties) {
                                layer.bindPopup(
                                    "<b>Wilayah:</b> " +
                                    (feature.properties.nama || "-")
                                );
                            }
                        }
                    }).addTo(map);
                });

            // Titik (marker) di center
            // var marker = L.marker(curLocation).addTo(map);
            // Marker draggable
            var marker = L.marker(curLocation, { draggable: true }).addTo(map);

            function syncMarker(position) {
            marker.setLatLng(position);
            marker.bindPopup(position.lat + ", " + position.lng).openPopup();
            map.panTo(position);
            }

            // Saat marker digeser -> update input
            marker.on("dragend", function () {
            var pos = marker.getLatLng();
            $("#x").val(pos.lat);
            $("#y").val(pos.lng);
            syncMarker(pos);
            });

            // Saat input berubah -> update marker
            $("#x, #y").on("input change", function () {
            var lat = parseFloat($("#x").val());
            var lng = parseFloat($("#y").val());
            if (isNaN(lat) || isNaN(lng)) return;
            syncMarker(L.latLng(lat, lng));
            });

            // Saat input berubah -> update marker
            $("#x, #y").on("input change", function () {
            var lat = parseFloat($("#x").val());
            var lng = parseFloat($("#y").val());
            if (isNaN(lat) || isNaN(lng)) return;
            syncMarker(L.latLng(lat, lng));
            });

        </script>
    </div>
@endsection