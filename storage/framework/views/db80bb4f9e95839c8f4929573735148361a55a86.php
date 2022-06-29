<div class="row">
    <input type="hidden" id="update-url" value="<?php echo e(route('role.update', $model->id)); ?>">
    <div class="col-sm-12">
        <label for="role" class="form-label">Role</label>
        <input type="text" name="role" class="form-control role-name" value="<?php echo e($model->role); ?>" id="role" placeholder="Enter role name" >
        <span id="edit-error-role_name" style="color: red"></span>
    </div>
    <div class="col-sm-12">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="role_status" class="form-control">
            <option value="1" <?php echo e($model->status==1?'selected':''); ?>>Active</option>
            <option value="0" <?php echo e($model->status==0?'selected':''); ?>>In-Active</option>
        </select>
        <span id="error-role_name" style="color: red"></span>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wamd\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>