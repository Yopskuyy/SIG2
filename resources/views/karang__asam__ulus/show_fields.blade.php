<!-- Nama Lokasi Field -->
<div class="col-sm-12">
    {!! Form::label('Nama_lokasi', 'Nama Lokasi:') !!}
    <p>{{ $karangAsamUlu->Nama_lokasi }}</p>
</div>

<!-- Koordinat Poligon Field -->
<div class="col-sm-12">
    {!! Form::label('koordinat_poligon', 'Koordinat Poligon:') !!}
    <p>{{ $karangAsamUlu->koordinat_poligon }}</p>
</div>

<!-- Warna Poligon Field -->
<div class="col-sm-12">
    {!! Form::label('warna_poligon', 'Warna Poligon:') !!}
    <p>{{ $karangAsamUlu->warna_poligon }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $karangAsamUlu->deskripsi }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $karangAsamUlu->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $karangAsamUlu->updated_at }}</p>
</div>

