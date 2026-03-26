<div class="table-responsive">
    <table class="table" id="titles-table">
        <thead>
        <tr>
            <th>Title</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($titles as $title)
            <tr>
                <td>{{ $title->Title }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['titles.destroy', $title->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('titles.show', [$title->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('titles.edit', [$title->id]) }}"
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
