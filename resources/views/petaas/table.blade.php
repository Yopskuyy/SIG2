<div class="table-responsive">
    <table class="table" id="petaas-table">
        <thead>
        <tr>
            <th>Titik Lokasi</th>
        <th>Y</th>
        <th>X</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($petaas as $petaa)
            <tr>
                <td>{{ $petaa->titik_lokasi }}</td>
            <td>{{ $petaa->y }}</td>
            <td>{{ $petaa->x }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['petaas.destroy', $petaa->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('petaas.show', [$petaa->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('petaas.edit', [$petaa->id]) }}"
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
