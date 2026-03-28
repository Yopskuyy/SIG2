<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\KarangAsamUlu; // Ganti dengan Model yang sesuai

class GeoJsonSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('../public/geojson/export.geojson');

        if (!\Illuminate\Support\Facades\File::exists($path)) {
            $this->command->error("File GeoJSON tidak ditemukan!");
            return;
        }

        $json = \Illuminate\Support\Facades\File::get($path);
        $data = json_decode($json, true);

        // Pastikan formatnya FeatureCollection
        if (isset($data['type']) && $data['type'] === 'FeatureCollection') {
            $features = $data['features'];
        } else {
            $this->command->error("Format GeoJSON tidak sesuai harapan (bukan FeatureCollection).");
            return;
        }

        $jumlahDiimport = 0;

        // Lakukan perulangan untuk setiap bangunan/poligon
        foreach ($features as $feature) {
            // Pastikan data memiliki geometry
            if (!isset($feature['geometry'])) continue;

            // Kita hanya ambil yang bentuknya Polygon atau MultiPolygon (abaikan titik/garis jalan)
            $tipeGeometri = $feature['geometry']['type'];
            if ($tipeGeometri !== 'Polygon' && $tipeGeometri !== 'MultiPolygon') {
                continue;
            }

            // Ambil nama bangunan. Jika tidak ada, beri nama default berdasarkan tipe bangunannya
            $properties = $feature['properties'] ?? [];
            $namaLokasi = $properties['name'] ?? null;
            
            if (!$namaLokasi) {
                // Contoh: Jika name kosong, tapi building="school", maka namanya jadi "Bangunan school"
                $jenisBangunan = $properties['building'] ?? 'tanpa nama';
                $namaLokasi = 'Bangunan ' . $jenisBangunan;
            }

            $geometry = json_encode($feature['geometry']); 

            // Simpan ke Database
            \App\Models\KarangAsamUlu::create([
                'nama_lokasi' => $namaLokasi,
                'koordinat_poligon' => $geometry,
                'warna_poligon' => '#3388ff', // Warna biru default
                'deskripsi' => 'Di-import dari Overpass Turbo'
            ]);

            $jumlahDiimport++;
        }

        $this->command->info("Selesai! Berhasil meng-import {$jumlahDiimport} poligon.");
    }
}