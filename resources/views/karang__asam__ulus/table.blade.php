<div class="table-responsive">
    <table class="table" id="karangAsamUlus-table">
        <thead>
        <tr>
            <th>Nama Lokasi</th>
        <th>Koordinat Poligon</th>
        <th>Warna Poligon</th>
        <th>Deskripsi</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($karangAsamUlus as $karangAsamUlu)
            <tr>
                <td>{{ $karangAsamUlu->Nama_lokasi }}</td>
            <td>{{ $karangAsamUlu->koordinat_poligon }}</td>
            <td>{{ $karangAsamUlu->warna_poligon }}</td>
            <td>{{ $karangAsamUlu->deskripsi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['karangAsamUlus.destroy', $karangAsamUlu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('karangAsamUlus.show', [$karangAsamUlu->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('karangAsamUlus.edit', [$karangAsamUlu->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
