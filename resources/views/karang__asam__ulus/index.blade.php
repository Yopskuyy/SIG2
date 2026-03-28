@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Karang Asam Ulus</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('karangAsamUlus.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Peta Keseluruhan Wilayah</h3>
            </div>
            <div class="card-body p-0">
                <div id="map-index" style="height: 400px; width: 100%; z-index: 1;"></div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('karang__asam__ulus.table')
            </div>
        </div>
    </div>
@endsection

@push('third_party_stylesheets')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.min.css" />
@endpush

@push('page_scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi Peta
            var map = L.map('map-index').setView([-0.5145, 117.1153], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var dataWilayah = {!! json_encode($karangAsamUlus) !!};

            // Buat FeatureGroup untuk menampung semua poligon
            var allPolygons = L.featureGroup().addTo(map);

            dataWilayah.forEach(function(item) {
                if (item.koordinat_poligon && item.koordinat_poligon.trim() !== '') {
                    try {
                        var rawGeojson = JSON.parse(item.koordinat_poligon);
                        
                        // 3. Bungkus data menjadi format Feature yang memiliki "properties"
                        // Ini wajib agar plugin search bisa membaca "Nama_lokasi"
                        var geojsonFeature = {
                            "type": "Feature",
                            "properties": {
                                "nama_wilayah": item.Nama_lokasi // Properti ini yang akan dijadikan acuan pencarian
                            },
                            "geometry": rawGeojson.type === "Feature" ? rawGeojson.geometry : rawGeojson
                        };
                        
                        var color = item.warna_poligon ? item.warna_poligon : '#3388ff';

                        // Buat layer GeoJSON menggunakan geojsonFeature yang sudah kita modifikasi
                        var layer = L.geoJSON(geojsonFeature, {
                            style: {
                                color: color,
                                weight: 2,
                                fillColor: color,
                                fillOpacity: 0.4
                            }
                        });

                        // Tambahkan popup
                        layer.bindPopup("<b>" + item.Nama_lokasi + "</b><br>" + (item.deskripsi || ""));

                        // Masukkan layer ke dalam FeatureGroup
                        allPolygons.addLayer(layer);

                        // var titikTengah = layer.getBounds().getCenter();

                        // var marker = L.marker(titikTengah,{
                        //     title: item.Nama_lokasi
                        // });

                        // marker.feature = {
                        //     type: 'Feature',
                        //     properties: {
                        //         nama_lokasi: item.Nama_lokasi, // Kata kunci yang akan dicari
                        //         deskripsi: item.deskripsi
                        //     }
                        // }
                        
                        // marker.bindPopup("<b>" + item.Nama_lokasi + "</b><br>" + (item.deskripsi || ""));

                        // allPolygons.addLayer(marker);

                    } catch (e) {
                        console.error("Format JSON tidak valid untuk ID: " + item.id, e);
                    }
                }
            });

            if (allPolygons.getLayers().length > 0) {
                map.fitBounds(allPolygons.getBounds());
            }


            // 1. Kita buat dulu bentuk penanda untuk hasil pencariannya (Lingkaran Merah)
            var penandaPencarian = L.circleMarker([0,0], {
                radius: 15,
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.6
            });

            // 4. Inisialisasi Fitur Leaflet Search
            var searchControl = new L.Control.Search({
                layer: allPolygons,             // Target pencarian adalah grup poligon kita
                propertyName: 'nama_wilayah',   // Sesuai dengan nama properti yang kita buat di langkah ke-3
                marker: penandaPencarian,                  // Set false karena kita tidak ingin menampilkan ikon marker tambahan
                 moveToLocation: function(latlng, title, map) {
                //     // Animasi zoom saat lokasi ditemukan
                //     // map.flyTo(latlng, 14); 
                 }
            });

            // Opsional: Buka popup otomatis ketika poligon diklik dari hasil pencarian
            searchControl.on('search:locationfound', function(e) {

                map.fitBounds(e.layer.getBounds(), { padding: [50, 50], maxZoom: 19 });

                if (e.layer._popup) {
                    e.layer.openPopup();
                }
            });

            // Tambahkan control search ke dalam peta
            map.addControl(searchControl);
        });
    </script>
@endpush