<div class="row">
    <div class="col-sm-6">
        <label for="username" class="form-label">User name</label>
        <input type="text" name="username" class="form-control username" value="<?php echo e($model->username); ?>" id="username" placeholder="Enter user name" >
        <span id="error-user_name" style="color: red"></span>
    </div>
    <div class="col-sm-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control password" id="password" placeholder="Enter password ..." >
        <span id="error-password" style="color: red"></span>
    </div>
    <div class="col-sm-12">
        <span class="expired-date">
            <label for="expired_date" class="form-label">Expired</label>
            <input type="date" name="expired_date" value="<?php echo e($model->expired_date); ?>" class="form-control expired_date" id="expired_date" >
        </span>
        <div class="form-check">
            <?php if($model->life_time): ?>
                <input type="checkbox" name="life_time" value="1" class="form-check-input life-time" checked id="life-time">
            <?php else: ?> 
                <input type="checkbox" name="life_time" value="1" class="form-check-input life-time" id="life-time">
            <?php endif; ?>
            <label class="form-check-label" for="life-time">Life Time.</label>
        </div>
    </div>
    <div class="col-sm-12">
        <label for="role-id" class="form-label">Role</label>
        <select name="role_id" id="role-id" class="form-control role-id">
            <option value="" selected>Select Role</option>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($role->id); ?>" <?php echo e($model->role_id==$role->id?'selected':''); ?>><?php echo e($role->role); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span id="error-role_id" style="color: red"></span>
    </div>
    <div class="col-sm-12">
        <label for="device_limit" class="form-label">Limit Device scan QR can create at dashboard</label>
        <input type="number" name="device_limit" value="<?php echo e($model->device_limit); ?>" class="form-control device_limit" id="device_limit" placeholder="Enter devices limit">
        <span id="error-device_limit" style="color: red"></span>
    </div>
</div><?php /**PATH C:\xampp\htdocs\wamd\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>