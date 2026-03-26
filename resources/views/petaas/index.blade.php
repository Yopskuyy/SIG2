 index.blade.php :

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Petas</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('petaas.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('petaas.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div id="map" style="height: 500px; margin-top: 50px"></div>

        <script>

            var map = L.map('map').setView([-0.5022, 117.1537], 13); 

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var data = <?= json_encode($petaas); ?>;
            data.forEach(value => {
                L.marker([value.x, value.y]).addTo(map);
                });

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

        </script>
    </div>

@endsection