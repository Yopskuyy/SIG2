<div class="table-responsive">
    <table class="table" id="petas-table">
        <thead>
        <tr>
            <th>Tempat</th>
        <th>Titiklokasi</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($petas as $peta)
            <tr>
                <td>{{ $peta->tempat }}</td>
            <td>{{ $peta->titiklokasi }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['petas.destroy', $peta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('petas.show', [$peta->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('petas.edit', [$peta->id]) }}"
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
