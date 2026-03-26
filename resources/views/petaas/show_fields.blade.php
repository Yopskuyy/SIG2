<!-- Titik Lokasi Field -->
<div class="col-sm-12">
    {!! Form::label('titik_lokasi', 'Titik Lokasi:') !!}
    <p>{{ $petaa->titik_lokasi }}</p>
</div>

<!-- Y Field -->
<div class="col-sm-12">
    {!! Form::label('y', 'Y:') !!}
    <p>{{ $petaa->y }}</p>
</div>

<!-- X Field -->
<div class="col-sm-12">
    {!! Form::label('x', 'X:') !!}
    <p>{{ $petaa->x }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $petaa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $petaa->updated_at }}</p>
</div>

