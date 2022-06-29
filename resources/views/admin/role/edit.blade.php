<div class="row">
    <input type="hidden" id="update-url" value="{{ route('role.update', $model->id) }}">
    <div class="col-sm-12">
        <label for="role" class="form-label">Role</label>
        <input type="text" name="role" class="form-control role-name" value="{{ $model->role }}" id="role" placeholder="Enter role name" >
        <span id="edit-error-role_name" style="color: red"></span>
    </div>
    <div class="col-sm-12">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="role_status" class="form-control">
            <option value="1" {{ $model->status==1?'selected':'' }}>Active</option>
            <option value="0" {{ $model->status==0?'selected':'' }}>In-Active</option>
        </select>
        <span id="error-role_name" style="color: red"></span>
    </div>
</div>