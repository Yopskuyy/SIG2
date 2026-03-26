<div class="form-group col-sm-6">
    {!! Form::label('Nama_lokasi', 'Nama Lokasi:') !!}
    {!! Form::text('Nama_lokasi', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('warna_poligon', 'Warna Poligon:') !!}
    {!! Form::color('warna_poligon', isset($karangAsamUlu) ? $karangAsamUlu->warna_poligon : '#3388ff', ['class' => 'form-control', 'id' => 'warna_poligon', 'style' => 'height: 40px; cursor: pointer;']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('koordinat_poligon', 'Gambarkan Batas Wilayah (Poligon):') !!}
    
    {!! Form::hidden('koordinat_poligon', null, ['id' => 'koordinat_poligon']) !!}
    
    <div id="map" style="height: 500px; width: 100%; border: 1px solid #ccc; border-radius: 5px; z-index: 1;"></div>
    
    <small class="text-muted">Gunakan ikon di kiri atas peta untuk menggambar atau mengedit batas wilayah.</small>
</div>

@push('third_party_stylesheets')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css" />
@endpush

@push('page_scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Inisialisasi Peta
        var map = L.map('map').setView([-0.5145, 117.1153], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        map.pm.addControls({
            position: 'topleft',
            drawCircle: false, drawCircleMarker: false, drawPolyline: false,
            drawRectangle: false, drawMarker: false,
            drawPolygon: true, editMode: true, dragMode: true, removalMode: true
        });

        var inputKoordinat = document.getElementById('koordinat_poligon');
        var colorInput = document.getElementById('warna_poligon');
        var activePolygon = null;

        // ==========================================
        // KODE BARU: MENGATUR WARNA GEOMAN SECARA LANGSUNG
        // ==========================================
        function setGeomanColor(color) {
            // Ini akan membuat Geoman langsung memakai warna pilihan Anda 
            // BAHKAN SAAT Anda sedang menarik garis poligonnya
            map.pm.setPathOptions({
                color: color,
                fillColor: color,
                fillOpacity: 0.4
            });
        }

        // Terapkan warna dari form saat halaman pertama kali dibuka
        setGeomanColor(colorInput.value);

        // Jika user menggeser/mengganti warna di kotak warna, langsung update
        colorInput.addEventListener('input', function(e) {
            var selectedColor = e.target.value;
            setGeomanColor(selectedColor); // Update alat gambarnya

            // Jika sudah ada poligon yang tergambar, ubah juga warnanya secara real-time
            if (activePolygon) {
                activePolygon.setStyle({ color: selectedColor, fillColor: selectedColor });
            }
        });

        // ==========================================
        // FUNGSI MENYIMPAN KOORDINAT
        // ==========================================
        function updateKoordinatInput(layer) {
            var geojson = layer.toGeoJSON();
            inputKoordinat.value = JSON.stringify(geojson.geometry);
            console.log("Koordinat tersimpan:", inputKoordinat.value); // Untuk pengecekan di console
        }

        // ==========================================
        // LOGIKA EDIT: Memuat Data Lama
        // ==========================================
        var dataLama = inputKoordinat.value;
        if (dataLama && dataLama.trim() !== '') {
            try {
                var geojsonData = JSON.parse(dataLama);
                var initialColor = colorInput.value;

                var existingLayer = L.geoJSON(geojsonData, {
                    style: { color: initialColor, weight: 3, fillColor: initialColor, fillOpacity: 0.4 }
                }).addTo(map);

                existingLayer.eachLayer(function(layer) {
                    activePolygon = layer;
                    layer.on('pm:edit', function(e) { updateKoordinatInput(e.target); });
                    layer.on('pm:dragend', function(e) { updateKoordinatInput(e.target); });
                });
                map.fitBounds(existingLayer.getBounds());
            } catch (e) {
                console.error("Format data koordinat tidak valid:", e);
            }
        }

        // ==========================================
        // LOGIKA CREATE: Saat Selesai Menggambar Poligon Baru
        // ==========================================
        map.on('pm:create', function(e) {
            // Opsional: Hapus poligon lama jika menggambar yang baru agar tidak double
            if (activePolygon) {
                map.removeLayer(activePolygon);
            }
            activePolygon = e.layer;
            
            // Catat koordinatnya ke input hidden
            updateKoordinatInput(activePolygon);

            // Pasang sensor agar kalau diedit, titiknya update
            activePolygon.on('pm:edit', function(e) { updateKoordinatInput(e.target); });
            activePolygon.on('pm:dragend', function(e) { updateKoordinatInput(e.target); });
        });

        // Logika saat poligon dihapus (tong sampah)
        map.on('pm:remove', function(e) {
            inputKoordinat.value = '';
            activePolygon = null;
        });

        // ==========================================
        // VALIDASI MENCEGAH ERROR NULL
        // ==========================================
        var form = inputKoordinat.closest('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!inputKoordinat.value || inputKoordinat.value.trim() === '') {
                    e.preventDefault(); // Hentikan penyimpanan
                    alert('Peringatan: Anda belum selesai menggambar poligon di peta! Pastikan titik akhir poligon disambung ke titik awal agar bentuknya tertutup.');
                }
            });
        }
    });
</script>
@endpush