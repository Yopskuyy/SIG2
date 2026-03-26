<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $mahasiswa->name }}</p>
</div>

<!-- Alamat Field -->
<div class="col-sm-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $mahasiswa->alamat }}</p>
</div>

<!-- Nim Field -->
<div class="col-sm-12">
    {!! Form::label('nim', 'Nim:') !!}
    <p>{{ $mahasiswa->nim }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $mahasiswa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $mahasiswa->updated_at }}</p>
</div>

