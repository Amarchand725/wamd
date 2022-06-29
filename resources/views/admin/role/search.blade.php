@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>{{ $model->role }}</td>
        <td>
            @if($model->status)
                <span class="label label-info">Active</span>
            @else
                <span class="label label-info">In-active</span>
            @endif
        </td>
        <td width="250px">
            <button type="button" data-toggle="tooltip" data-placement="top" title="Edit Role" class="btn btn-primary btn-xs edit-btn" data-url="{{ route('role.edit', $model->id) }}"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ route('role.destroy', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>