@foreach($users as $key=>$user)
    <tr id="id-{{ $user->id }}">
        <td>{{ $users->firstItem()+$key }}.</td>
        <td>{{ $user->username }}</td>
        <td>{{ isset($user->hasRole)?$user->hasRole->role:'N/A' }}</td>
        <td>
            @if(!empty($user->expired_date))
                <span class="label label-info">{{ date('d, F-Y', strtotime($user->expired_date)) }}</span>
            @else
                <span class="label label-info">Life Time</span>
            @endif
        </td>
        <td>{{ $user->device_limit }}</td>
        <td width="250px">
            <button type="button" data-toggle="tooltip" data-placement="top" title="Edit User" class="btn btn-primary btn-xs edit-btn" data-url="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $user->id }}" data-del-url="{{ route('user.destroy', $user->id) }}"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9">
        Displying {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} records
        <div class="d-flex justify-content-center">
            {!! $users->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>