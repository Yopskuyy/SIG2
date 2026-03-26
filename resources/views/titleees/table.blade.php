<div class="table-responsive">
    <table class="table" id="titleees-table">
        <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($titleees as $titleee)
            <tr>
                
                <td width="120">
                    {!! Form::open(['route' => ['titleees.destroy', $titleee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('titleees.show', [$titleee->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('titleees.edit', [$titleee->id]) }}"
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
